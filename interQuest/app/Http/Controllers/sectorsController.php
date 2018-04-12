<?php

namespace App\Http\Controllers;

use App\DataTables\sectorsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesectorsRequest;
use App\Http\Requests\UpdatesectorsRequest;
use App\Repositories\sectorsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class sectorsController extends AppBaseController
{
    /** @var  sectorsRepository */
    private $sectorsRepository;

    public function __construct(sectorsRepository $sectorsRepo)
    {
        $this->sectorsRepository = $sectorsRepo;
    }

    /**
     * Display a listing of the sectors.
     *
     * @param sectorsDataTable $sectorsDataTable
     * @return Response
     */
    public function index(sectorsDataTable $sectorsDataTable)
    {
        return $sectorsDataTable->render('sectors.index');
    }

    /**
     * Show the form for creating a new sectors.
     *
     * @return Response
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created sectors in storage.
     *
     * @param CreatesectorsRequest $request
     *
     * @return Response
     */
    public function store(CreatesectorsRequest $request)
    {
        $input = $request->all();

        $sectors = $this->sectorsRepository->create($input);

        Flash::success('Sectors saved successfully.');

        return redirect(route('sectors.index'));
    }

    /**
     * Display the specified sectors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sectors = $this->sectorsRepository->findWithoutFail($id);

        if (empty($sectors)) {
            Flash::error('Sectors not found');

            return redirect(route('sectors.index'));
        }

        return view('sectors.show')->with('sectors', $sectors);
    }

    /**
     * Show the form for editing the specified sectors.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sectors = $this->sectorsRepository->findWithoutFail($id);

        if (empty($sectors)) {
            Flash::error('Sectors not found');

            return redirect(route('sectors.index'));
        }

        return view('sectors.edit')->with('sectors', $sectors);
    }

    /**
     * Update the specified sectors in storage.
     *
     * @param  int              $id
     * @param UpdatesectorsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesectorsRequest $request)
    {
        $sectors = $this->sectorsRepository->findWithoutFail($id);

        if (empty($sectors)) {
            Flash::error('Sectors not found');

            return redirect(route('sectors.index'));
        }

        $sectors = $this->sectorsRepository->update($request->all(), $id);

        Flash::success('Sectors updated successfully.');

        return redirect(route('sectors.index'));
    }

    /**
     * Remove the specified sectors from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sectors = $this->sectorsRepository->findWithoutFail($id);

        if (empty($sectors)) {
            Flash::error('Sectors not found');

            return redirect(route('sectors.index'));
        }

        $this->sectorsRepository->delete($id);

        Flash::success('Sectors deleted successfully.');

        return redirect(route('sectors.index'));
    }
}
