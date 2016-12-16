<?php
use App\Models\Migao\OfferCollege;
use App\Models\Migao\OfferOffer;
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

Route::get('/test', function () {

  return view('migao.offer.test');
  });

Route::get('/import', function () {

  



  //$filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
  $filePath = 'public/500.xlsx';

  Excel::load($filePath, function($reader) {
    $data = $reader->all();



    foreach ($data as $key => $v) {

     foreach ($v as $key => $value) {

       
        $num=$value[3];

     $school=$value[1];
     $high=$value[2];


     $count=OfferCollege::where('name',$school)->first();

dump($value);
if($count){
        
        for ($i=0; $i < $num; $i++) { 

            $o=new OfferOffer;
            
            $o->identity=4;
            $o->result=1;
            $o->user_id=8;
$o->name="某同学";



            $o->college_id=$count->id;

            $o->high=$high;
            $o->save();
         //   $o->

        }
}
       

      
     }

die;
}
});
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


Route::group(['middleware' => ['web','migao_wechat_auth']], function() {

Route::get('/offer', function() {
  

       return view('migao.offer.index');
});


Route::get('/offer/collegeList', function(Request $request) {
  

  $id=$request->id;
  $school=$request->school;
return view('migao.offer.collegeList',compact('id','school'));
});

Route::get('/offer/collegeDetail', function(Request $request) {
  
return view('migao.offer.collegeDetail',compact('request'));
});


Route::get('/offer/highList', function(Request $request) {
  
return view('migao.offer.highList',compact('request'));
});


Route::get('/offer/highDetail', function(Request $request) {
  
return view('migao.offer.highDetail',compact('request'));
});


Route::get('/offer/myOffer', function(Request $request) {
  
return view('migao.offer.myOffer',compact('request'));
});
Route::get('/offer/form', function(Request $request) {

	$lists=OfferCollege::get();
  
return view('migao.offer.form',compact('request','lists'));
});


Route::get('/offer/share', function(Request $request) {
  
return view('migao.offer.myShare',compact('request'));
});




Route::get('/offer', function() {
  

       return view('migao.offer.index');
});





Route::get('api/share',"Migao\OfferApiController@sharet");




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

Route::get('offer/getShare',"Migao\OfferApiController@getShare");

Route::get('offer/up',"Migao\OfferApiController@up");

});