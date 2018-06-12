<?php

namespace App\Http\Controllers;

use App\DataTables\ActionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Repositories\ActionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class ActionController extends AppBaseController
{
	/** @var  ActionRepository */
	private $actionRepository;

	public function __construct(ActionRepository $actionRepo)
	{
		$this->actionRepository = $actionRepo;
	}

	/**
	 * Display a listing of the Action.
	 *
	 * @param ActionDataTable $actionDataTable
	 * @return Response
	 */
	public function index(ActionDataTable $actionDataTable)
	{
		return $actionDataTable->render('actions.index');
	}

	/**
	 * Show the form for creating a new Action.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('actions.index'));
		}
		return view('actions.create');
	}

	/**
	 * Store a newly created Action in storage.
	 *
	 * @param CreateActionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateActionRequest $request)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('actions.index'));
		}
		$input = $request->all();

		$action = $this->actionRepository->create($input);

		Flash::success('Action saved successfully.');

		return redirect(route('actions.index'));
	}

	/**
	 * Display the specified Action.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$action = $this->actionRepository->findWithoutFail($id);

		if (empty($action)) {
			Flash::error('Action not found');

			return redirect(route('actions.index'));
		}

		return view('actions.show')->with('action', $action);
	}

	/**
	 * Show the form for editing the specified Action.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('actions.index'));
		}
		$action = $this->actionRepository->findWithoutFail($id);

		if (empty($action)) {
			Flash::error('Action not found');

			return redirect(route('actions.index'));
		}

		return view('actions.edit')->with('action', $action);
	}

	/**
	 * Update the specified Action in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateActionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateActionRequest $request)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('actions.index'));
		}
		$action = $this->actionRepository->findWithoutFail($id);

		if (empty($action)) {
			Flash::error('Action not found');

			return redirect(route('actions.index'));
		}

		$action = $this->actionRepository->update($request->all(), $id);

		Flash::success('Action updated successfully.');

		return redirect(route('actions.index'));
	}

	/**
	 * Remove the specified Action from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('actions.index'));
		}
		$action = $this->actionRepository->findWithoutFail($id);

		if (empty($action)) {
			Flash::error('Action not found');

			return redirect(route('actions.index'));
		}

		$this->actionRepository->delete($id);

		Flash::success('Action deleted successfully.');

		return redirect(route('actions.index'));
	}
}
