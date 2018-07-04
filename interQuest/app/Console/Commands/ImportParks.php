<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;
use App\Models\Fief as Fief;
use App\Models\Park as Park;
use App\Models\Territory as Territory;
use App;

class ImportParks extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'parks:import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Imports from the ORK any parks into the system that are not there yet.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		//setup
		$lastPark = Park::orderBy('orkID', 'DESC')->first();
		$parkID = $lastPark ? $lastPark->orkID : 1;
		$endIfCount = 0;

		while($endIfCount < 100){
			
			if(!Park::where('orkID', '=', $parkID)->exists()) {
			
				//setup
				$html = 'https://amtgard.com/ork/orkui/?Route=Park/index/' . $parkID;
				
				// Create a new DOM Document to hold our webpage structure
				$xml = new DOMDocument();
				
				// Load the url's contents into the DOM
				@$xml->loadHTMLFile($html);
				
				//make sure it's not 'empty'
				if($xml->getElementsByTagName('h3')[0]->nodeValue != ''){
					
					//start up the Park
					$park = new Park;
					$park->orkID = $parkID;
					$park->name = $xml->getElementsByTagName('h3')[0]->nodeValue;

					//Loop through each <a> tag looking for the coords
					$coords = [];
					$lat = 0;
					$lon = 0;
					foreach($xml->getElementsByTagName('a') as $link) {
						if($link->nodeValue == "Park Map"){
							$coordGroup = explode('@', $link->getAttribute('href'));
							if(count($coordGroup) == 2 && strpos($coordGroup[1], ',-')){
								
								//set lat/lon
								$coords = explode(',-', $coordGroup[1]);
								$lat = $coords[0];
								$lon = $coords[1];
								
								//done here
								break;
							}else{
								$this->info($xml->getElementsByTagName('h3')[0]->nodeValue . ' (' . $parkID . ') has no or malformed map data.');
								$parkID++;
								continue(2);
							}
						}
					}
					
					//work out park's row/column
					$parkRow = round(($lat - 20) * 70);
					$parkRow = $parkRow < 5 ? 5 : $parkRow;
					$parkRow = $parkRow > 3496 ? 3496 : $parkRow;
					$parkColumn = round(($lon - 50) * 58);
					$parkColumn = $parkColumn < 4 ? 4 : $parkColumn;
					$parkColumn = $parkColumn > 5995 ? 5995 : $parkColumn;

					//setup new territories
					$resources = [
						'Grain' => 'true',
						'Iron' => 'true',
						'Stone' => 'true',
						'Timber' => 'true',
						'Trade' => 'true',
						'Twice' => 'true',
					];
					$reroll = [
						'Grain' => 'true',
						'Iron' => 'true',
						'Stone' => 'true',
						'Timber' => 'true',
						'Trade' => 'true',
					];
					$parkFiefdomMap = [
						0	=> [
							'x'	=> -1,
							'y'	=> 0
						],
						1	=> [
							'x'	=> -1,
							'y'	=> 1
						],
						2	=> [
							'x'	=> 0,
							'y'	=> -1
						],
						3	=> [
							'x'	=> 0,
							'y'	=> 1
						],
						4	=> [
							'x'	=> 1,
							'y'	=> 0
						],
						5	=> [
							'x'	=> 1,
							'y'	=> 1
						]
					];
					$takeHalf = 1;
				
					//get/set the home territory
					$parkTerritory = Territory::where('row', $parkRow)->where('column', $parkColumn)->first();
					if(!$parkTerritory){
						$parkTerritory = new Territory;
					}else{
						//check for park w/ territory_id
						if(Park::where('territory_id', $parkTerritory->id)->count() > 0){
							$this->info($xml->getElementsByTagName('h3')[0]->nodeValue . ' (' . $parkID . ') has a duplicate location to another settlement.');
							$parkID++;
							continue;
						}
					}
					
					//add territory stuff
					$primRes = array_rand($resources);
					$secRes = ($primRes == 'Twice' ? array_rand($reroll) : null);
					$primRes = ($primRes == 'Twice' ? array_rand($reroll) : $primRes);
					$parkTerritory->row = $parkRow;
					$parkTerritory->column = $parkColumn;
					$parkTerritory->terrain_id = random_int(2, 7);
					$parkTerritory->primary_resource = $primRes;
					$parkTerritory->secondary_resource = $secRes;
					$parkTerritory->castle_strength = 1;
					$parkTerritory->save();
					
					//update park
					$park->territory_id = $parkTerritory->id;
					$park->save();
					
					//Fief exists?
					if(Fief::where('territory_id', $parkTerritory->id)->count() > 0){
							
						//take it
						$fief = Fief::where('territory_id', $parkTerritory->id)->first();
					}else{
							
						//add Fief
						$fief = new Fief;
						$fief->territory_id = $parkTerritory->id;
					}
						
					//update Fief data
					$fief->fiefdom_id = $park->id;
					$fief->fiefdom_type = 'App\Models\Park';
					$fief->save();
					
					//notify
					$this->info('Added ' . $xml->getElementsByTagName('h3')[0]->nodeValue . '(' . $parkID . ')');
					$this->info('Adding Territories for ' . $park->name);
					
					//create bar
					$bar = $this->output->createProgressBar(7);
							
					//advance
					$bar->advance();
					 
					//set range
					$bottomRow = $parkRow - 1 > -1 ? $parkRow - 1 : 0;
					$rightCol = $parkColumn - 1 > -1 ? $parkColumn - 1 : 0;
					
					//add territories
					for($row=$bottomRow;$row<($bottomRow + 3);$row++){
						for($column=$rightCol;$column<($rightCol + 3);$column++){
							
							//is this the park's home territory?
							if($row == $parkRow && $column == $parkColumn){
								
								//did this already
								continue;
							}
								
							//is it adjascent to the park's home territory?
							foreach($parkFiefdomMap as $coords){
								if(($column == ($parkColumn + $coords['x'])) && ($row == ($parkRow + $coords['y']))){

									//get/set territory
									$territory = Territory::where('row', $row)->where('column', $column)->first();
									if(!$territory){
									
										$primRes = array_rand($resources);
										$secRes = ($primRes == 'Twice' ? array_rand($reroll) : null);
										$primRes = ($primRes == 'Twice' ? array_rand($reroll) : $primRes);
									
										$territory = new Territory;
										$territory->row = $row;
										$territory->column = $column;
										$territory->terrain_id = 1;
										$territory->primary_resource = $primRes;
										$territory->secondary_resource = $secRes;
										$territory->save();
									}
									
									//no Fief exists?
									if(Fief::where('territory_id', $territory->id)->count() == 0){
				
										//add Fief
										$fief = new Fief;
										$fief->territory_id = $territory->id;
										$fief->fiefdom_id = $park->id;
										$fief->fiefdom_type = 'App\Models\Park';
										$fief->save();
				
										//update terrain to something less generic
										$territory->terrain_id = random_int(2, 7);
										$territory->save();
									}else{
											
										//not if it's a park's home territory...doesn't count
										if(Park::where('territory_id', $parkTerritory->id)->count() > 0){
											continue 2;
										}
										
										//this park is very close to another park...take half their overlaps, not the first one tho.
										if($takeHalf%2 == 0){
										
											//load Fief
											$fief = Fief::where('territory_id', $territory->id)->first();
											
											//take the Fief
											$fief->fiefdom_id = $park->id;
											$fief->fiefdom_type = 'App\Models\Park';
											$fief->save();
										}
										$takeHalf++;
									}
								}
							}
							
							//advance
							$bar->advance();
						}
					}
					$bar->finish();
					$this->info(PHP_EOL);
					
				//This guy is empty
				}else{
					$endIfCount++;
				}
			}
			
			//iterate
			$parkID++;
		}
	}
}
