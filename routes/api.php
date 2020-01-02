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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('user/update', 'AuthController@userupdate');
        Route::post('logout', 'AuthController@logout');
});
    
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    });

Route::get('hihi/user', 'AuthController@hihi');












/* start cars */
Route::post('/cars/{car}', 'CarController@update');
Route::apiResource('/cars', 'CarController');

Route::get('/cars_top', 'CarController@cars_paginate_top');

Route::get('/cars_bottom', 'CarController@cars_paginate_bottom');
/* end cars */

/* start Our Infomations */
Route::apiResource('/info', 'OurinformationController');
/* end Our Infomations */

Route::post('/users/{user}', 'UserController@update');
Route::apiResource('/users', 'UserController');



Route::apiResource('/messages', 'MessageController');

Route::apiResource('/information', 'OurinformationController');
