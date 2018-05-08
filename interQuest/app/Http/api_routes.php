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

Route::resource('buildings', 'BuildingAPIController');

Route::resource('comments', 'CommentAPIController');

Route::resource('equipment', 'EquipmentAPIController');

Route::resource('fiefdoms', 'FiefdomAPIController');

Route::resource('fiefs', 'FiefAPIController');

Route::resource('npcs', 'NpcAPIController');

Route::resource('parks', 'ParkAPIController');

Route::resource('personae', 'PersonaAPIController');

Route::resource('races', 'RaceAPIController');

Route::resource('terrains', 'TerrainAPIController');

Route::resource('territories', 'TerritoryAPIController');

Route::resource('titles', 'TitleAPIController');

Route::resource('vocations', 'VocationAPIController');