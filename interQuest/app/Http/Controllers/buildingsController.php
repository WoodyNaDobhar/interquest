<?php

namespace App\Http\Controllers;

use App\DataTables\buildingsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebuildingsRequest;
use App\Http\Requests\UpdatebuildingsRequest;
use App\Repositories\buildingsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class buildingsController extends AppBaseController
{
    /** @var  buildingsRepository */
    private $buildingsRepository;

    public function __construct(buildingsRepository $buildingsRepo)
    {
        $this->buildingsRepository = $buildingsRepo;
    }

    /**
     * Display a listing of the buildings.
     *
     * @param buildingsDataTable $buildingsDataTable
     * @return Response
     */
    public function index(buildingsDataTable $buildingsDataTable)
    {
        return $buildingsDataTable->render('buildings.index');
    }

    /**
     * Show the form for creating a new buildings.
     *
     * @return Response
     */
    public function create()
    {
        return view('buildings.create');
    }

    /**
     * Store a newly created buildings in storage.
     *
     * @param CreatebuildingsRequest $request
     *
     * @return Response
     */
    public function store(CreatebuildingsRequest $request)
    {
        $input = $request->all();

        $buildings = $this->buildingsRepository->create($input);

        Flash::success('Buildings saved successfully.');

        return redirect(route('buildings.index'));
    }

    /**
     * Display the specified buildings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buildings = $this->buildingsRepository->findWithoutFail($id);

        if (empty($buildings)) {
            Flash::error('Buildings not found');

            return redirect(route('buildings.index'));
        }

        return view('buildings.show')->with('buildings', $buildings);
    }

    /**
     * Show the form for editing the specified buildings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buildings = $this->buildingsRepository->findWithoutFail($id);

        if (empty($buildings)) {
            Flash::error('Buildings not found');

            return redirect(route('buildings.index'));
        }

        return view('buildings.edit')->with('buildings', $buildings);
    }

    /**
     * Update the specified buildings in storage.
     *
     * @param  int              $id
     * @param UpdatebuildingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebuildingsRequest $request)
    {
        $buildings = $this->buildingsRepository->findWithoutFail($id);

        if (empty($buildings)) {
            Flash::error('Buildings not found');

            return redirect(route('buildings.index'));
        }

        $buildings = $this->buildingsRepository->update($request->all(), $id);

        Flash::success('Buildings updated successfully.');

        return redirect(route('buildings.index'));
    }

    /**
     * Remove the specified buildings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buildings = $this->buildingsRepository->findWithoutFail($id);

        if (empty($buildings)) {
            Flash::error('Buildings not found');

            return redirect(route('buildings.index'));
        }

        $this->buildingsRepository->delete($id);

        Flash::success('Buildings deleted successfully.');

        return redirect(route('buildings.index'));
    }
}
