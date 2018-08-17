<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all public routes are defined.
|
*/
Route::get('/rules/{pageId?}', 'HomeController@rules');
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
Route::group(['prefix' => 'api', 'namespace' => 'API'], function(){
	Route::group(['prefix' => 'v1'], function () {
		require app_path('Http/api_public_routes.php');
	});
});
Route::resource('actions', 'ActionController');
Route::resource('buildings', 'BuildingController');
Route::resource('equipment', 'EquipmentController');
Route::resource('equipments', 'EquipmentController');
Route::resource('metatypes', 'MetatypeController');
Route::resource('parks', 'ParkController');
Route::resource('personae', 'PersonaController');
Route::resource('personas', 'PersonaController');
Route::resource('terrains', 'TerrainController');
Route::resource('titles', 'TitleController');
Route::resource('vocations', 'VocationController');