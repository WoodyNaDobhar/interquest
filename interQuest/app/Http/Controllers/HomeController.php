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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(PersonaDataTable $personaDataTable)
	{
		$dataTable = $personaDataTable
			->html([
				'name' => ['title' => 'Persona', 'name' => 'name', 'data' => 'name'],
			])
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
