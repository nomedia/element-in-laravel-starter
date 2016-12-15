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

Route::group(['middleware' => ['api','migao_wechat_auth']], function() {

	 header('Access-Control-Allow-Origin: *');

//米高offer
Route::get('offer/getCollegeRanking',"Migao\OfferApiController@getCollegeRanking");

Route::get('offer/getHighRanking',"Migao\OfferApiController@getHighRanking");

Route::get('offer/getHighByCollege/{id}',"Migao\OfferApiController@getHighByCollege");

//getCollegeByHigh
Route::get('offer/getCollegeByHigh/{id}',"Migao\OfferApiController@getCollegeByHigh");


Route::get('offer/getOfferByCollegeHigh/{college_id}/{high}',"Migao\OfferApiController@getOfferByCollegeHigh");

Route::get('offer/uploadInfo',"Migao\OfferApiController@uploadInfo");

Route::get('offer/myOffer',"Migao\OfferApiController@myOffer");

Route::get('offer/share',"Migao\OfferApiController@share");


Route::get('offer/index',"Migao\OfferApiController@home");

Route::get('offer/getShare',"Migao\OfferApiController@getShare");

Route::get('offer/up',"Migao\OfferApiController@up");

});