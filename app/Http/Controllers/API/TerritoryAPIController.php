<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTerritoryAPIRequest;
use App\Http\Requests\API\UpdateTerritoryAPIRequest;
use App\Models\Territory as Territory;
use App\Models\Npc as Npc;
use App\Models\Persona as Persona;
use App\Models\Fiefdom as Fiefdom;
use App\Models\Fief as Fief;
use App\Models\Park as Park;
use App\Models\Terrain as Terrain;
use App\Repositories\TerritoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class TerritoryController
 * @package App\Http\Controllers\API
 */

class TerritoryAPIController extends AppBaseController
{
	/** @var  TerritoryRepository */
	private $territoryRepository;

	public function __construct(TerritoryRepository $territoryRepo)
	{
		$this->territoryRepository = $territoryRepo;
	}

	/**
	 * Display a listing of the Territory.
	 * GET|HEAD /territories
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(Gate::denies('admin')){
			return $this->sendError('Permission Denied');
		}
		$this->territoryRepository->pushCriteria(new RequestCriteria($request));
		$this->territoryRepository->pushCriteria(new LimitOffsetCriteria($request));
		$territories = $this->territoryRepository->all();

		return $this->sendResponse($territories->toArray(), 'Territories retrieved successfully');
	}

	/**
	 * Store a newly created Territory in storage.
	 * POST /territories
	 *
	 * @param CreateTerritoryAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTerritoryAPIRequest $request)
	{
		if(Gate::denies('admin')){
			return $this->sendError('Permission Denied');
		}
		$input = $request->all();

		$territory = $this->territoryRepository->create($input);

		//is there a ruler?
		if($input['fiefdom_type'] && $input['fiefdom_type'] == 'Fiefdom'){
			
			//setup
			if($input['ruler_type'] == 'Npc'){
				$ruler = Npc::where('id', $input['ruler_id'])->first();
			}else{
				$ruler = Persona::where('id', $input['ruler_id'])->first();
			}
			
			//!fiefdom_id ? Make one
			if(!$input['fiefdom_id'] || $input['fiefdom_id'] == ''){
				$fiefdom = new Fiefdom;
				$fiefdom->name = 'Domain of ' . $ruler->name;
				$fiefdom->image = null;
				$fiefdom->ruler_id = $input['ruler_id'];
				$fiefdom->ruler_type = $input['ruler_type'];
				$fiefdom->save();
			}else{
				$fiefdom = Fiefdom::find($input['fiefdom_id']);
			}
			
			//make the fief
			$fief = new Fief;
			$fief->name = $input['fief_name'] ? $input['fief_name'] : null;
			$fief->territory_id = $territory->id;
			$fief->fiefdom_id = (!$input['fiefdom_id'] || $input['fiefdom_id'] == '') ? $fiefdom->id : $input['fiefdom_id'];
			$fief->fiefdom_type = 'Fiefdom';
			$fief->save();
			
			//update ruler to this home (if homeless)
			if(!$ruler->territory_id){
				$ruler->territory_id = $territory->id;
				$ruler->save();
			}
		}else if($input['fiefdom_type'] && $input['fiefdom_type'] == 'Park'){
			
			//make the fief
			$fief = new Fief;
			$fief->name = $input['fief_name'] ? $input['fief_name'] : null;
			$fief->territory_id = $territory->id;
			$fief->fiefdom_id = $input['fiefdom_id'];
			$fief->fiefdom_type = 'Park';
			$fief->save();
		}
		
		$response = 
			$territory->toArray() + 
			[
				'terrain'	=> $territory->terrain->toArray()
			]
		;
			
		if(isset($fief) && $fief->fiefdom->ruler){
			$response['fief']['fiefdom']['ruler'] = $fief->fiefdom->ruler->toArray();
		}
		
		return $this->sendResponse($response, 'Territory saved successfully');
	}

	/**
	 * Display the specified Territory.
	 * GET|HEAD /territories/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		/** @var Territory $territory */
		$territory = $this->territoryRepository
			->with('fief.fiefdom.ruler')
			->with('fief.steward')
			->with('buildings')
// 			->findWithoutFail($id)
			->find($id)
		;

		if(empty($territory)){
			return $this->sendError('Territory not found');
		}


		//TODO: devise or fetch a means to handle permission based data filtering
		//public: owned by a park or PC
		// 				(
		// 					$territory->fief &&
		// 					(
		// 						$territory->fief->fiefdom_type == 'Park' ||
		// 						$territory->fief->fiefdom->ruler_type == 'Persona'
		// 					)
		// 				)
		//close: w/in 30 hexes of capital?

