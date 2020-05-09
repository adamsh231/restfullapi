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

Route::get('/user', 'Api\UserController@user');
Route::get('/user/{user}', 'Api\UserController@userById');
Route::post('/user', 'Api\UserController@addUser');
Route::patch('/user/{user}', 'Api\UserController@updateUser');
Route::delete('/user/{user}', 'Api\UserController@deleteUser');
