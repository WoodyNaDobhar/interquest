<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentPersonaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentPersonaRequest;
use App\Http\Requests\UpdateEquipmentPersonaRequest;
use App\Repositories\EquipmentPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EquipmentPersonaController extends AppBaseController
{
    /** @var  EquipmentPersonaRepository */
    private $equipmentPersonaRepository;

    public function __construct(EquipmentPersonaRepository $equipmentPersonaRepo)
    {
        $this->equipmentPersonaRepository = $equipmentPersonaRepo;
    }

    /**
     * Display a listing of the EquipmentPersona.
     *
     * @param EquipmentPersonaDataTable $equipmentPersonaDataTable
     * @return Response
     */
    public function index(EquipmentPersonaDataTable $equipmentPersonaDataTable)
    {
        return $equipmentPersonaDataTable->render('equipment_personas.index');
    }

    /**
     * Show the form for creating a new EquipmentPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipment_personas.create');
    }

    /**
     * Store a newly created EquipmentPersona in storage.
     *
     * @param CreateEquipmentPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentPersonaRequest $request)
    {
        $input = $request->all();

        $equipmentPersona = $this->equipmentPersonaRepository->create($input);

        Flash::success('Equipment Persona saved successfully.');

        return redirect(route('equipmentPersonas.index'));
    }

    /**
     * Display the specified EquipmentPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            Flash::error('Equipment Persona not found');

            return redirect(route('equipmentPersonas.index'));
        }

        return view('equipment_personas.show')->with('equipmentPersona', $equipmentPersona);
    }

    /**
     * Show the form for editing the specified EquipmentPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            Flash::error('Equipment Persona not found');

            return redirect(route('equipmentPersonas.index'));
        }

        return view('equipment_personas.edit')->with('equipmentPersona', $equipmentPersona);
    }

    /**
     * Update the specified EquipmentPersona in storage.
     *
     * @param  int              $id
     * @param UpdateEquipmentPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentPersonaRequest $request)
    {
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            Flash::error('Equipment Persona not found');

            return redirect(route('equipmentPersonas.index'));
        }

        $equipmentPersona = $this->equipmentPersonaRepository->update($request->all(), $id);

        Flash::success('Equipment Persona updated successfully.');

        return redirect(route('equipmentPersonas.index'));
    }

    /**
     * Remove the specified EquipmentPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipmentPersona = $this->equipmentPersonaRepository->findWithoutFail($id);

        if (empty($equipmentPersona)) {
            Flash::error('Equipment Persona not found');

            return redirect(route('equipmentPersonas.index'));
        }

        $this->equipmentPersonaRepository->delete($id);

        Flash::success('Equipment Persona deleted successfully.');

        return redirect(route('equipmentPersonas.index'));
    }
}
