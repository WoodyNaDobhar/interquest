<?php

namespace App\Http\Controllers;

use App\DataTables\revisionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreaterevisionsRequest;
use App\Http\Requests\UpdaterevisionsRequest;
use App\Repositories\revisionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class revisionsController extends AppBaseController
{
    /** @var  revisionsRepository */
    private $revisionsRepository;

    public function __construct(revisionsRepository $revisionsRepo)
    {
        $this->revisionsRepository = $revisionsRepo;
    }

    /**
     * Display a listing of the revisions.
     *
     * @param revisionsDataTable $revisionsDataTable
     * @return Response
     */
    public function index(revisionsDataTable $revisionsDataTable)
    {
        return $revisionsDataTable->render('revisions.index');
    }

    /**
     * Show the form for creating a new revisions.
     *
     * @return Response
     */
    public function create()
    {
        return view('revisions.create');
    }

    /**
     * Store a newly created revisions in storage.
     *
     * @param CreaterevisionsRequest $request
     *
     * @return Response
     */
    public function store(CreaterevisionsRequest $request)
    {
        $input = $request->all();

        $revisions = $this->revisionsRepository->create($input);

        Flash::success('Revision saved successfully.');

        return redirect(route('revisions.index'));
    }

    /**
     * Display the specified revisions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $revisions = $this->revisionsRepository->findWithoutFail($id);

        if (empty($revisions)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        return view('revisions.show')->with('revision', $revisions);
    }

    /**
     * Show the form for editing the specified revisions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $revisions = $this->revisionsRepository->findWithoutFail($id);

        if (empty($revisions)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        return view('revisions.edit')->with('revision', $revisions);
    }

    /**
     * Update the specified revisions in storage.
     *
     * @param  int              $id
     * @param UpdaterevisionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterevisionsRequest $request)
    {
        $revisions = $this->revisionsRepository->findWithoutFail($id);

        if (empty($revisions)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        $revisions = $this->revisionsRepository->update($request->all(), $id);

        Flash::success('Revision updated successfully.');

        return redirect(route('revisions.index'));
    }

    /**
     * Remove the specified revisions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $revisions = $this->revisionsRepository->findWithoutFail($id);

        if (empty($revisions)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        $this->revisionsRepository->delete($id);

        Flash::success('Revision deleted successfully.');

        return redirect(route('revisions.index'));
    }
}
