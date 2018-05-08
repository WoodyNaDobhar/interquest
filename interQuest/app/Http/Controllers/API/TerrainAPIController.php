<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTerrainAPIRequest;
use App\Http\Requests\API\UpdateTerrainAPIRequest;
use App\Models\Terrain;
use App\Repositories\TerrainRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TerrainController
 * @package App\Http\Controllers\API
 */

class TerrainAPIController extends AppBaseController
{
    /** @var  TerrainRepository */
    private $terrainRepository;

    public function __construct(TerrainRepository $terrainRepo)
    {
        $this->terrainRepository = $terrainRepo;
    }

    /**
     * Display a listing of the Terrain.
     * GET|HEAD /terrains
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->terrainRepository->pushCriteria(new RequestCriteria($request));
        $this->terrainRepository->pushCriteria(new LimitOffsetCriteria($request));
        $terrains = $this->terrainRepository->all();

        return $this->sendResponse($terrains->toArray(), 'Terrains retrieved successfully');
    }

    /**
     * Store a newly created Terrain in storage.
     * POST /terrains
     *
     * @param CreateTerrainAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTerrainAPIRequest $request)
    {
        $input = $request->all();

        $terrains = $this->terrainRepository->create($input);

        return $this->sendResponse($terrains->toArray(), 'Terrain saved successfully');
    }

    /**
     * Display the specified Terrain.
     * GET|HEAD /terrains/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Terrain $terrain */
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            return $this->sendError('Terrain not found');
        }

        return $this->sendResponse($terrain->toArray(), 'Terrain retrieved successfully');
    }

    /**
     * Update the specified Terrain in storage.
     * PUT/PATCH /terrains/{id}
     *
     * @param  int $id
     * @param UpdateTerrainAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTerrainAPIRequest $request)
    {
        $input = $request->all();

        /** @var Terrain $terrain */
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            return $this->sendError('Terrain not found');
        }

        $terrain = $this->terrainRepository->update($input, $id);

        return $this->sendResponse($terrain->toArray(), 'Terrain updated successfully');
    }

    /**
     * Remove the specified Terrain from storage.
     * DELETE /terrains/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Terrain $terrain */
        $terrain = $this->terrainRepository->findWithoutFail($id);

        if (empty($terrain)) {
            return $this->sendError('Terrain not found');
        }

        $terrain->delete();

        return $this->sendResponse($id, 'Terrain deleted successfully');
    }
}
