<?php

namespace App\Http\Controllers;

use App\DataTables\racesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateracesRequest;
use App\Http\Requests\UpdateracesRequest;
use App\Repositories\racesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class racesController extends AppBaseController
{
    /** @var  racesRepository */
    private $racesRepository;

    public function __construct(racesRepository $racesRepo)
    {
        $this->racesRepository = $racesRepo;
    }

    /**
     * Display a listing of the races.
     *
     * @param racesDataTable $racesDataTable
     * @return Response
     */
    public function index(racesDataTable $racesDataTable)
    {
        return $racesDataTable->render('races.index');
    }

    /**
     * Show the form for creating a new races.
     *
     * @return Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created races in storage.
     *
     * @param CreateracesRequest $request
     *
     * @return Response
     */
    public function store(CreateracesRequest $request)
    {
        $input = $request->all();

        $races = $this->racesRepository->create($input);

        Flash::success('Race saved successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Display the specified races.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $races = $this->racesRepository->findWithoutFail($id);

        if (empty($races)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        return view('races.show')->with('race', $races);
    }

    /**
     * Show the form for editing the specified races.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $races = $this->racesRepository->findWithoutFail($id);

        if (empty($races)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        return view('races.edit')->with('race', $races);
    }

    /**
     * Update the specified races in storage.
     *
     * @param  int              $id
     * @param UpdateracesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateracesRequest $request)
    {
        $races = $this->racesRepository->findWithoutFail($id);

        if (empty($races)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $races = $this->racesRepository->update($request->all(), $id);

        Flash::success('Race updated successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Remove the specified races from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $races = $this->racesRepository->findWithoutFail($id);

        if (empty($races)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $this->racesRepository->delete($id);

        Flash::success('Race deleted successfully.');

        return redirect(route('races.index'));
    }
}
