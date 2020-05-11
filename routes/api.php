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

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user/{user}', 'Api\UserController@userById')->where('user', '[0-9]+');
    Route::patch('/user/{user}', 'Api\UserController@updateUser')->where('user', '[0-9]+');
    Route::delete('/user/{user}', 'Api\UserController@deleteUser')->where('user', '[0-9]+');
    Route::post('/user/logout', 'Api\Auth\LoginController@logout');
});

Route::post('/user', 'Api\Auth\LoginController@register');
Route::post('/user/login', 'Api\Auth\LoginController@login');
