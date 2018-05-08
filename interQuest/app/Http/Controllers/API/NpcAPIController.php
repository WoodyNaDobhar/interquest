<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNpcAPIRequest;
use App\Http\Requests\API\UpdateNpcAPIRequest;
use App\Models\Npc;
use App\Repositories\NpcRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NpcController
 * @package App\Http\Controllers\API
 */

class NpcAPIController extends AppBaseController
{
    /** @var  NpcRepository */
    private $npcRepository;

    public function __construct(NpcRepository $npcRepo)
    {
        $this->npcRepository = $npcRepo;
    }

    /**
     * Display a listing of the Npc.
     * GET|HEAD /npcs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->npcRepository->pushCriteria(new RequestCriteria($request));
        $this->npcRepository->pushCriteria(new LimitOffsetCriteria($request));
        $npcs = $this->npcRepository->all();

        return $this->sendResponse($npcs->toArray(), 'Npcs retrieved successfully');
    }

    /**
     * Store a newly created Npc in storage.
     * POST /npcs
     *
     * @param CreateNpcAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNpcAPIRequest $request)
    {
        $input = $request->all();

        $npcs = $this->npcRepository->create($input);

        return $this->sendResponse($npcs->toArray(), 'Npc saved successfully');
    }

    /**
     * Display the specified Npc.
     * GET|HEAD /npcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Npc $npc */
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            return $this->sendError('Npc not found');
        }

        return $this->sendResponse($npc->toArray(), 'Npc retrieved successfully');
    }

    /**
     * Update the specified Npc in storage.
     * PUT/PATCH /npcs/{id}
     *
     * @param  int $id
     * @param UpdateNpcAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNpcAPIRequest $request)
    {
        $input = $request->all();

        /** @var Npc $npc */
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            return $this->sendError('Npc not found');
        }

        $npc = $this->npcRepository->update($input, $id);

        return $this->sendResponse($npc->toArray(), 'Npc updated successfully');
    }

    /**
     * Remove the specified Npc from storage.
     * DELETE /npcs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Npc $npc */
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            return $this->sendError('Npc not found');
        }

        $npc->delete();

        return $this->sendResponse($id, 'Npc deleted successfully');
    }
}
