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
Route::get('/terms', function(){
	return redirect('https://getterms.io/generate/?url=' . urlencode(env('APP_URL')) . '&name=InterQuest&location=US');
});
Route::get('/privacy', function(){
	return redirect('https://privacypolicies.com/privacy/view/0JEgJB');
});
Route::get('/storage/{folder?}/{filename}', function ($folder = null, $filename)
{
	$path = storage_path('app/public/' . ($folder?$folder.'/':'') . $filename);

	if (!File::exists($path)) {
		abort(404);
	}

	$file = File::get($path);
	$type = File::mimeType($path);

	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);

	return $response;
});

//all the core routes, buried behind auth to drive login behavior
Route::group(['middleware' => 'auth'], function()
{
	Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
		Route::group(['prefix' => 'v1'], function () {
			require config('infyom.laravel_generator.path.api_routes');
		});
	});
	Route::group(['prefix' => 'sparse'], function () {
		require app_path('Http/regular_routes.php');
	});
	require app_path('Http/regular_routes.php');
});

Route::get('/', 'HomeController@index');
