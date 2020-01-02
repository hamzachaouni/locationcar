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

Route::get('/admin/{any?}', function () {
    return view('admin');
})->where('any', '^(?!api\/)[\/\w\.-]*');

// Route to handle page reload in Vue except for api routes
Route::get('/{any?}', function (){
    return view('visitor');
})->where('any', '^(?!api\/)[\/\w\.-]*');










