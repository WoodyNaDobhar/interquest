<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonaAPIRequest;
use App\Http\Requests\API\UpdatePersonaAPIRequest;
use App\Http\Requests\API\InvitePersonaAPIRequest;
use App\Models\Persona;
use App\Repositories\PersonaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;
use Mail;
use Auth;

/**
 * Class PersonaController
 * @package App\Http\Controllers\API
 */

class PersonaAPIController extends AppBaseController
{
    /** @var  PersonaRepository */
    private $personaRepository;

    public function __construct(PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }

    /**
     * Display a listing of the Persona.
     * GET|HEAD /personae
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personaRepository->pushCriteria(new RequestCriteria($request));
        $this->personaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $personas = $this->personaRepository->all();

        return $this->sendResponse($personas->toArray(), 'Personae retrieved successfully');
    }

    /**
     * Store a newly created Persona in storage.
     * POST /personae
     *
     * @param CreatePersonaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonaAPIRequest $request)
    {
        $input = $request->all();

        $personas = $this->personaRepository->create($input);

        return $this->sendResponse($personas->toArray(), 'Persona saved successfully');
    }

    /**
     * Display the specified Persona.
     * GET|HEAD /personae/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Persona $persona */
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }

        return $this->sendResponse($persona->toArray(), 'Persona retrieved successfully');
    }

    /**
     * Update the specified Persona in storage.
     * PUT/PATCH /personae/{id}
     *
     * @param  int $id
     * @param UpdatePersonaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Persona $persona */
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }
        if(Gate::denies('mapkeeperOwn', $persona->park->mapkeeper ? $persona->park->mapkeeper->id : 0) &&
        		Gate::denies('own', $persona->id)){
        	return $this->sendError('Permission Denied');
        }

        $persona = $this->personaRepository->update($input, $id);

        return $this->sendResponse($persona->toArray(), 'Persona updated successfully');
    }

    /**
     * Remove the specified Persona from storage.
     * DELETE /personae/{id}
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
        /** @var Persona $persona */
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }

        $persona->delete();

        return $this->sendResponse($id, 'Persona deleted successfully');
    }

	/**
	 * Invite someone to take over a Persona.
	 *
	 * @param InvitePersonaRequest $request
	 *
	 * @return Response
	 */
	public function invite(InvitePersonaAPIRequest $request)
	{
		
		$input = $request->all();

		//add email to persona validClaim
		$persona = Persona::where('id', $input['persona_id'])->first();
		$persona->validClaim = $input['email'];
		$persona->save();

		//send the invite out...
		Mail::send('emails.invite', ['inviter' => Auth::user()], function ($m) use ($persona){
			$m->from('doNotReply@interquestonline.com', 'InterQuest');
			$m->to($persona->validClaim, $persona->name);
			$m->subject('Join the Quest!');
		});
		
		return $this->sendResponse($persona->id, 'Persona invite successfully sent.  The user will be sent a link to create an account with Facebook (for security), and their Persona will be attached to them at that time.');
	}
}
