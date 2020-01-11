<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('store_team', 'TeamController@store');
Route::post('update_team', 'TeamController@update');
Route::post('delete_team', 'TeamController@delete');


Route::post('store_player', 'PlayerController@store');
Route::post('update_player', 'PlayerController@update');
Route::post('delete_player', 'PlayerController@delete');

Route::post('store_coach', 'CoachController@store');
Route::post('update_coach', 'CoachController@update');
Route::post('delete_coach', 'CoachController@delete');


Route::get('/team', function(){
    return view('index');
});
Route::get('/players', function(){
    return view('index');
});

Route::get('teams', 'TeamController@index');
Route::get('coaches', 'CoachController@index');
Route::get('players', 'PlayerController@index');
