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

Route::post('login', 'UsuarioController@login');
Route::get('movie_list', 'MovieController@movieList');
Route::post('insert_movie', 'MovieController@insertMovie');
Route::delete('delete_movie', 'MovieController@deleteMovie');