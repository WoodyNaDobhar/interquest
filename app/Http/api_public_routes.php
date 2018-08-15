<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/
Route::get('actions', 'ActionAPIController@index');
Route::get('actions/{id}', 'ActionAPIController@show');
Route::get('buildings', 'BuildingAPIController@index');
Route::get('buildings/{id}', 'BuildingAPIController@show');
Route::get('equipment', 'EquipmentAPIController@index');
Route::get('equipment/{id}', 'EquipmentAPIController@show');
Route::get('equipments', 'EquipmentAPIController@index');
Route::get('equipments/{id}', 'EquipmentAPIController@show');
Route::get('parks', 'ParkAPIController@index');
Route::get('parks/{id}', 'ParkAPIController@show');
Route::get('personae', 'PersonaAPIController@index');
Route::get('personae/{id}', 'PersonaAPIController@show');
Route::get('personas', 'PersonaAPIController@index');
Route::get('personas/{id}', 'PersonaAPIController@show');
Route::get('metatypes', 'MetatypeAPIController@index');
Route::get('metatypes/{id}', 'MetatypeAPIController@show');
Route::get('terrains', 'TerrainAPIController@index');
Route::get('terrains/{id}', 'TerrainAPIController@show');
Route::get('/territories/map/{id}', 'TerritoryAPIController@map');
Route::get('titles', 'TitleAPIController@index');
Route::get('titles/{id}', 'TitleAPIController@show');
Route::get('vocations', 'VocationAPIController@index');
Route::get('vocations/{id}', 'VocationAPIController@show');
