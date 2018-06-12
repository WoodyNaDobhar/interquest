<?php

namespace App\Http\Controllers;

use App\DataTables\BuildingTerritoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBuildingTerritoryRequest;
use App\Http\Requests\UpdateBuildingTerritoryRequest;
use App\Repositories\BuildingTerritoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class BuildingTerritoryController extends AppBaseController
{
    /** @var  BuildingTerritoryRepository */
    private $buildingTerritoryRepository;

    public function __construct(BuildingTerritoryRepository $buildingTerritoryRepo)
    {
        $this->buildingTerritoryRepository = $buildingTerritoryRepo;
    }

    /**
     * Display a listing of the BuildingTerritory.
     *
     * @param BuildingTerritoryDataTable $buildingTerritoryDataTable
     * @return Response
     */
    public function index(BuildingTerritoryDataTable $buildingTerritoryDataTable)
    {
        return $buildingTerritoryDataTable->render('building_territories.index');
    }

    /**
     * Show the form for creating a new BuildingTerritory.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('mapkeeper')){
        	Flash::error('Permission Denied');
        	return redirect(route('building_territories.index'));
        }
        return view('building_territories.create');
    }

    /**
     * Store a newly created BuildingTerritory in storage.
     *
     * @param CreateBuildingTerritoryRequest $request
     *
     * @return Response
     */
    public function store(CreateBuildingTerritoryRequest $request)
    {
        $input = $request->all();

        $buildingTerritory = $this->buildingTerritoryRepository->create($input);

        Flash::success('Building Territory saved successfully.');

        return redirect(route('buildingTerritories.index'));
    }

    /**
     * Display the specified BuildingTerritory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            Flash::error('Building Territory not found');
            return redirect(route('buildingTerritories.index'));
        }

        return view('building_territories.show')->with('buildingTerritory', $buildingTerritory);
    }

    /**
     * Show the form for editing the specified BuildingTerritory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    	if(Gate::denies('mapkeeper')){
        	Flash::error('Permission Denied');
        	return redirect(route('building_territories.index'));
        }
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            Flash::error('Building Territory not found');

            return redirect(route('buildingTerritories.index'));
        }

        return view('building_territories.edit')->with('buildingTerritory', $buildingTerritory);
    }

    /**
     * Update the specified BuildingTerritory in storage.
     *
     * @param  int              $id
     * @param UpdateBuildingTerritoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuildingTerritoryRequest $request)
    {
        if(Gate::denies('mapkeeper')){
        	Flash::error('Permission Denied');
        	return redirect(route('building_territories.index'));
        }
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            Flash::error('Building Territory not found');

            return redirect(route('buildingTerritories.index'));
        }

        $buildingTerritory = $this->buildingTerritoryRepository->update($request->all(), $id);

        Flash::success('Building Territory updated successfully.');

        return redirect(route('buildingTerritories.index'));
    }

    /**
     * Remove the specified BuildingTerritory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('mapkeeper')){
        	Flash::error('Permission Denied');
        	return redirect(route('building_territories.index'));
        }
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            Flash::error('Building Territory not found');

            return redirect(route('buildingTerritories.index'));
        }

        $this->buildingTerritoryRepository->delete($id);

        Flash::success('Building Territory deleted successfully.');

        return redirect(route('buildingTerritories.index'));
    }
}
