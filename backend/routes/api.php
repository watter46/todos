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

Route::group(['middleware' => 'api'], function() {
  Route::get('get', 'TodoController@get_data');
  Route::post('add', 'TodoController@add_data');
  Route::post('delete', 'TodoController@delete_data');
});

Route::get('/todo', 'TimerController@index');
