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
	public function create()
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefs.index'));
		}
		return view('fiefs.create');
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

		return view('fiefs.show')->with('fief', $fief);
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
