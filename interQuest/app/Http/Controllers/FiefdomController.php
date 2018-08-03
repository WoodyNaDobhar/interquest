<?php

namespace App\Http\Controllers;

use App\DataTables\FiefdomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFiefdomRequest;
use App\Http\Requests\UpdateFiefdomRequest;
use App\Repositories\FiefdomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use App\Models\Persona as Persona;
use App\Models\Npc as Npc;
use App\Models\Fief as Fief;
use App\Models\Fiefdom as Fiefdom;
use Auth;
use App\DataTables\FiefDataTable;
use Datatables;

class FiefdomController extends AppBaseController
{
	/** @var  FiefdomRepository */
	private $fiefdomRepository;

	public function __construct(FiefdomRepository $fiefdomRepo)
	{
		$this->fiefdomRepository = $fiefdomRepo;
	}

	/**
	 * Display a listing of the Fiefdom.
	 *
	 * @param FiefdomDataTable $fiefdomDataTable
	 * @return Response
	 */
	public function index(FiefdomDataTable $fiefdomDataTable)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect('/');
		}
		return $fiefdomDataTable->render('fiefdoms.index');
	}

	/**
	 * Show the form for creating a new Fiefdom.
	 *
	 * @return Response
	 */
	public function create($rulerId = null, $rulerType = null)
	{
		
		//security
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefdoms.index'));
		}

		//rulers
		$rulersPersonae = Persona::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$rulersNpcs = Npc::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$rulerFiefdoms = $rulerId ? 
			Fiefdom::where('ruler_id', $rulerId)->where('ruler_type', $rulerType)->pluck('name', 'id')->toArray():
			[];
		
		//respond
		return view('fiefdoms.create')
			->with('rulersPersonae', $rulersPersonae)
			->with('rulersNpcs', $rulersNpcs)
			->with('rulerFiefdoms', $rulerFiefdoms)
			->with('rulerId', $rulerId)
			->with('rulerType', $rulerType);
	}

	/**
	 * Store a newly created Fiefdom in storage.
	 *
	 * @param CreateFiefdomRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateFiefdomRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefdoms.index'));
		}
		$input = $request->all();

		$fiefdom = $this->fiefdomRepository->create($input);

		Flash::success('Fiefdom saved successfully.');

		return redirect(route('fiefdoms.index'));
	}

	/**
	 * Display the specified Fiefdom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$fiefdom = $this->fiefdomRepository->findWithoutFail($id);

		if (empty($fiefdom)) {
			Flash::error('Fiefdom not found');
			return redirect(route('fiefdoms.index'));
		}

        return view('fiefdoms.show')->with('fiefdom', $fiefdom);
	}

	/**
	 * Show the form for editing the specified Fiefdom.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefdoms.index'));
		}
		$fiefdom = $this->fiefdomRepository->findWithoutFail($id);

		if (empty($fiefdom)) {
			Flash::error('Fiefdom not found');

			return redirect(route('fiefdoms.index'));
		}

		//rulers
		$rulersPersonae = Persona::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$rulersNpcs = Npc::where('park_id', Auth::user()->persona->park_id)->pluck('name', 'id')->toArray();
		$rulerFiefdoms = $fiefdom->ruler->fiefdoms->pluck('name', 'id')->toArray();
		dd($rulerFiefdoms);
		return view('fiefdoms.edit')
			->with('fiefdom', $fiefdom)
			->with('rulersPersonae', $rulersPersonae)
			->with('rulersNpcs', $rulersNpcs)
			->with('rulerFiefdoms', $rulerFiefdoms);
	}

	/**
	 * Update the specified Fiefdom in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateFiefdomRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateFiefdomRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('fiefdoms.index'));
		}
		$fiefdom = $this->fiefdomRepository->findWithoutFail($id);

		if (empty($fiefdom)) {
			Flash::error('Fiefdom not found');

			return redirect(route('fiefdoms.index'));
		}

		$fiefdom = $this->fiefdomRepository->update($request->all(), $id);

		Flash::success('Fiefdom updated successfully.');

		return redirect(route('fiefdoms.index'));
	}

	/**
	 * Remove the specified Fiefdom from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('fiefdoms.index'));
		}
		$fiefdom = $this->fiefdomRepository->findWithoutFail($id);

		if (empty($fiefdom)) {
			Flash::error('Fiefdom not found');
			return redirect(route('fiefdoms.index'));
		}

		$this->fiefdomRepository->delete($id);

		Flash::success('Fiefdom deleted successfully.');

		return redirect(route('fiefdoms.index'));
	}
}
