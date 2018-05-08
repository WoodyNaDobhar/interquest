<?php

namespace App\Http\Controllers;

use App\DataTables\RevisionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRevisionRequest;
use App\Http\Requests\UpdateRevisionRequest;
use App\Repositories\RevisionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RevisionController extends AppBaseController
{
    /** @var  RevisionRepository */
    private $revisionRepository;

    public function __construct(RevisionRepository $revisionRepo)
    {
        $this->revisionRepository = $revisionRepo;
    }

    /**
     * Display a listing of the Revision.
     *
     * @param RevisionDataTable $revisionDataTable
     * @return Response
     */
    public function index(RevisionDataTable $revisionDataTable)
    {
        return $revisionDataTable->render('revisions.index');
    }

    /**
     * Show the form for creating a new Revision.
     *
     * @return Response
     */
    public function create()
    {
        return view('revisions.create');
    }

    /**
     * Store a newly created Revision in storage.
     *
     * @param CreateRevisionRequest $request
     *
     * @return Response
     */
    public function store(CreateRevisionRequest $request)
    {
        $input = $request->all();

        $revision = $this->revisionRepository->create($input);

        Flash::success('Revision saved successfully.');

        return redirect(route('revisions.index'));
    }

    /**
     * Display the specified Revision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        return view('revisions.show')->with('revision', $revision);
    }

    /**
     * Show the form for editing the specified Revision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        return view('revisions.edit')->with('revision', $revision);
    }

    /**
     * Update the specified Revision in storage.
     *
     * @param  int              $id
     * @param UpdateRevisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRevisionRequest $request)
    {
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        $revision = $this->revisionRepository->update($request->all(), $id);

        Flash::success('Revision updated successfully.');

        return redirect(route('revisions.index'));
    }

    /**
     * Remove the specified Revision from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            Flash::error('Revision not found');

            return redirect(route('revisions.index'));
        }

        $this->revisionRepository->delete($id);

        Flash::success('Revision deleted successfully.');

        return redirect(route('revisions.index'));
    }
}
