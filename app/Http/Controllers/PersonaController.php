<?php

namespace App\Http\Controllers;

use App\DataTables\PersonaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Models\Action as Actions;
use App\Models\Vocation as Vocations;
use App\Models\Metatype as Metatypes;
use App\Models\Park as Parks;
use App\Models\Title as Titles;
use App\Models\User as Users;
use App\Repositories\PersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Gate;
use Auth;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\Territory as Territories;

class PersonaController extends AppBaseController
{
	/** @var  PersonaRepository */
	private $personaRepository;

	public function __construct(PersonaRepository $personaRepo)
	{
		$this->personaRepository = $personaRepo;
	}

	/**
	 * Display a listing of the Persona.
	 *
	 * @param PersonaDataTable $personaDataTable
	 * @return Response
	 */
	public function index(PersonaDataTable $personaDataTable)
	{
		return $personaDataTable->render('personae.index');
	}

	/**
	 * Show the form for creating a new Persona.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		//security
		if(Gate::denies('admin') && Gate::denies('mapKeeper') && Gate::denies('noPersona')){
			Flash::error('Permission Denied');
			return redirect(route('personae.index'));
		}
		
		//get vocations
		$vocations = Vocations::pluck('name', 'id')->toArray();
		
		//get metatypes
		if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->persona == null)){
			$metatypes = Metatypes::where('power', 1)->pluck('name', 'id')->toArray();
		}else{
			$metatypes = Metatypes::where('power', 1)->where('level', 1)->pluck('name', 'id')->toArray();
		}
		
		//get parks/territories
		$parks = [];
		$territories = [];
		if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->persona == null)){
			$parks = Parks::orderBy('name')->pluck('name', 'id')->toArray();
		}elseif(!Auth::guest() && Auth::user()->is_mapkeeper){

			$park = Auth::user()->persona->park;
			$parks = Parks::where('id', $park->id)->orderBy('name')->pluck('name', 'id')->toArray();

			//get territories
			$territoriesObjs = Territories::whereBetween('row', [$park->capital->row - 10, $park->capital->row + 10])
				->whereBetween('column', [$park->capital->column - 10, $park->capital->column + 10])
				->get();
			foreach($territoriesObjs as $tObj){
				$territories[$tObj->id] = $tObj->displayname;
			}
		}
		
		//get actions
		if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->persona == null)){
			$actions = Actions::pluck('name', 'id')->toArray();
		}else{
			$actions = Actions::where('is_common', 1)->pluck('name', 'id')->toArray();
		}
		
		//get titles
		$titles = Titles::pluck('name', 'id')->toArray();
		
		//respond
		return view('personae.create')
			->with('vocations', $vocations)
			->with('metatypes', $metatypes)
			->with('parks', $parks)
			->with('territories', $territories)
			->with('actions', $actions)
			->with('titles', $titles);
	}

	/**
	 * Store a newly created Persona in storage.
	 *
	 * @param CreatePersonaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePersonaRequest $request)
	{
		
		//security
		if(Gate::denies('admin') && Gate::denies('mapKeeper') && Gate::denies('noPersona')){
			Flash::error('Permission Denied');
			return redirect(route('personae.index'));
		}
		
		//setup
		$input = $request->all();
		
		//make sure the claim email is unique or it's not a self-inductor
		if(filter_var($input['validClaim'], FILTER_VALIDATE_EMAIL) && Auth::user()->persona != null){
			$currentUsers = Users::where('email', $input['validClaim'])->get();
			if($currentUsers->count() > 0){
				return redirect(route('personae.create'))
					->withInput()
					->withErrors('Persona claim validation email is not unique...somebody is using it already.');
			}
		}
		
		//if the creator has no Persona, assume this is it
		if(Auth::user()->persona == null){
			$input['user_id'] = Auth::user()->id;
			$input['validClaim'] = 'claimed';
			$park = Parks::where('id', $input['park_id'])->first();
			$input['territory_id'] = $park->territory_id;
		}
		
		//make it
		$persona = $this->personaRepository->create($input);
		
		//if there's an email && !user, we'll need to send an invite out...
		if(filter_var($input['validClaim'], FILTER_VALIDATE_EMAIL) && $persona->user_id == null){
			Mail::send('emails.invite', ['inviter' => Auth::user()], function ($m) use ($input){
				$m->from('doNotReply@interquestonline.com', 'InterQuest');
				$m->to($input['validClaim'], $input['name']);
				$m->subject('Join the Quest!');
			});
		}
		
		//respond
		Flash::success('Persona saved successfully.');
		return redirect(route('personae.index'));
	}

	/**
	 * Display the specified Persona.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$persona = $this->personaRepository->findWithoutFail($id);
		if (empty($persona)) {
			Flash::error('Persona not found');
			return redirect(route('personae.index'));
		}
		
		//fetch actions
		$actions = Actions::all();

		//respond
		return view('personae.show')->with('persona', $persona)->with('actions', $actions);
	}

	/**
	 * Show the form for editing the specified Persona.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		
		//setup
		$persona = $this->personaRepository->findWithoutFail($id);
		if(empty($persona)){
			Flash::error('Persona not found');
			return redirect(route('personae.index'));
		}
		
		//security
		if(Gate::denies('mapkeeperOwn', ($persona->park->mapkeeper ? $persona->park->mapkeeper->id : 0))
			&& Gate::denies('own', $persona->id)
		){
			Flash::error('Permission Denied');
			return redirect(route('personae.index'));
		}
		
		//get vocations
		$vocations = Vocations::pluck('name', 'id')->toArray();
		
		//get metatypes
		$metatypes = Metatypes::pluck('name', 'id')->toArray();
		
		//get parks
		$park = Auth::user()->persona->park;
		$parks = [];
		if(!Auth::guest() && Auth::user()->is_admin){
			$parks = Parks::orderBy('name')->pluck('name', 'id')->toArray();
		}elseif(!Auth::guest() && Auth::user()->is_mapkeeper){
			$parks = Parks::where('id', $park->id)->orderBy('name')->pluck('name', 'id')->toArray();
		}

		//get territories
		$territoriesObjs = Territories::whereBetween('row', [$park->capital->row - 10, $park->capital->row + 10])
			->whereBetween('column', [$park->capital->column - 10, $park->capital->column + 10])
			->get();
		foreach($territoriesObjs as $tObj){
			$territories[$tObj->id] = $tObj->displayname;
		}
		
		//get actions
		$actions = Actions::pluck('name', 'id')->toArray();
	
		//get titles
		$titles = Titles::pluck('name', 'id')->toArray();

		//respond
		return view('personae.edit')
			->with('persona', $persona)
			->with('vocations', $vocations)
			->with('metatypes', $metatypes)
			->with('parks', $parks)
			->with('territories', $territories)
			->with('actions', $actions)
			->with('titles', $titles);
	}

	/**
	 * Update the specified Persona in storage.
	 *
	 * @param  int			  $id
	 * @param UpdatePersonaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePersonaRequest $request)
	{
		
		//setup
		$persona = $this->personaRepository->findWithoutFail($id);
		if (empty($persona)) {
			Flash::error('Persona not found');
			return redirect(route('personae.index'));
		}
		
		//security
		if(Gate::denies('mapkeeperOwn', $persona->park->mapkeeper ? $persona->park->mapkeeper->id : 0) &&
				Gate::denies('own', $persona->id)){
			Flash::error('Permission Denied');
			return redirect(route('personae.index'));
		}
		
		//update
		$persona = $this->personaRepository->update($request->all(), $id);

		//respond
		Flash::success('Persona updated successfully.');
		return redirect(route('personae.index'));
	}

	/**
	 * Remove the specified Persona from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		
		//security
		if(Gate::denies('admin')){
			Flash::error('Permission Denied');
			return redirect(route('personae.index'));
		}
		
		//setup
		$persona = $this->personaRepository->findWithoutFail($id);
		if (empty($persona)) {
			Flash::error('Persona not found');
			return redirect(route('personae.index'));
		}

		//update
		$this->personaRepository->delete($id);

		//respond
		Flash::success('Persona deleted successfully.');
		return redirect(route('personae.index'));
	}
}
