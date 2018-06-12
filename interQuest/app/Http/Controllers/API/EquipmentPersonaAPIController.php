<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEquipmentPersonaAPIRequest;
use App\Http\Requests\API\UpdateEquipmentPersonaAPIRequest;
use App\Models\EquipmentPersona;
use App\Repositories\EquipmentPersonaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class EquipmentPersonaController
 * @package App\Http\Controllers\API
 */

class EquipmentPersonaAPIController extends AppBaseController
{
    /** @var  EquipmentPersonaRepository */
    private $equipmentPersonaRepository;

    public function __construct(EquipmentPersonaRepository $equipmentPersonaRepo)
    {
        $this->equipmentPersonaRepository = $equipmentPersonaRepo;
    }

    /**
     * Display a listing of the EquipmentPersona.
     * GET|HEAD /equipmentPersonas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->equipmentPersonaRepository->pushCriteria(new RequestCriteria($request));
        $this->equipmentPersonaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $equipmentPersonas = $this->equipmentPersonaRepository->all();

        return $this->sendResponse($equipmentPersonas->toArray(), 'Equipment Personas retrieved successfully');
    }

    /**
     * Store a newly created EquipmentPersona in storage.
     * POST /equipmentPersonas
     *
     * @param CreateEquipmentPersonaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentPersonaAPIRequest $request)
    {
        $input = $request->all();

        $equipmentPersonas = $this->equipmentPersonaRepository->create($input);

        return $this->sendResponse($equipmentPersonas->toArray(), 'Equipment Persona saved successfully');
    }

    /**
     * Display the specified EquipmentPersona.
     * GET|HEAD /equipmentPersonas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EquipmentPersona $equipmentPersona */
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            return $this->sendError('Equipment Persona not found');
        }
        if(Gate::denies('own', $equipmentPersona->persona_id)){
            return $this->sendError('Permission Denied');
        }

        return $this->sendResponse($equipmentPersona->toArray(), 'Equipment Persona retrieved successfully');
    }

    /**
     * Update the specified EquipmentPersona in storage.
     * PUT/PATCH /equipmentPersonas/{id}
     *
     * @param  int $id
     * @param UpdateEquipmentPersonaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentPersonaAPIRequest $request)
    {
        $input = $request->all();

        /** @var EquipmentPersona $equipmentPersona */
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            return $this->sendError('Equipment Persona not found');
        }
        if(Gate::denies('own', $equipmentPersona->persona_id)){
            return $this->sendError('Permission Denied');
        }

        $equipmentPersona = $this->equipmentPersonaRepository->update($input, $id);

        return $this->sendResponse($equipmentPersona->toArray(), 'EquipmentPersona updated successfully');
    }

    /**
     * Remove the specified EquipmentPersona from storage.
     * DELETE /equipmentPersonas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EquipmentPersona $equipmentPersona */
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            return $this->sendError('Equipment Persona not found');
        }

        $equipmentPersona->delete();

        return $this->sendResponse($id, 'Equipment Persona deleted successfully');
    }
}
