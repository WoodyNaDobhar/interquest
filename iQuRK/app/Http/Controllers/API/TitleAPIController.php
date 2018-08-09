<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTitleAPIRequest;
use App\Http\Requests\API\UpdateTitleAPIRequest;
use App\Models\Title;
use App\Repositories\TitleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class TitleController
 * @package App\Http\Controllers\API
 */

class TitleAPIController extends AppBaseController
{
    /** @var  TitleRepository */
    private $titleRepository;

    public function __construct(TitleRepository $titleRepo)
    {
        $this->titleRepository = $titleRepo;
    }

    /**
     * Display a listing of the Title.
     * GET|HEAD /titles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->titleRepository->pushCriteria(new RequestCriteria($request));
        $this->titleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $titles = $this->titleRepository->all();

        return $this->sendResponse($titles->toArray(), 'Titles retrieved successfully');
    }

    /**
     * Store a newly created Title in storage.
     * POST /titles
     *
     * @param CreateTitleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTitleAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        $titles = $this->titleRepository->create($input);

        return $this->sendResponse($titles->toArray(), 'Title saved successfully');
    }

    /**
     * Display the specified Title.
     * GET|HEAD /titles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Title $title */
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            return $this->sendError('Title not found');
        }

        return $this->sendResponse($title->toArray(), 'Title retrieved successfully');
    }

    /**
     * Update the specified Title in storage.
     * PUT/PATCH /titles/{id}
     *
     * @param  int $id
     * @param UpdateTitleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitleAPIRequest $request)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        /** @var Title $title */
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            return $this->sendError('Title not found');
        }

        $title = $this->titleRepository->update($input, $id);

        return $this->sendResponse($title->toArray(), 'Title updated successfully');
    }

    /**
     * Remove the specified Title from storage.
     * DELETE /titles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	return $this->sendError('Permission Denied');
        }
        /** @var Title $title */
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            return $this->sendError('Title not found');
        }

        $title->delete();

        return $this->sendResponse($id, 'Title deleted successfully');
    }
}
