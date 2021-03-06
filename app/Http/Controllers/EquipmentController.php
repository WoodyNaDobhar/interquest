<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Repositories\EquipmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use App\Models\Building;

class EquipmentController extends AppBaseController
{
	/** @var  EquipmentRepository */
	private $equipmentRepository;

	public function __construct(EquipmentRepository $equipmentRepo)
	{
		$this->equipmentRepository = $equipmentRepo;
	}

	/**
	 * Display a listing of the Equipment.
	 *
	 * @param EquipmentDataTable $equipmentDataTable
	 * @return Response
	 */
	public function index(EquipmentDataTable $equipmentDataTable)
	{
		return $equipmentDataTable->render('equipment.index');
	}

	/**
	 * Show the form for creating a new Equipment.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Gate::denies('mapkeeper')){
			Flash::error('Permission Denied');
			return redirect(route('equipment.index'));
		}
		
		//get buildings
		$buildingsT = Building::pluck('name', 'id')->toArray();
		$buildings = array_merge([
			'' => 'None'
		], $buildingsT);
		
		return view('equipment.create')
			->with('buildings', $buildings);
	}

	/**
	 * Store a newly created Equipment in storage.
	 *
	 * @param CreateEquipmentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEquipmentRequest $request)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('equipment.index'));
		}
		$input = $request->all();

		$equipment = $this->equipmentRepository->create($input);

		Flash::success('Equipment saved successfully.');

		return redirect(route('equipment.index'));
	}

	/**
	 * Display the specified Equipment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$equipment = $this->equipmentRepository->findWithoutFail($id);

		if (empty($equipment)) {
			Flash::error('Equipment not found');

			return redirect(route('equipment.index'));
		}

		return view('equipment.show')->with('equipment', $equipment);
	}

	/**
	 * Show the form for editing the specified Equipment.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('equipment.index'));
		}
		$equipment = $this->equipmentRepository->findWithoutFail($id);

		if (empty($equipment)) {
			Flash::error('Equipment not found');

			return redirect(route('equipment.index'));
		}

		return view('equipment.edit')->with('equipment', $equipment);
	}

	/**
	 * Update the specified Equipment in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateEquipmentRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEquipmentRequest $request)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('equipment.index'));
		}
		$equipment = $this->equipmentRepository->findWithoutFail($id);

		if (empty($equipment)) {
			Flash::error('Equipment not found');

			return redirect(route('equipment.index'));
		}

		$equipment = $this->equipmentRepository->update($request->all(), $id);

		Flash::success('Equipment updated successfully.');

		return redirect(route('equipment.index'));
	}

	/**
	 * Remove the specified Equipment from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('equipment.index'));
		}
		$equipment = $this->equipmentRepository->findWithoutFail($id);

		if (empty($equipment)) {
			Flash::error('Equipment not found');

			return redirect(route('equipment.index'));
		}

		$this->equipmentRepository->delete($id);

		Flash::success('Equipment deleted successfully.');

		return redirect(route('equipment.index'));
	}
}
