<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParkAPIRequest;
use App\Http\Requests\API\UpdateParkAPIRequest;
use App\Models\Park;
use App\Repositories\ParkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ParkController
 * @package App\Http\Controllers\API
 */

class ParkAPIController extends AppBaseController
{
    /** @var  ParkRepository */
    private $parkRepository;

    public function __construct(ParkRepository $parkRepo)
    {
        $this->parkRepository = $parkRepo;
    }

    /**
     * Display a listing of the Park.
     * GET|HEAD /parks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->parkRepository->pushCriteria(new RequestCriteria($request));
        $this->parkRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parks = $this->parkRepository->all();

        return $this->sendResponse($parks->toArray(), 'Parks retrieved successfully');
    }

    /**
     * Store a newly created Park in storage.
     * POST /parks
     *
     * @param CreateParkAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParkAPIRequest $request)
    {
        $input = $request->all();

        $parks = $this->parkRepository->create($input);

        return $this->sendResponse($parks->toArray(), 'Park saved successfully');
    }

    /**
     * Display the specified Park.
     * GET|HEAD /parks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Park $park */
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            return $this->sendError('Park not found');
        }

        return $this->sendResponse($park->toArray(), 'Park retrieved successfully');
    }

    /**
     * Update the specified Park in storage.
     * PUT/PATCH /parks/{id}
     *
     * @param  int $id
     * @param UpdateParkAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParkAPIRequest $request)
    {
        $input = $request->all();

        /** @var Park $park */
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            return $this->sendError('Park not found');
        }

        $park = $this->parkRepository->update($input, $id);

        return $this->sendResponse($park->toArray(), 'Park updated successfully');
    }

    /**
     * Remove the specified Park from storage.
     * DELETE /parks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Park $park */
        $park = $this->parkRepository->findWithoutFail($id);

        if (empty($park)) {
            return $this->sendError('Park not found');
        }

        $park->delete();

        return $this->sendResponse($id, 'Park deleted successfully');
    }
}
