<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMetatypeAPIRequest;
use App\Http\Requests\API\UpdateMetatypeAPIRequest;
use App\Models\Metatype;
use App\Repositories\MetatypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class MetatypeController
 * @package App\Http\Controllers\API
 */

class MetatypeAPIController extends AppBaseController
{
    /** @var  MetatypeRepository */
    private $metatypeRepository;

    public function __construct(MetatypeRepository $metatypeRepo)
    {
        $this->metatypeRepository = $metatypeRepo;
    }

    /**
     * Display a listing of the Metatype.
     * GET|HEAD /metatypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->metatypeRepository->pushCriteria(new RequestCriteria($request));
        $this->metatypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $metatypes = $this->metatypeRepository->all();

        return $this->sendResponse($metatypes->toArray(), 'Metatypes retrieved successfully');
    }

    /**
     * Store a newly created Metatype in storage.
     * POST /metatypes
     *
     * @param CreateMetatypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMetatypeAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        $metatypes = $this->metatypeRepository->create($input);

        return $this->sendResponse($metatypes->toArray(), 'Metatype saved successfully');
    }

    /**
     * Display the specified Metatype.
     * GET|HEAD /metatypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Metatype $metatype */
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            return $this->sendError('Metatype not found');
        }

        return $this->sendResponse($metatype->toArray(), 'Metatype retrieved successfully');
    }

    /**
     * Update the specified Metatype in storage.
     * PUT/PATCH /metatypes/{id}
     *
     * @param  int $id
     * @param UpdateMetatypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetatypeAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        /** @var Metatype $metatype */
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            return $this->sendError('Metatype not found');
        }

        $metatype = $this->metatypeRepository->update($input, $id);

        return $this->sendResponse($metatype->toArray(), 'Metatype updated successfully');
    }

    /**
     * Remove the specified Metatype from storage.
     * DELETE /metatypes/{id}
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
        /** @var Metatype $metatype */
        $metatype = $this->metatypeRepository->findWithoutFail($id);

        if (empty($metatype)) {
            return $this->sendError('Metatype not found');
        }

        $metatype->delete();

        return $this->sendResponse($id, 'Metatype deleted successfully');
    }
}
