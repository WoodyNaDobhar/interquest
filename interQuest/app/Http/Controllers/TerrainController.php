<?php

namespace App\Http\Controllers;

use App\DataTables\TerrainDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;
use App\Repositories\TerrainRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class TerrainController extends AppBaseController
{
    /** @var  TerrainRepository */
    private $terrainRepository;

    public function __construct(TerrainRepository $terrainRepo)
    {
        $this->terrainRepository = $terrainRepo;
    }

    /**
     * Display a listing of the Terrain.
     *
     * @param TerrainDataTable $terrainDataTable
     * @return Response
     */
    public function index(TerrainDataTable $terrainDataTable)
    {
        return $terrainDataTable->render('terrains.index');
    }

    /**
     * Show the form for creating a new Terrain.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('races.index'));
        }
        return view('terrains.create');
    }

    /**
     * Store a newly created Terrain in storage.
     *
     * @param CreateTerrainRequest $request
     *
     * @return Response
     */
    public function store(CreateTerrainRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('races.index'));
        }
        $input = $request->all();

        $terrain = $this->terrainRepository->create($input);

        Flash::success('Terrain saved successfully.');

        return redirect(route('terrains.index'));
    }

    /**
     * Display the specified Terrain.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        return view('terrains.show')->with('terrain', $terrain);
    }

    /**
     * Show the form for editing the specified Terrain.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('races.index'));
        }
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        return view('terrains.edit')->with('terrain', $terrain);
    }

    /**
     * Update the specified Terrain in storage.
     *
     * @param  int              $id
     * @param UpdateTerrainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTerrainRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('races.index'));
        }
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        $terrain = $this->terrainRepository->update($request->all(), $id);

        Flash::success('Terrain updated successfully.');

        return redirect(route('terrains.index'));
    }

    /**
     * Remove the specified Terrain from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('races.index'));
        }
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            Flash::error('Terrain not found');

            return redirect(route('terrains.index'));
        }

        $this->terrainRepository->delete($id);

        Flash::success('Terrain deleted successfully.');

        return redirect(route('terrains.index'));
    }
}
