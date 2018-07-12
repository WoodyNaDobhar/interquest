<?php

namespace App\Http\Controllers;

use App\DataTables\NpcDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNpcRequest;
use App\Http\Requests\UpdateNpcRequest;
use App\Repositories\NpcRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use App\Models\Action as Actions;
use App\Models\Vocation as Vocations;
use App\Models\Race as Races;
use App\Models\Park as Parks;
use App\Models\Territory as Territories;
use Auth;

class NpcController extends AppBaseController
{
	/** @var  NpcRepository */
	private $npcRepository;

	public function __construct(NpcRepository $npcRepo)
	{
		$this->npcRepository = $npcRepo;
	}

	/**
	 * Display a listing of the Npc.
	 *
	 * @param NpcDataTable $npcDataTable
	 * @return Response
	 */
	public function index(NpcDataTable $npcDataTable)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect('/');
		}
		return $npcDataTable->render('npcs.index');
	}

	/**
	 * Show the form for creating a new Npc.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		//security
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('npcs.index'));
		}
		
		//get vocations
		$vocations = Vocations::pluck('name', 'id')->toArray();
		
		//get races
		$races = Races::pluck('name', 'id')->toArray();
		
		//get parks
		$park = Auth::user()->persona->park;
		if(Auth::user()->is_admin){
			$parks = Parks::orderBy('name')->pluck('name', 'id')->toArray();
		}elseif(Auth::user()->is_mapkeeper){
			$parks = Parks::where('id', $park->id)->orderBy('name')->pluck('name', 'id')->toArray();
		}

		//get territories
		$territoriesObjs = Territories::whereBetween('row', [$park->capital->row - 10, $park->capital->row + 10])
			->whereBetween('column', [$park->capital->column - 10, $park->capital->column + 10])
			->get();
		foreach($territoriesObjs as $tObj){
			$territories[$tObj->id] = $tObj->name;
		}
		
		//get actions
		$actions = Actions::pluck('name', 'id')->toArray();
		
		//respond
		return view('npcs.create')
			->with('vocations', $vocations)
			->with('races', $races)
			->with('parks', $parks)
			->with('park', $park)
			->with('territories', $territories)
			->with('actions', $actions);
	}

	/**
	 * Store a newly created Npc in storage.
	 *
	 * @param CreateNpcRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNpcRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('npcs.index'));
		}
		$input = $request->all();

		$npc = $this->npcRepository->create($input);

		Flash::success('Npc saved successfully.');

		return redirect(route('npcs.index'));
	}

	/**
	 * Display the specified Npc.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$npc = $this->npcRepository->findWithoutFail($id);

		if (empty($npc)) {
			Flash::error('Npc not found');
			return redirect(route('npcs.index'));
		}

		return view('npcs.show')->with('npc', $npc);
	}

	/**
	 * Show the form for editing the specified Npc.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('npcs.index'));
		}
		$npc = $this->npcRepository->findWithoutFail($id);

		if (empty($npc)) {
			Flash::error('Npc not found');
			return redirect(route('npcs.index'));
		}
		
		//get vocations
		$vocations = Vocations::pluck('name', 'id')->toArray();
		
		//get races
		$races = Races::pluck('name', 'id')->toArray();
		
		//get parks
		$park = Auth::user()->persona->park;
		if(Auth::user()->is_admin){
			$parks = Parks::orderBy('name')->pluck('name', 'id')->toArray();
		}elseif(Auth::user()->is_mapkeeper){
			$parks = Parks::where('id', $park->id)->orderBy('name')->pluck('name', 'id')->toArray();
		}

		//get territories
		$territoriesObjs = Territories::whereBetween('row', [$park->capital->row - 10, $park->capital->row + 10])
			->whereBetween('column', [$park->capital->column - 10, $park->capital->column + 10])
			->get();
		foreach($territoriesObjs as $tObj){
			$territories[$tObj->id] = $tObj->name;
		}
		
		//get actions
		$actions = Actions::pluck('name', 'id')->toArray();

		return view('npcs.edit')
			->with('npc', $npc)
			->with('vocations', $vocations)
			->with('races', $races)
			->with('parks', $parks)
			->with('park', $park)
			->with('territories', $territories)
			->with('actions', $actions);
	}

	/**
	 * Update the specified Npc in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateNpcRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateNpcRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('npcs.index'));
		}
		$npc = $this->npcRepository->findWithoutFail($id);

		if (empty($npc)) {
			Flash::error('Npc not found');

			return redirect(route('npcs.index'));
		}

		$npc = $this->npcRepository->update($request->all(), $id);

		Flash::success('Npc updated successfully.');

		return redirect(route('npcs.index'));
	}

	/**
	 * Remove the specified Npc from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('npcs.index'));
		}
		$npc = $this->npcRepository->findWithoutFail($id);

		if (empty($npc)) {
			Flash::error('Npc not found');

			return redirect(route('npcs.index'));
		}

		$this->npcRepository->delete($id);

		Flash::success('Npc deleted successfully.');

		return redirect(route('npcs.index'));
	}
}
