<?php

namespace App\Http\Controllers;

use App\DataTables\vocationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatevocationsRequest;
use App\Http\Requests\UpdatevocationsRequest;
use App\Repositories\vocationsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class vocationsController extends AppBaseController
{
    /** @var  vocationsRepository */
    private $vocationsRepository;

    public function __construct(vocationsRepository $vocationsRepo)
    {
        $this->vocationsRepository = $vocationsRepo;
    }

    /**
     * Display a listing of the vocations.
     *
     * @param vocationsDataTable $vocationsDataTable
     * @return Response
     */
    public function index(vocationsDataTable $vocationsDataTable)
    {
        return $vocationsDataTable->render('vocations.index');
    }

    /**
     * Show the form for creating a new vocations.
     *
     * @return Response
     */
    public function create()
    {
        return view('vocations.create');
    }

    /**
     * Store a newly created vocations in storage.
     *
     * @param CreatevocationsRequest $request
     *
     * @return Response
     */
    public function store(CreatevocationsRequest $request)
    {
        $input = $request->all();

        $vocations = $this->vocationsRepository->create($input);

        Flash::success('Vocations saved successfully.');

        return redirect(route('vocations.index'));
    }

    /**
     * Display the specified vocations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vocations = $this->vocationsRepository->findWithoutFail($id);

        if (empty($vocations)) {
            Flash::error('Vocations not found');

            return redirect(route('vocations.index'));
        }

        return view('vocations.show')->with('vocations', $vocations);
    }

    /**
     * Show the form for editing the specified vocations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vocations = $this->vocationsRepository->findWithoutFail($id);

        if (empty($vocations)) {
            Flash::error('Vocations not found');

            return redirect(route('vocations.index'));
        }

        return view('vocations.edit')->with('vocations', $vocations);
    }

    /**
     * Update the specified vocations in storage.
     *
     * @param  int              $id
     * @param UpdatevocationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevocationsRequest $request)
    {
        $vocations = $this->vocationsRepository->findWithoutFail($id);

        if (empty($vocations)) {
            Flash::error('Vocations not found');

            return redirect(route('vocations.index'));
        }

        $vocations = $this->vocationsRepository->update($request->all(), $id);

        Flash::success('Vocations updated successfully.');

        return redirect(route('vocations.index'));
    }

    /**
     * Remove the specified vocations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vocations = $this->vocationsRepository->findWithoutFail($id);

        if (empty($vocations)) {
            Flash::error('Vocations not found');

            return redirect(route('vocations.index'));
        }

        $this->vocationsRepository->delete($id);

        Flash::success('Vocations deleted successfully.');

        return redirect(route('vocations.index'));
    }
}
