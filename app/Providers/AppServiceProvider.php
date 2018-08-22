<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use App\Models\Persona as Persona;
use App\Models\Npc as Npc;
use App\Models\Park as Park;
use App\Models\Fiefdom as Fiefdom;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
		Relation::morphMap([
			'Persona' => Persona::class,
			'Npc' => Npc::class,
			'Park' => Park::class,
			'Fiefdom' => Fiefdom::class,
		]);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//Facade to Object binding
		$this->app->bind('chanellog', 'App\Helpers\ChannelWriter');
	}
}
