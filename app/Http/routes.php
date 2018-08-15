<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Base routes
 */
Route::auth();

//social login stuff
Route::get('/signin', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//public stuff

//all the core routes, buried behind auth to drive login behavior
Route::group(['middleware' => 'auth'], function()
{
	Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
		Route::group(['prefix' => 'v1'], function () {
			require app_path('Http/api_secure_routes.php');
		});
	});
	Route::group(['prefix' => 'sparse'], function () {
		require app_path('Http/secure_routes.php');
	});
	require app_path('Http/secure_routes.php');
});

//all the public routes
require app_path('Http/public_routes.php');

Route::get('/', function(){
	if(!Auth::check()){
		return view('welcome');
	}else{
		Route::get('/', 'HomeController@index');
	}
});
