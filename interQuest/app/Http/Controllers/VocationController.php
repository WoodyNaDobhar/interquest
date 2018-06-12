<?php

namespace App\Http\Controllers;

use App\DataTables\VocationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVocationRequest;
use App\Http\Requests\UpdateVocationRequest;
use App\Repositories\VocationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class VocationController extends AppBaseController
{
    /** @var  VocationRepository */
    private $vocationRepository;

    public function __construct(VocationRepository $vocationRepo)
    {
        $this->vocationRepository = $vocationRepo;
    }

    /**
     * Display a listing of the Vocation.
     *
     * @param VocationDataTable $vocationDataTable
     * @return Response
     */
    public function index(VocationDataTable $vocationDataTable)
    {
        return $vocationDataTable->render('vocations.index');
    }

    /**
     * Show the form for creating a new Vocation.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('vocations.index'));
        }
        return view('vocations.create');
    }

    /**
     * Store a newly created Vocation in storage.
     *
     * @param CreateVocationRequest $request
     *
     * @return Response
     */
    public function store(CreateVocationRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('vocations.index'));
        }
        $input = $request->all();

        $vocation = $this->vocationRepository->create($input);

        Flash::success('Vocation saved successfully.');

        return redirect(route('vocations.index'));
    }

    /**
     * Display the specified Vocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            Flash::error('Vocation not found');

            return redirect(route('vocations.index'));
        }

        return view('vocations.show')->with('vocation', $vocation);
    }

    /**
     * Show the form for editing the specified Vocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('vocations.index'));
        }
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            Flash::error('Vocation not found');

            return redirect(route('vocations.index'));
        }

        return view('vocations.edit')->with('vocation', $vocation);
    }

    /**
     * Update the specified Vocation in storage.
     *
     * @param  int              $id
     * @param UpdateVocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocationRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('vocations.index'));
        }
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            Flash::error('Vocation not found');

            return redirect(route('vocations.index'));
        }

        $vocation = $this->vocationRepository->update($request->all(), $id);

        Flash::success('Vocation updated successfully.');

        return redirect(route('vocations.index'));
    }

    /**
     * Remove the specified Vocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('vocations.index'));
        }
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            Flash::error('Vocation not found');

            return redirect(route('vocations.index'));
        }

        $this->vocationRepository->delete($id);

        Flash::success('Vocation deleted successfully.');

        return redirect(route('vocations.index'));
    }
}
