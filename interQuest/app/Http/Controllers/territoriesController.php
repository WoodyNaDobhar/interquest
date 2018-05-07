<?php

namespace App\Http\Controllers;

use App\DataTables\territoriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateterritoriesRequest;
use App\Http\Requests\UpdateterritoriesRequest;
use App\Repositories\territoriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Territory;

class territoriesController extends AppBaseController
{
	/** @var  territoriesRepository */
	private $territoriesRepository;

	public function __construct(territoriesRepository $territoriesRepo)
	{
		$this->territoriesRepository = $territoriesRepo;
	}

	/**
	 * Display a listing of the territories.
	 *
	 * @param territoriesDataTable $territoriesDataTable
	 * @return Response
	 */
	public function index(territoriesDataTable $territoriesDataTable)
	{
		return $territoriesDataTable->render('territories.index');
	}

	/**
	 * Show the form for creating a new territories.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('territories.create');
	}

	/**
	 * Store a newly created territories in storage.
	 *
	 * @param CreateterritoriesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateterritoriesRequest $request)
	{
		$input = $request->all();

		$territories = $this->territoriesRepository->create($input);

		Flash::success('Territory saved successfully.');

		return redirect(route('territories.index'));
	}

	/**
	 * Display the specified territories.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$territories = $this->territoriesRepository->findWithoutFail($id);
		
		if (empty($territories)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		return view('territories.show')->with('territory', $territories);
	}

	/**
	 * Show the form for editing the specified territories.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$territories = $this->territoriesRepository->findWithoutFail($id);

		if (empty($territories)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		return view('territories.edit')->with('territory', $territories);
	}

	/**
	 * Update the specified territories in storage.
	 *
	 * @param  int			  $id
	 * @param UpdateterritoriesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateterritoriesRequest $request)
	{
		$territories = $this->territoriesRepository->findWithoutFail($id);

		if (empty($territories)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		$territories = $this->territoriesRepository->update($request->all(), $id);

		Flash::success('Territory updated successfully.');

		return redirect(route('territories.index'));
	}

	/**
	 * Remove the specified territories from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$territories = $this->territoriesRepository->findWithoutFail($id);

		if (empty($territories)) {
			Flash::error('Territory not found');

			return redirect(route('territories.index'));
		}

		$this->territoriesRepository->delete($id);

		Flash::success('Territory deleted successfully.');

		return redirect(route('territories.index'));
	}

	/**
	 * Get the territories around this one, in this one's sector
	 *
	 * @return Response
	 */
	public function map($id)
	{
		
		//get the territory
		$territory = $this->territoriesRepository->findWithoutFail($id);
		
		//check
		if(empty($territory)){
			Flash::error('Territory not found');
			return redirect(route('territories.index'));
		}else{
			
			//define borders
			$colMod = $territory->column - 4;
			$rowMod = $territory->row - 4;
			
			//build array
			$response = [
				'colMod'		=> $colMod,
				'rowMod'		=> $rowMod,
				'territories'	=> []
			];
			for($row = 0; $row < 10; $row++){
				for($column = 0; $column < 10; $column++){
					$tt = \App\Models\Territory::where('column', $colMod + $column)->where('row', $rowMod + $row)->first();
					if($tt){
						$response['territories'] = [
							$tt->column . '-' . $tt->row => [
								'id'		=> $tt->id,
								'terrain'	=> $tt->terrain->name,
								'cs'		=> $tt->castle_strength,
								'fiefdom'	=> $tt->fief ? $tt->fief->fiefdom : null
							]
						] + $response['territories'];
					}else{
						$response['territories'] = [
							($colMod + $column) . '-' . ($rowMod + $row) => [
								'id'		=> '',
								'terrain'	=> 'Undiscovered',
								'cs'		=> 0,
								'fiefdom_id'=> null
							]
						] + $response['territories'];
					}
				}
			}
			return json_encode($response);
		}
	}
}
