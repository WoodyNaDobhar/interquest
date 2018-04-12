<?php

namespace App\Http\Controllers;

use App\DataTables\fievesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatefievesRequest;
use App\Http\Requests\UpdatefievesRequest;
use App\Repositories\fievesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class fievesController extends AppBaseController
{
    /** @var  fievesRepository */
    private $fievesRepository;

    public function __construct(fievesRepository $fievesRepo)
    {
        $this->fievesRepository = $fievesRepo;
    }

    /**
     * Display a listing of the fieves.
     *
     * @param fievesDataTable $fievesDataTable
     * @return Response
     */
    public function index(fievesDataTable $fievesDataTable)
    {
        return $fievesDataTable->render('fieves.index');
    }

    /**
     * Show the form for creating a new fieves.
     *
     * @return Response
     */
    public function create()
    {
        return view('fieves.create');
    }

    /**
     * Store a newly created fieves in storage.
     *
     * @param CreatefievesRequest $request
     *
     * @return Response
     */
    public function store(CreatefievesRequest $request)
    {
        $input = $request->all();

        $fieves = $this->fievesRepository->create($input);

        Flash::success('Fieves saved successfully.');

        return redirect(route('fieves.index'));
    }

    /**
     * Display the specified fieves.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fieves = $this->fievesRepository->findWithoutFail($id);

        if (empty($fieves)) {
            Flash::error('Fieves not found');

            return redirect(route('fieves.index'));
        }

        return view('fieves.show')->with('fieves', $fieves);
    }

    /**
     * Show the form for editing the specified fieves.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fieves = $this->fievesRepository->findWithoutFail($id);

        if (empty($fieves)) {
            Flash::error('Fieves not found');

            return redirect(route('fieves.index'));
        }

        return view('fieves.edit')->with('fieves', $fieves);
    }

    /**
     * Update the specified fieves in storage.
     *
     * @param  int              $id
     * @param UpdatefievesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefievesRequest $request)
    {
        $fieves = $this->fievesRepository->findWithoutFail($id);

        if (empty($fieves)) {
            Flash::error('Fieves not found');

            return redirect(route('fieves.index'));
        }

        $fieves = $this->fievesRepository->update($request->all(), $id);

        Flash::success('Fieves updated successfully.');

        return redirect(route('fieves.index'));
    }

    /**
     * Remove the specified fieves from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fieves = $this->fievesRepository->findWithoutFail($id);

        if (empty($fieves)) {
            Flash::error('Fieves not found');

            return redirect(route('fieves.index'));
        }

        $this->fievesRepository->delete($id);

        Flash::success('Fieves deleted successfully.');

        return redirect(route('fieves.index'));
    }
}
