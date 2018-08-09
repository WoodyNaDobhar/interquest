<?php

namespace App\Http\Controllers;

use App\DataTables\FiefDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFiefRequest;
use App\Http\Requests\UpdateFiefRequest;
use App\Repositories\FiefRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use App\Models\Territory as Territory;
use App\Models\Persona as Persona;
use App\Models\Npc as Npc;
use Auth;

class FiefController extends AppBaseController
{
	/** @var  FiefRepository */
	private $fiefRepository;

	public function __construct(FiefRepository $fiefRepo)
	{
		$this->fiefRepository = $fiefRepo;
	}

	/**
	 * Display a listing of the Fief.
	 *
	 * @param FiefDataTable $fiefDataTable
	 * @return Response
	 */
	public function index(FiefDataTable $fiefDataTable)
	{
		return $fiefDataTable->render('fiefs.index');
	}

	/**
	 * Show the form for creating a new Fief.
	 *
	 * @return Response
	 */
	public function create($territoryId = null)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}
		
		//get territories
		$centerTarget = $territoryId ? 
			Territory::where('id', $territoryId)->first() : 
			Auth::user()->persona->park->capital;
		
		$centerLong = $centerTarget->column;
		$centerLat = $centerTarget->row;
		$territories = Territory::wherebetween('column', [$centerLong-5, $centerLong+4])
			->wherebetween('row', [$centerLat-5, $centerLat+4])
			->get()
			->pluck('displayname', 'id')
			->toArray();
		
		//get territory?
		$territory = null;
		if($territoryId){
			$territory = Territory::where('id', $territoryId)
				->first();
		}
		
		//get fiefdoms
		$fiefdoms = new \Illuminate\Database\Eloquent\Collection;;
		foreach(Auth::user()->persona->park->npcs as $npc){
			if(count($npc->fiefdoms) > 0){
				$fiefdoms = $fiefdoms->merge($npc->fiefdoms);
			}
		}
		foreach(Auth::user()->persona->park->personae as $persona){
			if(count($persona->fiefdoms) > 0){
				$fiefdoms = $fiefdoms->merge($persona->fiefdoms);
			}
		}

		//stewards
		$stewardsPersonae = Persona::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$stewardsNpcs = Npc::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
			
		return view('fiefs.create')
			->with('territories', $territories)
			->with('territory', $territory)
			->with('park', Auth::user()->persona->park)
			->with('fiefdoms', array_pluck($fiefdoms, 'name', 'id'))
			->with('stewardsPersonae', $stewardsPersonae)
			->with('stewardsNpcs', $stewardsNpcs);
	}

	/**
	 * Store a newly created Fief in storage.
	 *
	 * @param CreateFiefRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFiefRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}
		$input = $request->all();

		$fief = $this->fiefRepository->create($input);

		Flash::success('Fief saved successfully.');

		return redirect(route('fiefs.index'));
	}

	/**
	 * Display the specified Fief.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fief = $this->fiefRepository->findWithoutFail($id);

		if (empty($fief)) {
			Flash::error('Fief not found');
			return redirect(route('fiefs.index'));
		}
		
		//get territories
		$centerTarget = $fief->territory;
		$centerLong = $centerTarget->column;
		$centerLat = $centerTarget->row;
		$territories = Territory::wherebetween('column', [$centerLong-5, $centerLong+4])
			->wherebetween('row', [$centerLat-5, $centerLat+4])
			->get()
			->pluck('displayname', 'id')
			->toArray();

		return view('fiefs.show')
			->with('fief', $fief)
			->with('territories', $territories)
			->with('territory', $fief->territory)
			->with('park', Auth::user()->persona->park);
	}

	/**
	 * Show the form for editing the specified Fief.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$fief = $this->fiefRepository->findWithoutFail($id);

		if (empty($fief)) {
			Flash::error('Fief not found');
			return redirect(route('fiefs.index'));
		}
		
		$fiefRulerMapkeeperId = $fief->fiefdom_type == 'App\Models\Fiefdom' ? 
				$fief->fiefdom->ruler->park->mapkeeper->id :
			$fief->fiefdom_type == 'App\Models\Park' ?
				$fief->fiefdom->ruler->mapkeeper->id :
				0;
		$fiefRulerPersonaId = $fief->fiefdom_type == 'App\Models\Fiefdom' ?  
			(
				$fief->fiefdom->ruler_type == 'App\Models\Persona' ? 
					$fief->fiefdom->ruler_id :
					0
			) :
			0;
		if(Gate::denies('mapkeeperOwn', $fiefRulerMapkeeperId) &&
			Gate::denies('own', $fiefRulerPersonaId)
			){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}

		return view('fiefs.edit')->with('fief', $fief);
	}

	/**
	 * Update the specified Fief in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateFiefRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFiefRequest $request)
	{
		$fief = $this->fiefRepository->findWithoutFail($id);

		if (empty($fief)) {
			Flash::error('Fief not found');
			return redirect(route('fiefs.index'));
		}
		
		$fiefRulerMapkeeperId = $fief->fiefdom_type == 'App\Models\Fiefdom' ? 
				$fief->fiefdom->ruler->park->mapkeeper->id :
			$fief->fiefdom_type == 'App\Models\Park' ?
				$fief->fiefdom->ruler->mapkeeper->id :
				0;
		$fiefRulerPersonaId = $fief->fiefdom_type == 'App\Models\Fiefdom' ?  
			(
				$fief->fiefdom->ruler_type == 'App\Models\Persona' ? 
					$fief->fiefdom->ruler_id :
					0
			) :
			0;
		if(Gate::denies('mapkeeperOwn', $fiefRulerMapkeeperId) &&
			Gate::denies('own', $fiefRulerPersonaId)
			){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}

		$fief = $this->fiefRepository->update($request->all(), $id);

		Flash::success('Fief updated successfully.');

		return redirect(route('fiefs.index'));
	}

	/**
	 * Remove the specified Fief from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$fief = $this->fiefRepository->findWithoutFail($id);

		if (empty($fief)) {
			Flash::error('Fief not found');
			return redirect(route('fiefs.index'));
		}
		
		$fiefRulerMapkeeperId = $fief->fiefdom_type == 'App\Models\Fiefdom' ? 
				$fief->fiefdom->ruler->park->mapkeeper->id :
			$fief->fiefdom_type == 'App\Models\Park' ?
				$fief->fiefdom->ruler->mapkeeper->id :
				0;
		$fiefRulerPersonaId = $fief->fiefdom_type == 'App\Models\Fiefdom' ?  
			(
				$fief->fiefdom->ruler_type == 'App\Models\Persona' ? 
					$fief->fiefdom->ruler_id :
					0
			) :
			0;
		if(Gate::denies('mapkeeperOwn', $fiefRulerMapkeeperId) &&
			Gate::denies('own', $fiefRulerPersonaId)
			){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}

		$this->fiefRepository->delete($id);

		Flash::success('Fief deleted successfully.');

		return redirect(route('fiefs.index'));
	}
}
