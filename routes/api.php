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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



 
Route::group(['middleware' => 'api'], function() {



	    //   header('Access-Control-Allow-Methods : POST, GET, OPTIONS, PUT, DELETE');



Route::resource('users',"Admin\Auth\UserController");
Route::resource('menus',"Admin\Auth\MenuController");


Route::resource('fields',"Admin\Auth\FieldController");
Route::resource('tables',"Admin\Auth\TableController");



});
