<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBuildingAPIRequest;
use App\Http\Requests\API\UpdateBuildingAPIRequest;
use App\Models\Building;
use App\Repositories\BuildingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BuildingController
 * @package App\Http\Controllers\API
 */

class BuildingAPIController extends AppBaseController
{
    /** @var  BuildingRepository */
    private $buildingRepository;

    public function __construct(BuildingRepository $buildingRepo)
    {
        $this->buildingRepository = $buildingRepo;
    }

    /**
     * Display a listing of the Building.
     * GET|HEAD /buildings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->buildingRepository->pushCriteria(new RequestCriteria($request));
        $this->buildingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $buildings = $this->buildingRepository->all();

        return $this->sendResponse($buildings->toArray(), 'Buildings retrieved successfully');
    }

    /**
     * Store a newly created Building in storage.
     * POST /buildings
     *
     * @param CreateBuildingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBuildingAPIRequest $request)
    {
        $input = $request->all();

        $buildings = $this->buildingRepository->create($input);

        return $this->sendResponse($buildings->toArray(), 'Building saved successfully');
    }

    /**
     * Display the specified Building.
     * GET|HEAD /buildings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Building $building */
        $building = $this->buildingRepository->findWithoutFail($id);

        if (empty($building)) {
            return $this->sendError('Building not found');
        }

        return $this->sendResponse($building->toArray(), 'Building retrieved successfully');
    }

    /**
     * Update the specified Building in storage.
     * PUT/PATCH /buildings/{id}
     *
     * @param  int $id
     * @param UpdateBuildingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuildingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Building $building */
        $building = $this->buildingRepository->findWithoutFail($id);

        if (empty($building)) {
            return $this->sendError('Building not found');
        }

        $building = $this->buildingRepository->update($input, $id);

        return $this->sendResponse($building->toArray(), 'Building updated successfully');
    }

    /**
     * Remove the specified Building from storage.
     * DELETE /buildings/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Building $building */
        $building = $this->buildingRepository->findWithoutFail($id);

        if (empty($building)) {
            return $this->sendError('Building not found');
        }

        $building->delete();

        return $this->sendResponse($id, 'Building deleted successfully');
    }
}
