<?php

namespace App\Http\Controllers;

use App\DataTables\NpcDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNpcRequest;
use App\Http\Requests\UpdateNpcRequest;
use App\Repositories\NpcRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NpcController extends AppBaseController
{
    /** @var  NpcRepository */
    private $npcRepository;

    public function __construct(NpcRepository $npcRepo)
    {
        $this->npcRepository = $npcRepo;
    }

    /**
     * Display a listing of the Npc.
     *
     * @param NpcDataTable $npcDataTable
     * @return Response
     */
    public function index(NpcDataTable $npcDataTable)
    {
        return $npcDataTable->render('npcs.index');
    }

    /**
     * Show the form for creating a new Npc.
     *
     * @return Response
     */
    public function create()
    {
        return view('npcs.create');
    }

    /**
     * Store a newly created Npc in storage.
     *
     * @param CreateNpcRequest $request
     *
     * @return Response
     */
    public function store(CreateNpcRequest $request)
    {
        $input = $request->all();

        $npc = $this->npcRepository->create($input);

        Flash::success('Npc saved successfully.');

        return redirect(route('npcs.index'));
    }

    /**
     * Display the specified Npc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            Flash::error('Npc not found');

            return redirect(route('npcs.index'));
        }

        return view('npcs.show')->with('npc', $npc);
    }

    /**
     * Show the form for editing the specified Npc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            Flash::error('Npc not found');

            return redirect(route('npcs.index'));
        }

        return view('npcs.edit')->with('npc', $npc);
    }

    /**
     * Update the specified Npc in storage.
     *
     * @param  int              $id
     * @param UpdateNpcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNpcRequest $request)
    {
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            Flash::error('Npc not found');

            return redirect(route('npcs.index'));
        }

        $npc = $this->npcRepository->update($request->all(), $id);

        Flash::success('Npc updated successfully.');

        return redirect(route('npcs.index'));
    }

    /**
     * Remove the specified Npc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $npc = $this->npcRepository->findWithoutFail($id);

        if (empty($npc)) {
            Flash::error('Npc not found');

            return redirect(route('npcs.index'));
        }

        $this->npcRepository->delete($id);

        Flash::success('Npc deleted successfully.');

        return redirect(route('npcs.index'));
    }
}
