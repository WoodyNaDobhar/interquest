<?php

namespace App\Http\Controllers;

use App\DataTables\TitleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Repositories\TitleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;

class TitleController extends AppBaseController
{
    /** @var  TitleRepository */
    private $titleRepository;

    public function __construct(TitleRepository $titleRepo)
    {
        $this->titleRepository = $titleRepo;
    }

    /**
     * Display a listing of the Title.
     *
     * @param TitleDataTable $titleDataTable
     * @return Response
     */
    public function index(TitleDataTable $titleDataTable)
    {
        return $titleDataTable->render('titles.index');
    }

    /**
     * Show the form for creating a new Title.
     *
     * @return Response
     */
    public function create()
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('titles.index'));
        }
        return view('titles.create');
    }

    /**
     * Store a newly created Title in storage.
     *
     * @param CreateTitleRequest $request
     *
     * @return Response
     */
    public function store(CreateTitleRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('titles.index'));
        }
        $input = $request->all();

        $title = $this->titleRepository->create($input);

        Flash::success('Title saved successfully.');

        return redirect(route('titles.index'));
    }

    /**
     * Display the specified Title.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            Flash::error('Title not found');

            return redirect(route('titles.index'));
        }

        return view('titles.show')->with('title', $title);
    }

    /**
     * Show the form for editing the specified Title.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('titles.index'));
        }
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            Flash::error('Title not found');

            return redirect(route('titles.index'));
        }

        return view('titles.edit')->with('title', $title);
    }

    /**
     * Update the specified Title in storage.
     *
     * @param  int              $id
     * @param UpdateTitleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitleRequest $request)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('titles.index'));
        }
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            Flash::error('Title not found');

            return redirect(route('titles.index'));
        }

        $title = $this->titleRepository->update($request->all(), $id);

        Flash::success('Title updated successfully.');

        return redirect(route('titles.index'));
    }

    /**
     * Remove the specified Title from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Gate::denies('admin')){
        	Flash::error('Permission Denied');
        	return redirect(route('titles.index'));
        }
        $title = $this->titleRepository->findWithoutFail($id);

        if (empty($title)) {
            Flash::error('Title not found');

            return redirect(route('titles.index'));
        }

        $this->titleRepository->delete($id);

        Flash::success('Title deleted successfully.');

        return redirect(route('titles.index'));
    }
}
