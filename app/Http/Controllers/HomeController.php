<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\DataTables\PersonaDataTable;
use Auth;

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
}
