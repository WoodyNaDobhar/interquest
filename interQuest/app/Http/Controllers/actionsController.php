<?php

namespace App\Http\Controllers;

use App\DataTables\actionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateactionsRequest;
use App\Http\Requests\UpdateactionsRequest;
use App\Repositories\actionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class actionsController extends AppBaseController
{
    /** @var  actionsRepository */
    private $actionsRepository;

    public function __construct(actionsRepository $actionsRepo)
    {
        $this->actionsRepository = $actionsRepo;
    }

    /**
     * Display a listing of the actions.
     *
     * @param actionsDataTable $actionsDataTable
     * @return Response
     */
    public function index(actionsDataTable $actionsDataTable)
    {
        return $actionsDataTable->render('actions.index');
    }

    /**
     * Show the form for creating a new actions.
     *
     * @return Response
     */
    public function create()
    {
        return view('actions.create');
    }

    /**
     * Store a newly created actions in storage.
     *
     * @param CreateactionsRequest $request
     *
     * @return Response
     */
    public function store(CreateactionsRequest $request)
    {
        $input = $request->all();

        $actions = $this->actionsRepository->create($input);

        Flash::success('Actions saved successfully.');

        return redirect(route('actions.index'));
    }

    /**
     * Display the specified actions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actions = $this->actionsRepository->findWithoutFail($id);

        if (empty($actions)) {
            Flash::error('Actions not found');

            return redirect(route('actions.index'));
        }

        return view('actions.show')->with('actions', $actions);
    }

    /**
     * Show the form for editing the specified actions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actions = $this->actionsRepository->findWithoutFail($id);

        if (empty($actions)) {
            Flash::error('Actions not found');

            return redirect(route('actions.index'));
        }

        return view('actions.edit')->with('actions', $actions);
    }

    /**
     * Update the specified actions in storage.
     *
     * @param  int              $id
     * @param UpdateactionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateactionsRequest $request)
    {
        $actions = $this->actionsRepository->findWithoutFail($id);

        if (empty($actions)) {
            Flash::error('Actions not found');

            return redirect(route('actions.index'));
        }

        $actions = $this->actionsRepository->update($request->all(), $id);

        Flash::success('Actions updated successfully.');

        return redirect(route('actions.index'));
    }

    /**
     * Remove the specified actions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actions = $this->actionsRepository->findWithoutFail($id);

        if (empty($actions)) {
            Flash::error('Actions not found');

            return redirect(route('actions.index'));
        }

        $this->actionsRepository->delete($id);

        Flash::success('Actions deleted successfully.');

        return redirect(route('actions.index'));
    }
}
