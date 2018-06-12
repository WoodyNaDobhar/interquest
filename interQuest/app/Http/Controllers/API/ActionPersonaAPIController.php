<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActionPersonaAPIRequest;
use App\Http\Requests\API\UpdateActionPersonaAPIRequest;
use App\Models\ActionPersona;
use App\Repositories\ActionPersonaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class ActionPersonaController
 * @package App\Http\Controllers\API
 */

class ActionPersonaAPIController extends AppBaseController
{
    /** @var  ActionPersonaRepository */
    private $actionPersonaRepository;

    public function __construct(ActionPersonaRepository $actionPersonaRepo)
    {
        $this->actionPersonaRepository = $actionPersonaRepo;
    }

    /**
     * Display a listing of the ActionPersona.
     * GET|HEAD /actionPersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->actionPersonaRepository->pushCriteria(new RequestCriteria($request));
        $this->actionPersonaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $actionPersonas = $this->actionPersonaRepository->all();

        return $this->sendResponse($actionPersonas->toArray(), 'Action Personas retrieved successfully');
    }

    /**
     * Store a newly created ActionPersona in storage.
     * POST /actionPersonas
     *
     * @param CreateActionPersonaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActionPersonaAPIRequest $request)
    {
        $input = $request->all();

        $actionPersonas = $this->actionPersonaRepository->create($input);

        return $this->sendResponse($actionPersonas->toArray(), 'Action Persona saved successfully');
    }

    /**
     * Display the specified ActionPersona.
     * GET|HEAD /actionPersonas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ActionPersona $actionPersona */
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            return $this->sendError('Action Persona not found');
        }

        return $this->sendResponse($actionPersona->toArray(), 'Action Persona retrieved successfully');
    }

    /**
     * Update the specified ActionPersona in storage.
     * PUT/PATCH /actionPersonas/{id}
     *
     * @param  int $id
     * @param UpdateActionPersonaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActionPersonaAPIRequest $request)
    {
        $input = $request->all();

        /** @var ActionPersona $actionPersona */
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            return $this->sendError('Action Persona not found');
        }
        if(Gate::denies('own', $actionPersona->persona->id)){
            return $this->sendError('Permission Denied');
        }

        $actionPersona = $this->actionPersonaRepository->update($input, $id);

        return $this->sendResponse($actionPersona->toArray(), 'ActionPersona updated successfully');
    }

    /**
     * Remove the specified ActionPersona from storage.
     * DELETE /actionPersonas/{id}
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
        /** @var ActionPersona $actionPersona */
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            return $this->sendError('Action Persona not found');
        }

        $actionPersona->delete();

        return $this->sendResponse($id, 'Action Persona deleted successfully');
    }
}
