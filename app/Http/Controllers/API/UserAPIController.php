<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Gate;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
	/** @var  UserRepository */
	private $userRepository;
	
	public function __construct(UserRepository $userRepo)
	{
	$this->userRepository = $userRepo;
	}
	
	/**
	 * Display a listing of the User.
	 * GET|HEAD /users
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(Gate::denies('admin')){
			return $this->sendError('Permission Denied');
		}
		$this->userRepository->pushCriteria(new RequestCriteria($request));
		$this->userRepository->pushCriteria(new LimitOffsetCriteria($request));
		$users = $this->userRepository->all();
		
		return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
	}
	
	/**
	 * Store a newly created User in storage.
	 * POST /users
	 *
	 * @param CreateUserAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUserAPIRequest $request)
	{
		$input = $request->all();
		
		$users = $this->userRepository->create($input);
		
		return $this->sendResponse($users->toArray(), 'User saved successfully');
	}
	
	/**
	 * Display the specified User.
	 * GET|HEAD /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		if(Gate::denies('admin')){
			return $this->sendError('Permission Denied');
		}
		/** @var User $user */
		$user = $this->userRepository->findWithoutFail($id);
		
		if (empty($user)) {
			return $this->sendError('User not found');
		}
		
		return $this->sendResponse($user->toArray(), 'User retrieved successfully');
	}
	
	/**
	 * Update the specified User in storage.
	 * PUT/PATCH /users/{id}
	 *
	 * @param  int $id
	 * @param UpdateUserAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUserAPIRequest $request)
	{
		if(Gate::denies('admin')){
			return $this->sendError('Permission Denied');
		}
		$input = $request->all();
		
		/** @var User $user */
		$user = $this->userRepository->findWithoutFail($id);
		
		if (empty($user)) {
			return $this->sendError('User not found');
		}
		
		$user = $this->userRepository->update($input, $id);
		
		return $this->sendResponse($user->toArray(), 'User updated successfully');
	}
	
	/**
	 * Remove the specified User from storage.
	 * DELETE /users/{id}
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
		/** @var User $user */
		$user = $this->userRepository->findWithoutFail($id);
		
		if (empty($user)) {
			return $this->sendError('User not found');
		}
		
		$user->delete();
		
		return $this->sendResponse($id, 'User deleted successfully');
	}

	/**
	 * Update a User to MapKeeper status.
	 *
	 * @return Response
	 */
	public function makeMapkeeper($id)
	{
		
		//setup
		$response = [
			'status'		=> false,
			'message'		=> ''
		];
		
		//get the user
		$user = $this->usersRepository->findWithoutFail($id);
		if(empty($user)){
			return $this->sendError('User not found');
		}
		if(Gate::denies('mapkeeperOwn', $user->park->mapkeeper ? $user->park->mapkeeper->id : 0)){
			return $this->sendError('Permission Denied');
		}
		
		//given user isn't mk?
		if($user->is_mapkeeper == 1){
			return $this->sendError('User Already MapKeeper.');
		//not mk
		}else{
			
			//get currentMK
			$currentMK = $user->park->mapkeeper;
		
			//unset current mk
			if(!empty($currentMK)){
				$currentMK->is_mapkeeper = 0;
				$currentMK->save();
			}
			
			//set new mk
			$user->is_mapkeeper = 1;
			$user->save();
			
			//respond
			return $this->sendResponse($id, 'The MapKeeper for this Park has been changed to ' . $user->persona->name . '.');
		}
	}
}
