<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\DataTables\PersonaDataTable;
use Auth;
use DOMDocument;

class HomeController extends Controller
{
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(PersonaDataTable $personaDataTable)
	{
		if(Auth::guest()){
			return view('welcome');
		}else{
			$dataTable = $personaDataTable
				->html(
					[
						'name' => ['title' => 'Persona', 'name' => 'name', 'data' => 'name'],
					],
					[
						[
							 'extend'  => 'collection',
							 'text'	=> '<i class="fa fa-download"></i> Export',
							 'buttons' => [
								 'csv',
								 'excel',
								 'pdf',
							 ],
						]
					],
					'27%'
				)
				->ajax([
					'url' => route('personae.index'),
					'type' => 'GET',
					'data' => 'function(d) { 
						d.park_id = ' . Auth::user()->persona->park_id . '; 
					}',
				]);
			return view('landing', compact('dataTable'));
		}
	}
	
	/**
	 * Show the given interQuest wiki page
	 *
	 * @return void
	 */
	public function rules($pageId = 'Main_Page')
	{
		
		//setup
		$wikontent = '';
		$html = 'https://www.interquestonline.com/wiki/' . $pageId;
		
		// Create a new DOM Document to hold our webpage structure
		$xml = new DOMDocument();
		
		// Load the url's contents into the DOM
		@$xml->loadHTMLFile($html);
		
		//make sure it's not 'empty'
		if($xml->doctype){
			
			//determine target
			$body = $xml->getElementsByTagName('body')[0];
			
			//get contents
			$section = $xml->getElementById('bodyContent');
			
			//add it to the target
			$wikontent .= $body->ownerDocument->saveHTML($section);
			
			//update contents
			$wikontent = str_replace('/wiki/', '/rules/', $wikontent);
		}
		
		//return view
		return view('wiki')->with('pageId', $pageId == 'Main_Page' ? 'InterQuest Rules' : str_replace('_', ' ', ucfirst($pageId)))->with('wikontent', $wikontent);
	}
}
