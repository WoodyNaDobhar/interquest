<?php

namespace App\Http\Controllers;

use App\DataTables\FiefdomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFiefdomRequest;
use App\Http\Requests\UpdateFiefdomRequest;
use App\Repositories\FiefdomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FiefdomController extends AppBaseController
{
    /** @var  FiefdomRepository */
    private $fiefdomRepository;

    public function __construct(FiefdomRepository $fiefdomRepo)
    {
        $this->fiefdomRepository = $fiefdomRepo;
    }

    /**
     * Display a listing of the Fiefdom.
     *
     * @param FiefdomDataTable $fiefdomDataTable
     * @return Response
     */
    public function index(FiefdomDataTable $fiefdomDataTable)
    {
        return $fiefdomDataTable->render('fiefdoms.index');
    }

    /**
     * Show the form for creating a new Fiefdom.
     *
     * @return Response
     */
    public function create()
    {
        return view('fiefdoms.create');
    }

    /**
     * Store a newly created Fiefdom in storage.
     *
     * @param CreateFiefdomRequest $request
     *
     * @return Response
     */
    public function store(CreateFiefdomRequest $request)
    {
        $input = $request->all();

        $fiefdom = $this->fiefdomRepository->create($input);

        Flash::success('Fiefdom saved successfully.');

        return redirect(route('fiefdoms.index'));
    }

    /**
     * Display the specified Fiefdom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            Flash::error('Fiefdom not found');

            return redirect(route('fiefdoms.index'));
        }

        return view('fiefdoms.show')->with('fiefdom', $fiefdom);
    }

    /**
     * Show the form for editing the specified Fiefdom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            Flash::error('Fiefdom not found');

            return redirect(route('fiefdoms.index'));
        }

        return view('fiefdoms.edit')->with('fiefdom', $fiefdom);
    }

    /**
     * Update the specified Fiefdom in storage.
     *
     * @param  int              $id
     * @param UpdateFiefdomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFiefdomRequest $request)
    {
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            Flash::error('Fiefdom not found');

            return redirect(route('fiefdoms.index'));
        }

        $fiefdom = $this->fiefdomRepository->update($request->all(), $id);

        Flash::success('Fiefdom updated successfully.');

        return redirect(route('fiefdoms.index'));
    }

    /**
     * Remove the specified Fiefdom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fiefdom = $this->fiefdomRepository->findWithoutFail($id);

        if (empty($fiefdom)) {
            Flash::error('Fiefdom not found');

            return redirect(route('fiefdoms.index'));
        }

        $this->fiefdomRepository->delete($id);

        Flash::success('Fiefdom deleted successfully.');

        return redirect(route('fiefdoms.index'));
    }
}
