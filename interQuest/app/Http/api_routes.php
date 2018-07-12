<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/
Route::resource('actions', 'ActionAPIController');

Route::resource('action_personas', 'ActionPersonaAPIController');

Route::resource('buildings', 'BuildingAPIController');

Route::resource('comments', 'CommentAPIController');

Route::resource('equipment', 'EquipmentAPIController');

Route::resource('fiefdoms', 'FiefdomAPIController');

Route::resource('fiefs', 'FiefAPIController');

Route::resource('npcs', 'NpcAPIController');

Route::resource('parks', 'ParkAPIController');

Route::resource('personae', 'PersonaAPIController');

Route::resource('metatypes', 'MetatypeAPIController');

Route::resource('revisions', 'RevisionAPIController');

Route::resource('terrains', 'TerrainAPIController');

Route::resource('territories', 'TerritoryAPIController');
Route::get('/territories/map/{id}', 'TerritoryAPIController@map');

Route::resource('titles', 'TitleAPIController');

Route::resource('users', 'UserAPIController');
Route::get('/users/makeMapkeeper/{id}', 'UserAPIController@makeMapkeeper');

Route::resource('vocations', 'VocationAPIController');

Route::post('/personae/invite', 'PersonaAPIController@invite');