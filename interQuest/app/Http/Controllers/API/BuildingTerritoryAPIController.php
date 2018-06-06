<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBuildingTerritoryAPIRequest;
use App\Http\Requests\API\UpdateBuildingTerritoryAPIRequest;
use App\Models\BuildingTerritory;
use App\Repositories\BuildingTerritoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BuildingTerritoryController
 * @package App\Http\Controllers\API
 */

class BuildingTerritoryAPIController extends AppBaseController
{
    /** @var  BuildingTerritoryRepository */
    private $buildingTerritoryRepository;

    public function __construct(BuildingTerritoryRepository $buildingTerritoryRepo)
    {
        $this->buildingTerritoryRepository = $buildingTerritoryRepo;
    }

    /**
     * Display a listing of the BuildingTerritory.
     * GET|HEAD /buildingTerritories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->buildingTerritoryRepository->pushCriteria(new RequestCriteria($request));
        $this->buildingTerritoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $buildingTerritories = $this->buildingTerritoryRepository->all();

        return $this->sendResponse($buildingTerritories->toArray(), 'Building Territories retrieved successfully');
    }

    /**
     * Store a newly created BuildingTerritory in storage.
     * POST /buildingTerritories
     *
     * @param CreateBuildingTerritoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBuildingTerritoryAPIRequest $request)
    {
        $input = $request->all();

        $buildingTerritories = $this->buildingTerritoryRepository->create($input);

        return $this->sendResponse($buildingTerritories->toArray(), 'Building Territory saved successfully');
    }

    /**
     * Display the specified BuildingTerritory.
     * GET|HEAD /buildingTerritories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BuildingTerritory $buildingTerritory */
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            return $this->sendError('Building Territory not found');
        }

        return $this->sendResponse($buildingTerritory->toArray(), 'Building Territory retrieved successfully');
    }

    /**
     * Update the specified BuildingTerritory in storage.
     * PUT/PATCH /buildingTerritories/{id}
     *
     * @param  int $id
     * @param UpdateBuildingTerritoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuildingTerritoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var BuildingTerritory $buildingTerritory */
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            return $this->sendError('Building Territory not found');
        }

        $buildingTerritory = $this->buildingTerritoryRepository->update($input, $id);

        return $this->sendResponse($buildingTerritory->toArray(), 'BuildingTerritory updated successfully');
    }

    /**
     * Remove the specified BuildingTerritory from storage.
     * DELETE /buildingTerritories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BuildingTerritory $buildingTerritory */
        $buildingTerritory = $this->buildingTerritoryRepository->findWithoutFail($id);

        if (empty($buildingTerritory)) {
            return $this->sendError('Building Territory not found');
        }

        $buildingTerritory->delete();

        return $this->sendResponse($id, 'Building Territory deleted successfully');
    }
}
