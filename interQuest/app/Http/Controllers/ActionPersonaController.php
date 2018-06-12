<?php

namespace App\Http\Controllers;

use App\DataTables\ActionPersonaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateActionPersonaRequest;
use App\Http\Requests\UpdateActionPersonaRequest;
use App\Repositories\ActionPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class ActionPersonaController extends AppBaseController
{
    /** @var  ActionPersonaRepository */
    private $actionPersonaRepository;

    public function __construct(ActionPersonaRepository $actionPersonaRepo)
    {
        $this->actionPersonaRepository = $actionPersonaRepo;
    }

    /**
     * Display a listing of the ActionPersona.
     *
     * @param ActionPersonaDataTable $actionPersonaDataTable
     * @return Response
     */
    public function index(ActionPersonaDataTable $actionPersonaDataTable)
    {
        return $actionPersonaDataTable->render('action_personas.index');
    }

    /**
     * Show the form for creating a new ActionPersona.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('actionPersonas.index'));
        }
        return view('action_personas.create');
    }

    /**
     * Store a newly created ActionPersona in storage.
     *
     * @param CreateActionPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateActionPersonaRequest $request)
    {
        $input = $request->all();

        $actionPersona = $this->actionPersonaRepository->create($input);

        Flash::success('Action Persona saved successfully.');

        return redirect(route('actionPersonas.index'));
    }

    /**
     * Display the specified ActionPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            Flash::error('Action Persona not found');
            return redirect(route('actionPersonas.index'));
        }

        return view('action_personas.show')->with('actionPersona', $actionPersona);
    }

    /**
     * Show the form for editing the specified ActionPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            Flash::error('Action Persona not found');
            return redirect(route('actionPersonas.index'));
        }
        if(Gate::denies('own', $actionPersona->persona->id)){
        	Flash::error('Permission Denied');
        	return redirect(route('actionPersonas.index'));
        }

        return view('action_personas.edit')->with('actionPersona', $actionPersona);
    }

    /**
     * Update the specified ActionPersona in storage.
     *
     * @param  int              $id
     * @param UpdateActionPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActionPersonaRequest $request)
    {
    	$actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            Flash::error('Action Persona not found');
            return redirect(route('actionPersonas.index'));
        }
        if(Gate::denies('own', $actionPersona->persona->id)){
        	Flash::error('Permission Denied');
        	return redirect(route('actionPersonas.index'));
        }

        $actionPersona = $this->actionPersonaRepository->update($request->all(), $id);

        Flash::success('Action Persona updated successfully.');

        return redirect(route('actionPersonas.index'));
    }

    /**
     * Remove the specified ActionPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('actionPersonas.index'));
        }
        $actionPersona = $this->actionPersonaRepository->findWithoutFail($id);

        if (empty($actionPersona)) {
            Flash::error('Action Persona not found');
            return redirect(route('actionPersonas.index'));
        }

        $this->actionPersonaRepository->delete($id);

        Flash::success('Action Persona deleted successfully.');

        return redirect(route('actionPersonas.index'));
    }
}
