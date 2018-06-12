<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		$this->registerPolicies($gate);

		//permissions
		$gate->define('admin', function () {
			return (bool) Auth::user()->is_admin;
		});
		$gate->define('mapkeeper', function () {
			return (bool) Auth::user()->is_admin ? true : (
				Auth::user()->is_mapkeeper ? true : false
			);
		});
		$gate->define('mapkeeperOwn', function ($personaID) {
			return (bool) Auth::user()->is_admin ? true : (
				Auth::user()->is_mapkeeper && 
					Auth::user()->persona->id == $personaID ? true : false
			);
		});
		$gate->define('own', function ($personaID) {
			return (bool) Auth::user()->is_admin ? true : (
				Auth::user()->is_mapkeeper ? true : (
					Auth::user()->persona->id == $personaID ? true : false
				)
			);
		});
	}
}
