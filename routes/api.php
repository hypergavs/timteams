<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::post('store_team', 'TeamController@store');
    Route::post('update_team', 'TeamController@update');
    Route::post('delete_team', 'TeamController@delete');


    Route::post('store_player', 'PlayerController@store');
    Route::post('update_player', 'PlayerController@update');
    Route::post('delete_player', 'PlayerController@delete');

    Route::post('store_coach', 'CoachController@store');
    Route::post('update_coach', 'CoachController@update');
    Route::post('delete_coach', 'CoachController@delete');

    Route::get('teams', 'TeamController@index');
    Route::get('coaches', 'CoachController@index');
    Route::get('players', 'PlayerController@index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
