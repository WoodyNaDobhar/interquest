<?php

namespace App\Http\Controllers;

use App\DataTables\usersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Repositories\usersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class usersController extends AppBaseController
{
    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     *
     * @param usersDataTable $usersDataTable
     * @return Response
     */
    public function index(usersDataTable $usersDataTable)
    {
        return $usersDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();

        $users = $this->usersRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
    	
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $users);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    	
    	//permission
    	if(Auth::user()->cannot('updateUser')){
    		Flash::error('Permission Denied');
    		return redirect('/');
    	}
    	
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $users);
    }

    /**
     * Update the specified users in storage.
     *
     * @param  int              $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
    	
    	//permission
    	if(Auth::user()->cannot('updateUser')){
    		Flash::error('Permission Denied');
    		return redirect('/');
    	}
    	
        $users = $this->usersRepository->findWithoutFail($id);

        if(empty($users)){
            Flash::error('User not found');
            return redirect(route('users.index'));
        }

        $users = $this->usersRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

	/**
	 * Update a User to MapKeeper status.
	 *
	 * @return Response
	 */
	public function mkToggle($id)
	{
		
		//setup
		$response = [
			'status'		=> false,
			'message'		=> ''
		];
		
		//get the user
		$user = $this->territoriesusersRepository->findWithoutFail($id);
		
		//is mk?
		if($user->is_mapkeeper){
			
			//Only admins can do this
			if(Auth::user()->is_admin){
				
				//do it
				$user->is_mapkeeper = 0;
				$user->save();
				
				//respond
				$response['status'] = true;
				$response['message'] = $user->persona->name . ' is no longer a MapKeeper.';
			}else{
				
				//respond
				$response['status'] = false;
				$response['message'] = 'Update permissions failed.  You must instead assign a new MapKeeper.';
			}
			
		//not mk
		}else{
			
			//get current mk
			$currentMK = $user->park->mapkeeper;
			
			//unset current mk
			$currentMK->is_mapkeeper = 0;
			$currentMK->save();
			
			//set new mk
			$user->is_mapkeeper = 1;
			$user->save();
			
			//respond
			$response['status'] = true;
			$response['message'] = 'The MapKeeper for this Park has been changed to ' . $user->persona->name . '.';
		}
	}
}
