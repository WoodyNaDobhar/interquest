<?php

namespace App\Http\Controllers;

use App\DataTables\titlesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetitlesRequest;
use App\Http\Requests\UpdatetitlesRequest;
use App\Repositories\titlesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class titlesController extends AppBaseController
{
    /** @var  titlesRepository */
    private $titlesRepository;

    public function __construct(titlesRepository $titlesRepo)
    {
        $this->titlesRepository = $titlesRepo;
    }

    /**
     * Display a listing of the titles.
     *
     * @param titlesDataTable $titlesDataTable
     * @return Response
     */
    public function index(titlesDataTable $titlesDataTable)
    {
        return $titlesDataTable->render('titles.index');
    }

    /**
     * Show the form for creating a new titles.
     *
     * @return Response
     */
    public function create()
    {
        return view('titles.create');
    }

    /**
     * Store a newly created titles in storage.
     *
     * @param CreatetitlesRequest $request
     *
     * @return Response
     */
    public function store(CreatetitlesRequest $request)
    {
        $input = $request->all();

        $titles = $this->titlesRepository->create($input);

        Flash::success('Titles saved successfully.');

        return redirect(route('titles.index'));
    }

    /**
     * Display the specified titles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $titles = $this->titlesRepository->findWithoutFail($id);

        if (empty($titles)) {
            Flash::error('Titles not found');

            return redirect(route('titles.index'));
        }

        return view('titles.show')->with('titles', $titles);
    }

    /**
     * Show the form for editing the specified titles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $titles = $this->titlesRepository->findWithoutFail($id);

        if (empty($titles)) {
            Flash::error('Titles not found');

            return redirect(route('titles.index'));
        }

        return view('titles.edit')->with('titles', $titles);
    }

    /**
     * Update the specified titles in storage.
     *
     * @param  int              $id
     * @param UpdatetitlesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetitlesRequest $request)
    {
        $titles = $this->titlesRepository->findWithoutFail($id);

        if (empty($titles)) {
            Flash::error('Titles not found');

            return redirect(route('titles.index'));
        }

        $titles = $this->titlesRepository->update($request->all(), $id);

        Flash::success('Titles updated successfully.');

        return redirect(route('titles.index'));
    }

    /**
     * Remove the specified titles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $titles = $this->titlesRepository->findWithoutFail($id);

        if (empty($titles)) {
            Flash::error('Titles not found');

            return redirect(route('titles.index'));
        }

        $this->titlesRepository->delete($id);

        Flash::success('Titles deleted successfully.');

        return redirect(route('titles.index'));
    }
}
