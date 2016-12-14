<?php

namespace App\Http\Controllers\Migao;

use App\Http\Controllers\Controller;
use App\Models\Migao\OfferCollege;
use App\Models\Migao\OfferOffer;
use Illuminate\Http\Request;

class OfferApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCollegeRanking()
    {
       $lists= OfferCollege::with('offerCount')->get();



       return $lists;
    }


        public function getHighRanking()
    {
       
    }

    //根据学校ID获取该高中排名
    //

        public function getHighByCollege($college_id)
    {

    $lists=OfferOffer::where('college_id',$college_id)->groupby('high')->distinct()->get(['high']);
  
    foreach ($lists as $key => $list) {

     
       $lists[$key]['count']=OfferOffer::where('high',$list->high)->where('college_id',$college_id)->count();



    }


    return $lists;
        
    }

//根据高中
        public function getOfferByCollegeHigh($college_id,$high)
    {
    $lists=OfferOffer::where('high',$high)->where('college_id',$college_id)->get();

        return $lists;
    }

//根据高中获取录取大学列表
          public function getCollegeByHigh($high_id)
    {
        //
    }



//根据高中获取录取大学列表
          public function getOfferByHighCollege($high_id,$college_id)
    {
        //
    }


         public function uploadInfo(Request $request)
    {    



        $d=new OfferOffer;
        
   $d->user_id=0;

        $d->name=$request->data['name'];
        $d->college_id=$request->data['college_id'];
        $d->high=$request->data['high'];
        $d->consultant=$request->data['consultant'];
        $d->instructor=$request->data['instructor'];
        $d->identity=$request->data['identity'];
        $d->result=$request->data['result'];

     //   dump($request->data['name']);

        $d->save();

        return $d;

       // dump($request->all());
    }

          public function getCollege($key)
    {
        //
    }

//获取我所有的offer
//
//
          public function getMyUpOffer($key)
    {
        
    }



  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
