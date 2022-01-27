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
  Route::get('/task', 'TaskController@getData');
  Route::post('/task/addTextBox', 'TaskController@addTextBox');
  Route::post('/task/addNewTitle', 'TaskController@addNewTitle');
  Route::post('/task/addNewTask', 'TaskController@addNewTask');
  Route::post('/task/delete', 'TaskController@deleteTask');
});
