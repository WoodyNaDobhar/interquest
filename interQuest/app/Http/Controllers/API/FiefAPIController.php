<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFiefAPIRequest;
use App\Http\Requests\API\UpdateFiefAPIRequest;
use App\Models\Fief;
use App\Repositories\FiefRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class FiefController
 * @package App\Http\Controllers\API
 */

class FiefAPIController extends AppBaseController
{
    /** @var  FiefRepository */
    private $fiefRepository;

    public function __construct(FiefRepository $fiefRepo)
    {
        $this->fiefRepository = $fiefRepo;
    }

    /**
     * Display a listing of the Fief.
     * GET|HEAD /fiefs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fiefRepository->pushCriteria(new RequestCriteria($request));
        $this->fiefRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fiefs = $this->fiefRepository->all();

        return $this->sendResponse($fiefs->toArray(), 'Fiefs retrieved successfully');
    }

    /**
     * Store a newly created Fief in storage.
     * POST /fiefs
     *
     * @param CreateFiefAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFiefAPIRequest $request)
    {
        if(Gate::denies('mapkeeper')){
            return $this->sendError('Permission Denied');
        }
        $input = $request->all();

        $fiefs = $this->fiefRepository->create($input);

        return $this->sendResponse($fiefs->toArray(), 'Fief saved successfully');
    }

    /**
     * Display the specified Fief.
     * GET|HEAD /fiefs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fief $fief */
        $fief = $this->fiefRepository->findWithoutFail($id);

        if (empty($fief)) {
            return $this->sendError('Fief not found');
        }

        return $this->sendResponse($fief->toArray(), 'Fief retrieved successfully');
    }

    /**
     * Update the specified Fief in storage.
     * PUT/PATCH /fiefs/{id}
     *
     * @param  int $id
     * @param UpdateFiefAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFiefAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fief $fief */
        $fief = $this->fiefRepository->findWithoutFail($id);

        if (empty($fief)) {
            return $this->sendError('Fief not found');
        }
        
        $fiefRulerMapkeeperId = $fief->fiefdom_type == 'App\Models\Fiefdom' ? 
	        	$fief->fiefdom->ruler->park->mapkeeper->id :
	        $fief->fiefdom_type == 'App\Models\Park' ?
	        	$fief->fiefdom->ruler->mapkeeper->id :
	        	0;
        $fiefRulerPersonaId = $fief->fiefdom_type == 'App\Models\Fiefdom' ?  
        	(
        		$fief->fiefdom->ruler_type == 'App\Models\Persona' ? 
        			$fief->fiefdom->ruler_id :
        			0
        	) :
        	$fief->fiefdom->monarch ? $fief->fiefdom->monarch->id : 0;
        if(Gate::denies('mapkeeperOwn', $fiefRulerMapkeeperId) &&
        	Gate::denies('own', $fiefRulerPersonaId)
        	){
        	Flash::error('Permission Denied');
        	return redirect(route('fiefs.index'));
        }

        $fief = $this->fiefRepository->update($input, $id);

        return $this->sendResponse($fief->toArray(), 'Fief updated successfully');
    }

    /**
     * Remove the specified Fief from storage.
     * DELETE /fiefs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Fief $fief */
        $fief = $this->fiefRepository->findWithoutFail($id);

        if (empty($fief)) {
            return $this->sendError('Fief not found');
        }

        $fief->delete();

        return $this->sendResponse($id, 'Fief deleted successfully');
    }
}
