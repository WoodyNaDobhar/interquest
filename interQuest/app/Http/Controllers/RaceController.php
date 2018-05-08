<?php

namespace App\Http\Controllers;

use App\DataTables\RaceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRaceRequest;
use App\Http\Requests\UpdateRaceRequest;
use App\Repositories\RaceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RaceController extends AppBaseController
{
    /** @var  RaceRepository */
    private $raceRepository;

    public function __construct(RaceRepository $raceRepo)
    {
        $this->raceRepository = $raceRepo;
    }

    /**
     * Display a listing of the Race.
     *
     * @param RaceDataTable $raceDataTable
     * @return Response
     */
    public function index(RaceDataTable $raceDataTable)
    {
        return $raceDataTable->render('races.index');
    }

    /**
     * Show the form for creating a new Race.
     *
     * @return Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created Race in storage.
     *
     * @param CreateRaceRequest $request
     *
     * @return Response
     */
    public function store(CreateRaceRequest $request)
    {
        $input = $request->all();

        $race = $this->raceRepository->create($input);

        Flash::success('Race saved successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Display the specified Race.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        return view('races.show')->with('race', $race);
    }

    /**
     * Show the form for editing the specified Race.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        return view('races.edit')->with('race', $race);
    }

    /**
     * Update the specified Race in storage.
     *
     * @param  int              $id
     * @param UpdateRaceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaceRequest $request)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $race = $this->raceRepository->update($request->all(), $id);

        Flash::success('Race updated successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Remove the specified Race from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $this->raceRepository->delete($id);

        Flash::success('Race deleted successfully.');

        return redirect(route('races.index'));
    }
}
