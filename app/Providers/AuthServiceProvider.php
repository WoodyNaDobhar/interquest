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
		$gate->define('admin', function ($user) {
			return (bool) $user->is_admin;
		});
		$gate->define('mapkeeper', function ($user) {
			return (bool) $user->is_admin ? true : (
				$user->is_mapkeeper ? true : false
			);
		});
		$gate->define('mapkeeperOwn', function ($user, $personaID) {
			return (bool) $user->is_admin ? true : (
				$user->is_mapkeeper && 
					$user->persona->id == $personaID ? true : false
			);
		});
		$gate->define('own', function ($user, $personaID) {
			return (bool) $user->is_admin ? true : (
				$user->is_mapkeeper ? true : (
					$user->persona->id == $personaID ? true : false
				)
			);
		});
	}
}
