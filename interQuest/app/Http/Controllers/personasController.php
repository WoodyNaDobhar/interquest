<?php

namespace App\Http\Controllers;

use App\DataTables\personasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepersonasRequest;
use App\Http\Requests\UpdatepersonasRequest;
use App\Repositories\personasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class personasController extends AppBaseController
{
    /** @var  personasRepository */
    private $personasRepository;

    public function __construct(personasRepository $personasRepo)
    {
        $this->personasRepository = $personasRepo;
    }

    /**
     * Display a listing of the personas.
     *
     * @param personasDataTable $personasDataTable
     * @return Response
     */
    public function index(personasDataTable $personasDataTable)
    {
        return $personasDataTable->render('personas.index');
    }

    /**
     * Show the form for creating a new personas.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created personas in storage.
     *
     * @param CreatepersonasRequest $request
     *
     * @return Response
     */
    public function store(CreatepersonasRequest $request)
    {
        $input = $request->all();

        $personas = $this->personasRepository->create($input);

        Flash::success('Personas saved successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Display the specified personas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personas = $this->personasRepository->findWithoutFail($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        return view('personas.show')->with('personas', $personas);
    }

    /**
     * Show the form for editing the specified personas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personas = $this->personasRepository->findWithoutFail($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        return view('personas.edit')->with('personas', $personas);
    }

    /**
     * Update the specified personas in storage.
     *
     * @param  int              $id
     * @param UpdatepersonasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersonasRequest $request)
    {
        $personas = $this->personasRepository->findWithoutFail($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        $personas = $this->personasRepository->update($request->all(), $id);

        Flash::success('Personas updated successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Remove the specified personas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personas = $this->personasRepository->findWithoutFail($id);

        if (empty($personas)) {
            Flash::error('Personas not found');

            return redirect(route('personas.index'));
        }

        $this->personasRepository->delete($id);

        Flash::success('Personas deleted successfully.');

        return redirect(route('personas.index'));
    }
}
