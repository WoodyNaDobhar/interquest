<?php

namespace App\Http\Controllers;

use App\DataTables\terrainsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateterrainsRequest;
use App\Http\Requests\UpdateterrainsRequest;
use App\Repositories\terrainsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class terrainsController extends AppBaseController
{
    /** @var  terrainsRepository */
    private $terrainsRepository;

    public function __construct(terrainsRepository $terrainsRepo)
    {
        $this->terrainsRepository = $terrainsRepo;
    }

    /**
     * Display a listing of the terrains.
     *
     * @param terrainsDataTable $terrainsDataTable
     * @return Response
     */
    public function index(terrainsDataTable $terrainsDataTable)
    {
        return $terrainsDataTable->render('terrains.index');
    }

    /**
     * Show the form for creating a new terrains.
     *
     * @return Response
     */
    public function create()
    {
        return view('terrains.create');
    }

    /**
     * Store a newly created terrains in storage.
     *
     * @param CreateterrainsRequest $request
     *
     * @return Response
     */
    public function store(CreateterrainsRequest $request)
    {
        $input = $request->all();

        $terrains = $this->terrainsRepository->create($input);

        Flash::success('Terrain saved successfully.');

        return redirect(route('terrains.index'));
    }

    /**
     * Display the specified terrains.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $terrains = $this->terrainsRepository->findWithoutFail($id);

        if (empty($terrains)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        return view('terrains.show')->with('terrain', $terrains);
    }

    /**
     * Show the form for editing the specified terrains.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $terrains = $this->terrainsRepository->findWithoutFail($id);

        if (empty($terrains)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        return view('terrains.edit')->with('terrain', $terrains);
    }

    /**
     * Update the specified terrains in storage.
     *
     * @param  int              $id
     * @param UpdateterrainsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateterrainsRequest $request)
    {
        $terrains = $this->terrainsRepository->findWithoutFail($id);

        if (empty($terrains)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        $terrains = $this->terrainsRepository->update($request->all(), $id);

        Flash::success('Terrain updated successfully.');

        return redirect(route('terrains.index'));
    }

    /**
     * Remove the specified terrains from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $terrains = $this->terrainsRepository->findWithoutFail($id);

        if (empty($terrains)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        $this->terrainsRepository->delete($id);

        Flash::success('Terrain deleted successfully.');

        return redirect(route('terrains.index'));
    }
}
