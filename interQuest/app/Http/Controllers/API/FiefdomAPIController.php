<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFiefdomAPIRequest;
use App\Http\Requests\API\UpdateFiefdomAPIRequest;
use App\Models\Fiefdom;
use App\Repositories\FiefdomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class FiefdomController
 * @package App\Http\Controllers\API
 */

class FiefdomAPIController extends AppBaseController
{
    /** @var  FiefdomRepository */
    private $fiefdomRepository;

    public function __construct(FiefdomRepository $fiefdomRepo)
    {
        $this->fiefdomRepository = $fiefdomRepo;
    }

    /**
     * Display a listing of the Fiefdom.
     * GET|HEAD /fiefdoms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(Gate::denies('mapkeeper')){
        	return $this->sendError('Permission Denied');
        }
        $this->fiefdomRepository->pushCriteria(new RequestCriteria($request));
        $this->fiefdomRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fiefdoms = $this->fiefdomRepository->all();

        return $this->sendResponse($fiefdoms->toArray(), 'Fiefdoms retrieved successfully');
    }

    /**
     * Store a newly created Fiefdom in storage.
     * POST /fiefdoms
     *
     * @param CreateFiefdomAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFiefdomAPIRequest $request)
    {
        if(Gate::denies('mapkeeper')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        $fiefdoms = $this->fiefdomRepository->create($input);

        return $this->sendResponse($fiefdoms->toArray(), 'Fiefdom saved successfully');
    }

    /**
     * Display the specified Fiefdom.
     * GET|HEAD /fiefdoms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fiefdom $fiefdom */
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            return $this->sendError('Fiefdom not found');
        }

        return $this->sendResponse($fiefdom->toArray(), 'Fiefdom retrieved successfully');
    }

    /**
     * Update the specified Fiefdom in storage.
     * PUT/PATCH /fiefdoms/{id}
     *
     * @param  int $id
     * @param UpdateFiefdomAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFiefdomAPIRequest $request)
    {
        if(Gate::denies('mapkeeper')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        /** @var Fiefdom $fiefdom */
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            return $this->sendError('Fiefdom not found');
        }

        $fiefdom = $this->fiefdomRepository->update($input, $id);

        return $this->sendResponse($fiefdom->toArray(), 'Fiefdom updated successfully');
    }

    /**
     * Remove the specified Fiefdom from storage.
     * DELETE /fiefdoms/{id}
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
        /** @var Fiefdom $fiefdom */
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            return $this->sendError('Fiefdom not found');
        }

        $fiefdom->delete();

        return $this->sendResponse($id, 'Fiefdom deleted successfully');
    }
}
