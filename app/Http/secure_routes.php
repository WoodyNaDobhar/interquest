<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all login-only routes are defined.
|
*/
Route::resource('actions', 'ActionController');
Route::resource('buildings', 'BuildingController');
Route::resource('comments', 'CommentController');
Route::resource('equipment', 'EquipmentController');
Route::resource('equipments', 'EquipmentController');
Route::get('fiefdoms/create/{rulerId?}/{rulerType}', 'FiefdomController@create');
Route::post('fiefdoms', 'FiefdomController@store');
Route::post('fiefdoms/{id}', 'FiefdomController@update');
Route::resource('fiefdoms', 'FiefdomController');
Route::get('fiefs/create/{territoryId?}', 'FiefController@create');
Route::resource('fiefs', 'FiefController');
Route::resource('metatypes', 'MetatypeController');
Route::post('npcs', 'NpcController@store');
Route::post('npcs/{id}', 'NpcController@update');
Route::resource('npcs', 'NpcController');
Route::resource('parks', 'ParkController');
Route::resource('personae', 'PersonaController');
Route::resource('personas', 'PersonaController');
Route::resource('revisions', 'RevisionController');
Route::resource('terrains', 'TerrainController');
Route::get('territories/create/{column}/{row}', 'TerritoryController@create');
Route::resource('territories', 'TerritoryController');
Route::resource('territorys', 'TerritoryController');
Route::resource('titles', 'TitleController');
// 	Route::get('/users/create/{personaId}', 'UserController@create');
Route::resource('users', 'UserController');
Route::resource('vocations', 'VocationController');