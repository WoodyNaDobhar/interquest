<?php

namespace App\Http\Controllers;

use App\DataTables\npcsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatenpcsRequest;
use App\Http\Requests\UpdatenpcsRequest;
use App\Repositories\npcsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class npcsController extends AppBaseController
{
    /** @var  npcsRepository */
    private $npcsRepository;

    public function __construct(npcsRepository $npcsRepo)
    {
        $this->npcsRepository = $npcsRepo;
    }

    /**
     * Display a listing of the npcs.
     *
     * @param npcsDataTable $npcsDataTable
     * @return Response
     */
    public function index(npcsDataTable $npcsDataTable)
    {
        return $npcsDataTable->render('npcs.index');
    }

    /**
     * Show the form for creating a new npcs.
     *
     * @return Response
     */
    public function create()
    {
        return view('npcs.create');
    }

    /**
     * Store a newly created npcs in storage.
     *
     * @param CreatenpcsRequest $request
     *
     * @return Response
     */
    public function store(CreatenpcsRequest $request)
    {
        $input = $request->all();

        $npcs = $this->npcsRepository->create($input);

        Flash::success('Npcs saved successfully.');

        return redirect(route('npcs.index'));
    }

    /**
     * Display the specified npcs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $npcs = $this->npcsRepository->findWithoutFail($id);

        if (empty($npcs)) {
            Flash::error('Npcs not found');

            return redirect(route('npcs.index'));
        }

        return view('npcs.show')->with('npcs', $npcs);
    }

    /**
     * Show the form for editing the specified npcs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $npcs = $this->npcsRepository->findWithoutFail($id);

        if (empty($npcs)) {
            Flash::error('Npcs not found');

            return redirect(route('npcs.index'));
        }

        return view('npcs.edit')->with('npcs', $npcs);
    }

    /**
     * Update the specified npcs in storage.
     *
     * @param  int              $id
     * @param UpdatenpcsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenpcsRequest $request)
    {
        $npcs = $this->npcsRepository->findWithoutFail($id);

        if (empty($npcs)) {
            Flash::error('Npcs not found');

            return redirect(route('npcs.index'));
        }

        $npcs = $this->npcsRepository->update($request->all(), $id);

        Flash::success('Npcs updated successfully.');

        return redirect(route('npcs.index'));
    }

    /**
     * Remove the specified npcs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $npcs = $this->npcsRepository->findWithoutFail($id);

        if (empty($npcs)) {
            Flash::error('Npcs not found');

            return redirect(route('npcs.index'));
        }

        $this->npcsRepository->delete($id);

        Flash::success('Npcs deleted successfully.');

        return redirect(route('npcs.index'));
    }
}
