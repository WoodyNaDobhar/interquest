<?php

namespace App\Http\Controllers;

use App\DataTables\territoriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateterritoriesRequest;
use App\Http\Requests\UpdateterritoriesRequest;
use App\Repositories\territoriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class territoriesController extends AppBaseController
{
    /** @var  territoriesRepository */
    private $territoriesRepository;

    public function __construct(territoriesRepository $territoriesRepo)
    {
        $this->territoriesRepository = $territoriesRepo;
    }

    /**
     * Display a listing of the territories.
     *
     * @param territoriesDataTable $territoriesDataTable
     * @return Response
     */
    public function index(territoriesDataTable $territoriesDataTable)
    {
        return $territoriesDataTable->render('territories.index');
    }

    /**
     * Show the form for creating a new territories.
     *
     * @return Response
     */
    public function create()
    {
        return view('territories.create');
    }

    /**
     * Store a newly created territories in storage.
     *
     * @param CreateterritoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateterritoriesRequest $request)
    {
        $input = $request->all();

        $territories = $this->territoriesRepository->create($input);

        Flash::success('Territory saved successfully.');

        return redirect(route('territories.index'));
    }

    /**
     * Display the specified territories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $territories = $this->territoriesRepository->findWithoutFail($id);

        if (empty($territories)) {
            Flash::error('Territory not found');

            return redirect(route('territories.index'));
        }

        return view('territories.show')->with('territory', $territories);
    }

    /**
     * Show the form for editing the specified territories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $territories = $this->territoriesRepository->findWithoutFail($id);

        if (empty($territories)) {
            Flash::error('Territory not found');

            return redirect(route('territories.index'));
        }

        return view('territories.edit')->with('territory', $territories);
    }

    /**
     * Update the specified territories in storage.
     *
     * @param  int              $id
     * @param UpdateterritoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateterritoriesRequest $request)
    {
        $territories = $this->territoriesRepository->findWithoutFail($id);

        if (empty($territories)) {
            Flash::error('Territory not found');

            return redirect(route('territories.index'));
        }

        $territories = $this->territoriesRepository->update($request->all(), $id);

        Flash::success('Territory updated successfully.');

        return redirect(route('territories.index'));
    }

    /**
     * Remove the specified territories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $territories = $this->territoriesRepository->findWithoutFail($id);

        if (empty($territories)) {
            Flash::error('Territory not found');

            return redirect(route('territories.index'));
        }

        $this->territoriesRepository->delete($id);

        Flash::success('Territory deleted successfully.');

        return redirect(route('territories.index'));
    }
}
