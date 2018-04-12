<?php

namespace App\Http\Controllers;

use App\DataTables\commentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecommentsRequest;
use App\Http\Requests\UpdatecommentsRequest;
use App\Repositories\commentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class commentsController extends AppBaseController
{
    /** @var  commentsRepository */
    private $commentsRepository;

    public function __construct(commentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * Display a listing of the comments.
     *
     * @param commentsDataTable $commentsDataTable
     * @return Response
     */
    public function index(commentsDataTable $commentsDataTable)
    {
        return $commentsDataTable->render('comments.index');
    }

    /**
     * Show the form for creating a new comments.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created comments in storage.
     *
     * @param CreatecommentsRequest $request
     *
     * @return Response
     */
    public function store(CreatecommentsRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        Flash::success('Comments saved successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Display the specified comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified comments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comments', $comments);
    }

    /**
     * Update the specified comments in storage.
     *
     * @param  int              $id
     * @param UpdatecommentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecommentsRequest $request)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $comments = $this->commentsRepository->update($request->all(), $id);

        Flash::success('Comments updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified comments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comments = $this->commentsRepository->findWithoutFail($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $this->commentsRepository->delete($id);

        Flash::success('Comments deleted successfully.');

        return redirect(route('comments.index'));
    }
}
