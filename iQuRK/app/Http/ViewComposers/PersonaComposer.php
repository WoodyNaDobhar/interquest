<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Auth;
use App\Models\User;

class PersonaComposer
{

	/**
	 * Create a new profile composer.
	 *
	 * @param  UserRepository  $users
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		if(Auth::check()){
			$view->with('userPersona', Auth::user()->persona);
		}
	}
}