<?php

namespace App\Http\Controllers;

use App\DataTables\ParkDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParkRequest;
use App\Http\Requests\UpdateParkRequest;
use App\Repositories\ParkRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParkController extends AppBaseController
{
    /** @var  ParkRepository */
    private $parkRepository;

    public function __construct(ParkRepository $parkRepo)
    {
        $this->parkRepository = $parkRepo;
    }

    /**
     * Display a listing of the Park.
     *
     * @param ParkDataTable $parkDataTable
     * @return Response
     */
    public function index(ParkDataTable $parkDataTable)
    {
        return $parkDataTable->render('parks.index');
    }

    /**
     * Show the form for creating a new Park.
     *
     * @return Response
     */
    public function create()
    {
        return view('parks.create');
    }

    /**
     * Store a newly created Park in storage.
     *
     * @param CreateParkRequest $request
     *
     * @return Response
     */
    public function store(CreateParkRequest $request)
    {
        $input = $request->all();

        $park = $this->parkRepository->create($input);

        Flash::success('Park saved successfully.');

        return redirect(route('parks.index'));
    }

    /**
     * Display the specified Park.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            Flash::error('Park not found');

            return redirect(route('parks.index'));
        }

        return view('parks.show')->with('park', $park);
    }

    /**
     * Show the form for editing the specified Park.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            Flash::error('Park not found');

            return redirect(route('parks.index'));
        }

        return view('parks.edit')->with('park', $park);
    }

    /**
     * Update the specified Park in storage.
     *
     * @param  int              $id
     * @param UpdateParkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParkRequest $request)
    {
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            Flash::error('Park not found');

            return redirect(route('parks.index'));
        }

        $park = $this->parkRepository->update($request->all(), $id);

        Flash::success('Park updated successfully.');

        return redirect(route('parks.index'));
    }

    /**
     * Remove the specified Park from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            Flash::error('Park not found');

            return redirect(route('parks.index'));
        }

        $this->parkRepository->delete($id);

        Flash::success('Park deleted successfully.');

        return redirect(route('parks.index'));
    }
}
