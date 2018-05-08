<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRevisionAPIRequest;
use App\Http\Requests\API\UpdateRevisionAPIRequest;
use App\Models\Revision;
use App\Repositories\RevisionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RevisionController
 * @package App\Http\Controllers\API
 */

class RevisionAPIController extends AppBaseController
{
    /** @var  RevisionRepository */
    private $revisionRepository;

    public function __construct(RevisionRepository $revisionRepo)
    {
        $this->revisionRepository = $revisionRepo;
    }

    /**
     * Display a listing of the Revision.
     * GET|HEAD /revisions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->revisionRepository->pushCriteria(new RequestCriteria($request));
        $this->revisionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $revisions = $this->revisionRepository->all();

        return $this->sendResponse($revisions->toArray(), 'Revisions retrieved successfully');
    }

    /**
     * Store a newly created Revision in storage.
     * POST /revisions
     *
     * @param CreateRevisionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRevisionAPIRequest $request)
    {
        $input = $request->all();

        $revisions = $this->revisionRepository->create($input);

        return $this->sendResponse($revisions->toArray(), 'Revision saved successfully');
    }

    /**
     * Display the specified Revision.
     * GET|HEAD /revisions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Revision $revision */
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            return $this->sendError('Revision not found');
        }

        return $this->sendResponse($revision->toArray(), 'Revision retrieved successfully');
    }

    /**
     * Update the specified Revision in storage.
     * PUT/PATCH /revisions/{id}
     *
     * @param  int $id
     * @param UpdateRevisionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRevisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Revision $revision */
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            return $this->sendError('Revision not found');
        }

        $revision = $this->revisionRepository->update($input, $id);

        return $this->sendResponse($revision->toArray(), 'Revision updated successfully');
    }

    /**
     * Remove the specified Revision from storage.
     * DELETE /revisions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Revision $revision */
        $revision = $this->revisionRepository->findWithoutFail($id);

        if (empty($revision)) {
            return $this->sendError('Revision not found');
        }

        $revision->delete();

        return $this->sendResponse($id, 'Revision deleted successfully');
    }
}
