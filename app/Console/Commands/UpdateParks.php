<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;
use App\Models\Fief as Fief;
use App\Models\Park as Park;
use App\Models\Territory as Territory;
use App;

class UpdateParks extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'parks:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates parks when standards change.';

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
		$parks = Park::all();

		//notify
		$this->info('Adding Castles to Parks');
			
		//create bar
		$bar = $this->output->createProgressBar($parks->count());
		
		//update
		foreach($parks as $park){
			
			//check
			if($park->capital->buildings && $park->capital->buildings->count() > 0){
				foreach($park->capital->buildings as $building){
					if($building.building_id == 23){
							
						//advance
						$bar->advance();
						continue(2);
					}
				}
			}
			
			//attach their castle
			$park->capital->buildings()->attach(
				23, 
				[
					'size' => 1,
				]
			);
							
			//advance
			$bar->advance();
		}

		$this->info('All done!');
		$bar->finish();
	}
}
