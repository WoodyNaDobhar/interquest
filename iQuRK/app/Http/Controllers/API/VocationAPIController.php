<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVocationAPIRequest;
use App\Http\Requests\API\UpdateVocationAPIRequest;
use App\Models\Vocation;
use App\Repositories\VocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class VocationController
 * @package App\Http\Controllers\API
 */

class VocationAPIController extends AppBaseController
{
    /** @var  VocationRepository */
    private $vocationRepository;

    public function __construct(VocationRepository $vocationRepo)
    {
        $this->vocationRepository = $vocationRepo;
    }

    /**
     * Display a listing of the Vocation.
     * GET|HEAD /vocations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vocationRepository->pushCriteria(new RequestCriteria($request));
        $this->vocationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vocations = $this->vocationRepository->all();

        return $this->sendResponse($vocations->toArray(), 'Vocations retrieved successfully');
    }

    /**
     * Store a newly created Vocation in storage.
     * POST /vocations
     *
     * @param CreateVocationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVocationAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        $vocations = $this->vocationRepository->create($input);

        return $this->sendResponse($vocations->toArray(), 'Vocation saved successfully');
    }

    /**
     * Display the specified Vocation.
     * GET|HEAD /vocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vocation $vocation */
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            return $this->sendError('Vocation not found');
        }

        return $this->sendResponse($vocation->toArray(), 'Vocation retrieved successfully');
    }

    /**
     * Update the specified Vocation in storage.
     * PUT/PATCH /vocations/{id}
     *
     * @param  int $id
     * @param UpdateVocationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVocationAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        /** @var Vocation $vocation */
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            return $this->sendError('Vocation not found');
        }

        $vocation = $this->vocationRepository->update($input, $id);

        return $this->sendResponse($vocation->toArray(), 'Vocation updated successfully');
    }

    /**
     * Remove the specified Vocation from storage.
     * DELETE /vocations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        /** @var Vocation $vocation */
        $vocation = $this->vocationRepository->findWithoutFail($id);

        if (empty($vocation)) {
            return $this->sendError('Vocation not found');
        }

        $vocation->delete();

        return $this->sendResponse($id, 'Vocation deleted successfully');
    }
}
