<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRaceAPIRequest;
use App\Http\Requests\API\UpdateRaceAPIRequest;
use App\Models\Race;
use App\Repositories\RaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RaceController
 * @package App\Http\Controllers\API
 */

class RaceAPIController extends AppBaseController
{
    /** @var  RaceRepository */
    private $raceRepository;

    public function __construct(RaceRepository $raceRepo)
    {
        $this->raceRepository = $raceRepo;
    }

    /**
     * Display a listing of the Race.
     * GET|HEAD /races
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->raceRepository->pushCriteria(new RequestCriteria($request));
        $this->raceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $races = $this->raceRepository->all();

        return $this->sendResponse($races->toArray(), 'Races retrieved successfully');
    }

    /**
     * Store a newly created Race in storage.
     * POST /races
     *
     * @param CreateRaceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRaceAPIRequest $request)
    {
        $input = $request->all();

        $races = $this->raceRepository->create($input);

        return $this->sendResponse($races->toArray(), 'Race saved successfully');
    }

    /**
     * Display the specified Race.
     * GET|HEAD /races/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        return $this->sendResponse($race->toArray(), 'Race retrieved successfully');
    }

    /**
     * Update the specified Race in storage.
     * PUT/PATCH /races/{id}
     *
     * @param  int $id
     * @param UpdateRaceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        $race = $this->raceRepository->update($input, $id);

        return $this->sendResponse($race->toArray(), 'Race updated successfully');
    }

    /**
     * Remove the specified Race from storage.
     * DELETE /races/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        $race->delete();

        return $this->sendResponse($id, 'Race deleted successfully');
    }
}
