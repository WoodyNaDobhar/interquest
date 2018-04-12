<?php

namespace App\Http\Controllers;

use App\DataTables\fiefdomsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatefiefdomsRequest;
use App\Http\Requests\UpdatefiefdomsRequest;
use App\Repositories\fiefdomsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class fiefdomsController extends AppBaseController
{
    /** @var  fiefdomsRepository */
    private $fiefdomsRepository;

    public function __construct(fiefdomsRepository $fiefdomsRepo)
    {
        $this->fiefdomsRepository = $fiefdomsRepo;
    }

    /**
     * Display a listing of the fiefdoms.
     *
     * @param fiefdomsDataTable $fiefdomsDataTable
     * @return Response
     */
    public function index(fiefdomsDataTable $fiefdomsDataTable)
    {
        return $fiefdomsDataTable->render('fiefdoms.index');
    }

    /**
     * Show the form for creating a new fiefdoms.
     *
     * @return Response
     */
    public function create()
    {
        return view('fiefdoms.create');
    }

    /**
     * Store a newly created fiefdoms in storage.
     *
     * @param CreatefiefdomsRequest $request
     *
     * @return Response
     */
    public function store(CreatefiefdomsRequest $request)
    {
        $input = $request->all();

        $fiefdoms = $this->fiefdomsRepository->create($input);

        Flash::success('Fiefdoms saved successfully.');

        return redirect(route('fiefdoms.index'));
    }

    /**
     * Display the specified fiefdoms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fiefdoms = $this->fiefdomsRepository->findWithoutFail($id);

        if (empty($fiefdoms)) {
            Flash::error('Fiefdoms not found');

            return redirect(route('fiefdoms.index'));
        }

        return view('fiefdoms.show')->with('fiefdoms', $fiefdoms);
    }

    /**
     * Show the form for editing the specified fiefdoms.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fiefdoms = $this->fiefdomsRepository->findWithoutFail($id);

        if (empty($fiefdoms)) {
            Flash::error('Fiefdoms not found');

            return redirect(route('fiefdoms.index'));
        }

        return view('fiefdoms.edit')->with('fiefdoms', $fiefdoms);
    }

    /**
     * Update the specified fiefdoms in storage.
     *
     * @param  int              $id
     * @param UpdatefiefdomsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefiefdomsRequest $request)
    {
        $fiefdoms = $this->fiefdomsRepository->findWithoutFail($id);

        if (empty($fiefdoms)) {
            Flash::error('Fiefdoms not found');

            return redirect(route('fiefdoms.index'));
        }

        $fiefdoms = $this->fiefdomsRepository->update($request->all(), $id);

        Flash::success('Fiefdoms updated successfully.');

        return redirect(route('fiefdoms.index'));
    }

    /**
     * Remove the specified fiefdoms from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fiefdoms = $this->fiefdomsRepository->findWithoutFail($id);

        if (empty($fiefdoms)) {
            Flash::error('Fiefdoms not found');

            return redirect(route('fiefdoms.index'));
        }

        $this->fiefdomsRepository->delete($id);

        Flash::success('Fiefdoms deleted successfully.');

        return redirect(route('fiefdoms.index'));
    }
}
