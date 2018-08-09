<?php

namespace App\Http\Controllers;

use App\DataTables\MetatypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMetatypeRequest;
use App\Http\Requests\UpdateMetatypeRequest;
use App\Repositories\MetatypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class MetatypeController extends AppBaseController
{
    /** @var  MetatypeRepository */
    private $metatypeRepository;

    public function __construct(MetatypeRepository $metatypeRepo)
    {
        $this->metatypeRepository = $metatypeRepo;
    }

    /**
     * Display a listing of the Metatype.
     *
     * @param MetatypeDataTable $metatypeDataTable
     * @return Response
     */
    public function index(MetatypeDataTable $metatypeDataTable)
    {
        return $metatypeDataTable->render('metatypes.index');
    }

    /**
     * Show the form for creating a new Metatype.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('metatypes.index'));
        }
        return view('metatypes.create');
    }

    /**
     * Store a newly created Metatype in storage.
     *
     * @param CreateMetatypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMetatypeRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('metatypes.index'));
        }
        $input = $request->all();

        $metatype = $this->metatypeRepository->create($input);

        Flash::success('Metatype saved successfully.');

        return redirect(route('metatypes.index'));
    }

    /**
     * Display the specified Metatype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            Flash::error('Metatype not found');

            return redirect(route('metatypes.index'));
        }

        return view('metatypes.show')->with('metatype', $metatype);
    }

    /**
     * Show the form for editing the specified Metatype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('metatypes.index'));
        }
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            Flash::error('Metatype not found');

            return redirect(route('metatypes.index'));
        }

        return view('metatypes.edit')->with('metatype', $metatype);
    }

    /**
     * Update the specified Metatype in storage.
     *
     * @param  int              $id
     * @param UpdateMetatypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetatypeRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('metatypes.index'));
        }
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            Flash::error('Metatype not found');

            return redirect(route('metatypes.index'));
        }

        $metatype = $this->metatypeRepository->update($request->all(), $id);

        Flash::success('Metatype updated successfully.');

        return redirect(route('metatypes.index'));
    }

    /**
     * Remove the specified Metatype from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('metatypes.index'));
        }
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            Flash::error('Metatype not found');

            return redirect(route('metatypes.index'));
        }

        $this->metatypeRepository->delete($id);

        Flash::success('Metatype deleted successfully.');

        return redirect(route('metatypes.index'));
    }
}
