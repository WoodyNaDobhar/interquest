<?php

namespace App\Http\Controllers;

use App\DataTables\equipmentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateequipmentsRequest;
use App\Http\Requests\UpdateequipmentsRequest;
use App\Repositories\equipmentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class equipmentsController extends AppBaseController
{
    /** @var  equipmentsRepository */
    private $equipmentsRepository;

    public function __construct(equipmentsRepository $equipmentsRepo)
    {
        $this->equipmentsRepository = $equipmentsRepo;
    }

    /**
     * Display a listing of the equipments.
     *
     * @param equipmentsDataTable $equipmentsDataTable
     * @return Response
     */
    public function index(equipmentsDataTable $equipmentsDataTable)
    {
        return $equipmentsDataTable->render('equipments.index');
    }

    /**
     * Show the form for creating a new equipments.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
     * Store a newly created equipments in storage.
     *
     * @param CreateequipmentsRequest $request
     *
     * @return Response
     */
    public function store(CreateequipmentsRequest $request)
    {
        $input = $request->all();

        $equipments = $this->equipmentsRepository->create($input);

        Flash::success('Equipment saved successfully.');

        return redirect(route('equipments.index'));
    }

    /**
     * Display the specified equipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipment not found');

            return redirect(route('equipments.index'));
        }

        return view('equipments.show')->with('equipment', $equipments);
    }

    /**
     * Show the form for editing the specified equipments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipment not found');

            return redirect(route('equipments.index'));
        }

        return view('equipments.edit')->with('equipment', $equipments);
    }

    /**
     * Update the specified equipments in storage.
     *
     * @param  int              $id
     * @param UpdateequipmentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateequipmentsRequest $request)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipment not found');

            return redirect(route('equipments.index'));
        }

        $equipments = $this->equipmentsRepository->update($request->all(), $id);

        Flash::success('Equipment updated successfully.');

        return redirect(route('equipments.index'));
    }

    /**
     * Remove the specified equipments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipments = $this->equipmentsRepository->findWithoutFail($id);

        if (empty($equipments)) {
            Flash::error('Equipment not found');

            return redirect(route('equipments.index'));
        }

        $this->equipmentsRepository->delete($id);

        Flash::success('Equipment deleted successfully.');

        return redirect(route('equipments.index'));
    }
}
