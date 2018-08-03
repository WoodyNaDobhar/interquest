<?php

namespace App\Http\Controllers;

use App\DataTables\TerritoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTerritoryRequest;
use App\Http\Requests\UpdateTerritoryRequest;
use App\Repositories\TerritoryRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;
use Gate;
use Auth;
use App\Models\Terrain as Terrain;
use App\Models\Persona as Persona;
use App\Models\Npc as Npc;

class TerritoryController extends AppBaseController
{
	/** @var  TerritoryRepository */
	private $territoryRepository;

	public function __construct(TerritoryRepository $territoryRepo)
	{
		$this->territoryRepository = $territoryRepo;
	}

	/**
	 * Display a listing of the Territory.
	 *
	 * @param TerritoryDataTable $territoryDataTable
	 * @return Response
	 */
	public function index(TerritoryDataTable $territoryDataTable)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect('/');
		}
		return $territoryDataTable->render('territories.index');
	}

	/**
	 * Show the form for creating a new Territory.
	 *
	 * @return Response
	 */
	public function create($column, $row)
	{
		
		//security
		if(Gate::denies('admin') && Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		
		//location
		$location = [
			'column'	=> $column,
			'row'		=> $row
		];

		//rulers
		$rulersPersonae = Persona::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$rulersNpcs = Npc::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		
		//get terrains
		$terrains = Terrain::pluck('name', 'id')->toArray();
		
		return view('territories.create')
			->with('location', $location)
			->with('terrains', $terrains)
			->with('rulersPersonae', $rulersPersonae)
			->with('rulersNpcs', $rulersNpcs);
	}

	/**
	 * Store a newly created Territory in storage.
	 *
	 * @param CreateTerritoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTerritoryRequest $request)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		$input = $request->all();

		$territory = $this->territoryRepository->create($input);

		Flash::success('Territory saved successfully.');

		return redirect(route('territories.index'));
	}

	/**
	 * Display the specified Territory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		$territory = $this->territoryRepository->findWithoutFail($id);

		if (empty($territory)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		return view('territories.show')->with('territory', $territory);
	}

	/**
	 * Show the form for editing the specified Territory.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		$territory = $this->territoryRepository->findWithoutFail($id);

		if (empty($territory)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}
		
		//get terrains
		$terrains = Terrain::pluck('name', 'id')->toArray();

		return view('territories.edit')
			->with('territory', $territory)
			->with('terrains', $terrains);
	}

	/**
	 * Update the specified Territory in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateTerritoryRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTerritoryRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		$territory = $this->territoryRepository->findWithoutFail($id);

		if (empty($territory)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		$territory = $this->territoryRepository->update($request->all(), $id);

		Flash::success('Territory updated successfully.');

		return redirect(route('territories.index'));
	}

	/**
	 * Remove the specified Territory from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('territories.index'));
		}
		$territory = $this->territoryRepository->findWithoutFail($id);

		if (empty($territory)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		$this->territoryRepository->delete($id);

		Flash::success('Territory deleted successfully.');

		return redirect(route('territories.index'));
	}
}
