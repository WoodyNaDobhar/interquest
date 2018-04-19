<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DOMDocument;
use App\Models\Park as Park;

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
        $parkID = 800;
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
	        					$coords = explode(',-', $coordGroup[1]);
	        					$lat = $coords[0];
	        					$lon = $coords[1];
	        				}else{
	        					$this->info($xml->getElementsByTagName('h3')[0]->nodeValue . ' (' . $parkID . ') has no or malformed map data.');
	        					$parkID++;
	        					continue(2);
	        				}
	        				break;
	        			}
	        		}
	        		
	        		//update those to the new paradigm
	        		$row = round(($lat - 20) * 100);
	        		$column = round(($lon - 50) * 100);

	        		//add 'em
	        		$park->row = $row;
	        		$park->column = $column;
	        		
	        		//save it
	        		$park->save();
	        		
	        		$this->info('Added ' . $xml->getElementsByTagName('h3')[0]->nodeValue . '(' . $parkID . ')');
	        	
	        	//This guy is empty
	        	}else{
	        		$this->info('This guy  (' . $parkID . ') is empty.');
	        		$endIfCount++;
	        	}
        	}
        	
        	//iterate
        	$parkID++;
        }
    }
}
