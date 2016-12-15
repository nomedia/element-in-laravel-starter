<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => ['web']], function () {
    Route::get('/s', function () {
        return view('welcome');
    });
    Route::get('/setSession', function (Request $request) {
        return $request->session()->put('key', 'value');
    });
    Route::get('/getSession', function (Request $request) {
        return $request->session()->get('key', 'value');
    });
});



Route::group(['middleware' => ['web','migao_wechat_auth'],'prefix'=>"api"], function() {

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