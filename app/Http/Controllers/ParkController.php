<?php

namespace App\Http\Controllers;

use Auth;
use App\DataTables\ParkDataTable;
use App\DataTables\PersonaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParkRequest;
use App\Http\Requests\UpdateParkRequest;
use App\Repositories\ParkRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use DOMDocument;
use App\Models\Fief as Fief;
use App\Models\Park as Park;
use App\Models\Territory as Territory;
use App\Models\Action as Action;
use App\Models\Vocation as Vocation;
use App\Models\Metatype as Metatype;
use App\Models\User as User;
use App\Models\Persona as Persona;
use Mail;

class ParkController extends AppBaseController
{
	/** @var  ParkRepository */
	private $parkRepository;

	public function __construct(ParkRepository $parkRepo)
	{
		$this->parkRepository = $parkRepo;
	}

	/**
	 * Display a listing of the Park.
	 *
	 * @param ParkDataTable $parkDataTable
	 * @return Response
	 */
	public function index(ParkDataTable $parkDataTable)
	{
		return $parkDataTable->render('parks.index');
	}

	/**
	 * Show the form for creating a new Park.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		//security
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}
		
		//get vocations
		$vocations = Vocation::pluck('name', 'id')->toArray();
		
		//get metatypes
		$metatypes = Metatype::pluck('name', 'id')->toArray();
		
		//get actions
		$actions = Action::pluck('name', 'id')->toArray();
		
		//parks
		$parks = [];
		
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}
		return view('parks.create')
			->with('vocations', $vocations)
			->with('metatypes', $metatypes)
			->with('actions', $actions)
			->with('parks', $parks)
			->with('suppressSave', true);
	}

	/**
	 * Store a newly created Park in storage.
	 *
	 * @param CreateParkRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateParkRequest $request)
	{
		
		//security
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}
		$input = $request->all();
		
		//make sure the claim email exists and is unique
		if(filter_var($input['validClaim'], FILTER_VALIDATE_EMAIL)){
			$currentUsers = User::where('email', $input['validClaim'])->get();
			if($currentUsers->count() > 0){
				return redirect(route('parks.create'))
					->withInput()
					->withErrors('Persona claim validation email is not unique...somebody is using it already.');
			}
		}else{
			
			//This won't work without a Mapkeeper, so die
			return redirect(route('park.create'))
				->withInput()
				->withErrors('Persona claim validation email is missing.  Gotta have a MK to make this work.');
		}
		
		//setup
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
						'y'	=> 1
				],
				1	=> [
						'x'	=> 0,
						'y'	=> 1
				],
				2	=> [
						'x'	=> 1,
						'y'	=> 1
				],
				3	=> [
						'x'	=> -1,
						'y'	=> 0
				],
				4	=> [
						'x'	=> 1,
						'y'	=> 0
				],
				5	=> [
						'x'	=> 0,
						'y'	=> -1
				]
		];
		$takeHalf = 1;
		
		//check the ORK id
		if(!Park::where('orkID', $request->orkID)->exists()){
			
			//import from ORK
			$html = 'https://amtgard.com/ork/orkui/?Route=Park/index/' . $request->orkID;
			
			// Create a new DOM Document to hold our webpage structure
			$xml = new DOMDocument();
			
			// Load the url's contents into the DOM
			@$xml->loadHTMLFile($html);
			
			//make sure it's not 'empty'
			if($xml->getElementsByTagName('h3')[0]->nodeValue != ''){
					
				//start up the Park
				$park = new Park;
				$park->orkID = $request->orkID;
				$park->rank = $request->rank;
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
							return redirect(route('parks.create'))
								->withInput()
								->with('errors', $xml->getElementsByTagName('h3')[0]->nodeValue . ' (' . $request->orkID . ') has no or malformed map data.');
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
				
				//get/set the home territory
				$parkTerritory = Territory::where('row', $parkRow)->where('column', $parkColumn)->first();
				if(!$parkTerritory){
					$parkTerritory = new Territory;
				}else{
					//check for park w/ territory_id
					if(Park::where('territory_id', $parkTerritory->id)->count() > 0){
						return redirect(route('parks.create'))
							->withInput()
							->with('errors', $xml->getElementsByTagName('h3')[0]->nodeValue . ' (' . $parkID . ') has a duplicate location to another settlement.');
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
					
				//set range
				$bottomRow = $parkRow - 1 > -1 ? $parkRow - 1 : 0;
				$rightCol = $parkColumn - 1 > -1 ? $parkColumn - 1 : 0;
				
				//add fiefs/terrains
				for($row=$bottomRow;$row<($bottomRow + 3);$row++){
					for($column=$rightCol;$column<($rightCol + 3);$column++){
							
						//is this the park's home territory?
						if($row == $parkRow && $column == $parkColumn){
							
							//did this already, skip it
							continue;
						}
						
						//is it adjascent to the park's home territory?
						foreach($parkFiefdomMap as $coords){
							if(($column == ($parkColumn + $coords['x'])) && ($row == ($parkRow + $coords['y']))){

								//if it doesn't exist already
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
					}
				}
					
				//add the persona
				$persona = new Persona;
				$persona->orkID = $input['personaOrkID'];
				$persona->name = $input['name'];
				$persona->park_id = $park->id;
				$persona->territory_id = $park->territory_id;
				$persona->validClaim = $input['validClaim'];
				$persona->save();
				
				//if there's an email, we'll need to send an invite out...
				if(filter_var($input['validClaim'], FILTER_VALIDATE_EMAIL)){
					Mail::send('emails.invite', ['inviter' => Auth::user()], function ($m) use ($input){
						$m->from('doNotReply@interquestonline.com', 'InterQuest');
						$m->to($input['validClaim'], $input['name']);
						$m->subject('Join the Quest!');
					});
				}
			}
			
			Flash::success('Park saved successfully.');
			return redirect(route('parks.index'));
		}else{
			Flash::error('Park with Given ORK ID Already Exists');
			return redirect(route('parks.index'));
		}
	}

	/**
	 * Display the specified Park.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id, PersonaDataTable $personaDataTable)
	{
		$park = $this->parkRepository->findWithoutFail($id);

		if (empty($park)) {
			Flash::error('Park not found');
			return redirect(route('parks.index'));
		}
		
		//park personae
		$dataTable = $personaDataTable
		->html([
			'name' => ['title' => 'Persona', 'name' => 'name', 'data' => 'long_name'],
			'image' => ['title' => 'Image', 'name' => 'image', 'data' => 'image', 'render' => '"<img src=\"" + data + "\" width=\"50\"/>"'],
			'vocation' => ['title' => 'Vocation', 'name' => 'persona', 'data' => 'vocation.name'],
			'metatype' => ['title' => 'Metatype', 'name' => 'metatype', 'data' => 'metatype.name'],
			'home' => ['title' => 'Home', 'name' => 'home', 'data' => 'home.displayname', 'defaultContent' => 'Homeless!'],
			'rebel' => ['title' => 'Rebel?', 'name' => 'rebel', 'data' => 'is_rebel'],
		])
		->ajax([
			'url' => route('personae.index'),
			'type' => 'GET',
			'data' => 'function(d) {
				d.park_id = ' . $id . ';
			}',
		]);

		return view('parks.show', compact('dataTable'))->with('park', $park);
	}

	/**
	 * Show the form for editing the specified Park.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$park = $this->parkRepository->findWithoutFail($id);

		if (empty($park)) {
			Flash::error('Park not found');
			return redirect(route('parks.index'));
		}
		if(Gate::denies('mapkeeperOwn', $park->mapkeeper ? $park->mapkeeper->id : 0)){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}

		return view('parks.edit')->with('park', $park);
	}

	/**
	 * Update the specified Park in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateParkRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateParkRequest $request)
	{
		$park = $this->parkRepository->findWithoutFail($id);

		if (empty($park)) {
			Flash::error('Park not found');
			return redirect(route('parks.index'));
		}
		if(Gate::denies('mapkeeperOwn', $park->mapkeeper ? $park->mapkeeper->id : 0)){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}

		$park = $this->parkRepository->update($request->all(), $id);

		Flash::success('Park updated successfully.');

		return redirect(route('parks.index'));
	}

	/**
	 * Remove the specified Park from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('parks.index'));
		}
		$park = $this->parkRepository->findWithoutFail($id);

		if (empty($park)) {
			Flash::error('Park not found');
			return redirect(route('parks.index'));
		}

		$this->parkRepository->delete($id);

		Flash::success('Park deleted successfully.');

		return redirect(route('parks.index'));
	}
}
