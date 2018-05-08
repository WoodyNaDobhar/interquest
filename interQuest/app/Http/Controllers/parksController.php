<?php

namespace App\Http\Controllers;

use App\DataTables\parksDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateparksRequest;
use App\Http\Requests\UpdateparksRequest;
use App\Repositories\parksRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class parksController extends AppBaseController
{
	/** @var  parksRepository */
	private $parksRepository;

	public function __construct(parksRepository $parksRepo)
	{
		$this->parksRepository = $parksRepo;
	}

	/**
	 * Display a listing of the parks.
	 *
	 * @param parksDataTable $parksDataTable
	 * @return Response
	 */
	public function index(parksDataTable $parksDataTable)
	{
		return $parksDataTable->render('parks.index');
	}

	/**
	 * Show the form for creating a new parks.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('parks.create');
	}

	/**
	 * Store a newly created parks in storage.
	 *
	 * @param CreateparksRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateparksRequest $request)
	{
		$input = $request->all();

		$parks = $this->parksRepository->create($input);

		Flash::success('Park saved successfully.');

		return redirect(route('parks.index'));
	}

	/**
	 * Display the specified parks.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$parks = $this->parksRepository->findWithoutFail($id);

		if (empty($parks)) {
			Flash::error('Park not found');

			return redirect(route('parks.index'));
		}

		return view('parks.show')->with('park', $parks);
	}

	/**
	 * Show the form for editing the specified parks.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$parks = $this->parksRepository->findWithoutFail($id);

		if (empty($parks)) {
			Flash::error('Park not found');

			return redirect(route('parks.index'));
		}

		return view('parks.edit')->with('park', $parks);
	}

	/**
	 * Update the specified parks in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateparksRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateparksRequest $request)
	{
		$parks = $this->parksRepository->findWithoutFail($id);

		if (empty($parks)) {
			Flash::error('Park not found');

			return redirect(route('parks.index'));
		}

		$parks = $this->parksRepository->update($request->all(), $id);

		Flash::success('Park updated successfully.');

		return redirect(route('parks.index'));
	}

	/**
	 * Remove the specified parks from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$parks = $this->parksRepository->findWithoutFail($id);

		if (empty($parks)) {
			Flash::error('Park not found');

			return redirect(route('parks.index'));
		}

		$this->parksRepository->delete($id);

		Flash::success('Park deleted successfully.');

		return redirect(route('parks.index'));
	}
}