		return $this->sendResponse($territory->toArray(), 'Territory retrieved successfully');
	}

	/**
	 * Update the specified Territory in storage.
	 * PUT/PATCH /territories/{id}
	 *
	 * @param  int $id
	 * @param UpdateTerritoryAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTerritoryAPIRequest $request)
	{
		if(Gate::denies('mapkeeper')){
			return $this->sendError('Permission Denied');
		}
		$input = $request->all();
		
		/** @var Territory $territory */
		$territory = $this->territoryRepository->findWithoutFail($id);
		$fief = $territory->fief;
		$fiefdom = $territory->fief ? $territory->fief->fiefdom : null;

		if (empty($territory)) {
			return $this->sendError('Territory not found');
		}
		
		//is there a ruler?
		if(array_key_exists('ruler_id', $input) && $input['ruler_id'] != ''){
			
			//setup
			if($input['ruler_type'] == 'Npc'){
				$ruler = Npc::where('id', $input['ruler_id'])->first();
			}else{
				$ruler = Persona::where('id', $input['ruler_id'])->first();
			}
			
			//!fiefdom_id ? Make one
			if(!$input['fiefdom_id'] || $input['fiefdom_id'] == ''){
				$fiefdom = new Fiefdom;
				$fiefdom->name = 'Domain of ' . $ruler->name;
				$fiefdom->image = null;
				$fiefdom->ruler_id = $input['ruler_id'];
				$fiefdom->ruler_type = $input['ruler_type'];
				$fiefdom->save();
			}else{
				
				//get the fiefdom
				if($input['fiefdom_type'] == 'Park'){
					$fiefdom = Park::where('id', $input['fiefdom_id'])->first();
				}else{
					$fiefdom = Fiefdom::where('id', $input['fiefdom_id'])->first();
				}
			}
			
			//fief doesn't exist
			if(!$fief){
			
				//make the fief
				$fief = new Fief;
				$fief->name = $input['fief_name'] ? $input['fief_name'] : null;
				$fief->territory_id = $territory->id;
				$fief->fiefdom_id = $fiefdom->id;
				$fief->fiefdom_type = $input['fiefdom_type'];
				$fief->save();
			//ruler changed
			}else if(
				$input['ruler_id'] != $fief->fiefdom->ruler_id ||
				$input['ruler_type'] != $fief->fiefdom->ruler_type
			){
				//update fief
				$fief->name = $input['fief_name'] ? $input['fief_name'] : $fief->name;
				$fief->fiefdom_id = $fiefdom->id;
				$fief->fiefdom_type = $input['fiefdom_type'];
				$fief->save();
			//fief exists, same ruler
			}else{
				//update fief
				$fief->name = $input['fief_name'] ? $input['fief_name'] : $fief->name;
				$fief->save();
			}
			
			//update ruler to this home (if homeless)
			if(!$ruler->territory_id){
				$ruler->territory_id = $territory->id;
				$ruler->save();
			}
			
		//no ruler...park or none
		}else{
			
			//!fiefdom_id ? none : park
			if(!$input['fiefdom_id'] || $input['fiefdom_id'] == ''){
				if($fief){
					$fief->delete();
				}
			}elseif(!$fief){
			
				//make the fief
				$fief = new Fief;
				$fief->name = $input['fief_name'] ? $input['fief_name'] : null;
				$fief->territory_id = $territory->id;
				$fief->fiefdom_id = $input['fiefdom_id'];
				$fief->fiefdom_type = $input['fiefdom_type'];
				$fief->save();
			}else{
				
				//update fief
				$fief->name = $input['fief_name'] ? $input['fief_name'] : $fief->name;
				$fief->fiefdom_id = $input['fiefdom_id'];
				$fief->fiefdom_type = $input['fiefdom_type'];
				$fief->save();
			}
		}
		
		$territory = $this->territoryRepository->update($input, $id);
		
		//refresh territory data for some reason
		$territory = Territory::where('id', $id)->first();
		
		$response = 
			$territory->toArray() + 
			[
				'terrain'	=> Terrain::where('id', $territory->terrain_id)->first()->toArray()
			]
		;
		if($fief && $fief->fiefdom->ruler->exists){
			$response['fief']['fiefdom']['ruler'] = $fief->fiefdom->ruler->toArray();
		}
		
		return $this->sendResponse($response, 'Territory updated successfully');
	}

	/**
	 * Remove the specified Territory from storage.
	 * DELETE /territories/{id}
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
		/** @var Territory $territory */
		$territory = $this->territoryRepository->findWithoutFail($id);

		if (empty($territory)) {
			return $this->sendError('Territory not found');
		}

		$territory->delete();

		return $this->sendResponse($id, 'Territory deleted successfully');
	}
	
	/**
	 * Get the territories around this one, in this one's sector
	 *
	 * @return Response
	 */
	public function map($id)
	{
		
		//get the territory
		$territory = $this->territoryRepository->findWithoutFail($id);
		
		//check
		if(empty($territory)){
			return $this->sendError('Territory not found');
		}else{
			
			//define borders
			$colMod = $territory->column - 4;
			$rowMod = $territory->row - 4;
			
			//build array
			$responseData = [
				'colMod'		=> $colMod,
				'rowMod'		=> $rowMod,
				'territories'	=> []
			];
			for($row = 0; $row < 10; $row++){
				for($column = 0; $column < 10; $column++){
					$tt = \App\Models\Territory::where('column', $colMod + $column)->where('row', $rowMod + $row)->first();
					if($tt){
						$responseData['territories'] = [
							$tt->column . '-' . $tt->row => [
								'id'		=> $tt->id,
								'name'		=> $tt->name,
								'terrain'	=> $tt->terrain->name,
								'cs'		=> $tt->castle_strength,
								'fief'		=> $tt->fief ? $tt->fief : null,
								'fiefdom'	=> $tt->fief ? $tt->fief->fiefdom : null
							]
						] + $responseData['territories'];
					}else{
						$responseData['territories'] = [
							($colMod + $column) . '-' . ($rowMod + $row) => [
								'id'		=> '',
								'name'		=> 'Undiscovered',
								'terrain'	=> 'Undiscovered',
								'cs'		=> 0,
								'fief_id'	=> null,
								'fiefdom_id'=> null
							]
						] + $responseData['territories'];
					}
				}
			}
			return $this->sendResponse($responseData, 'Territory Sector retrieved successfully');
		}
	}
}
