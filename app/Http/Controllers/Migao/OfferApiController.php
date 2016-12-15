<?php

namespace App\Http\Controllers\Migao;

use App\Http\Controllers\Controller;
use App\Models\Migao\OfferCollege;
use App\Models\Migao\OfferOffer;
use App\Models\Migao\OfferUp;
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

$college=OfferOffer::groupby('college_id')->distinct()->get(['college_id']);

       $lists= OfferCollege::with('offerCount')->whereIn('id',$college)->get();



       return $lists;
    }


        public function getHighRanking()
    {
        $lists=OfferOffer::groupby('high')->distinct()->get(['high']);


    foreach ($lists as $key => $list) {

     
       $lists[$key]['count']=OfferOffer::where('high',$list->high)->count();



    }
    return $lists;

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
    $lists=OfferOffer::with('college')->where('high',$high)->where('college_id',$college_id)->get();

        return $lists;
    }

//根据高中获取录取大学列表
          public function getCollegeByHigh($high_id)
    {


 $list=OfferOffer::where('high',$high_id)->groupby('college_id')->distinct()->get(['college_id']);

$lists=OfferCollege::whereIn('id',$list)->get();


  foreach ($lists as $key => $list) {

     
       $lists[$key]['count']=OfferOffer::where('high',$high_id)->where('college_id',$list->id)->count();



    }

return $lists;


    }



//根据高中获取录取大学列表
          public function getOfferByHighCollege($high_id,$college_id)
    {
        //
    }


         public function uploadInfo(Request $request)
    {    




        $d=new OfferOffer;
        
   $d->user_id=1;

        $d->name=$request->data['name'];
        $d->college_id=$request->data['college_id'];
        $d->high=$request->data['high'];
        $d->consultant=$request->data['consultant'];
        $d->instructor=$request->data['instructor'];
        $d->identity=$request->data['identity'];
        $d->result=$request->data['result'];

     //   dump($request->data['name']);

        $rs=$d->save();

if($rs){
    $data['rs']=1;
    $data['data']=$d;
    return $data;

}else{

        $data['rs']=0;
    $data['data']=$d;
    return $data;

}
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
          public function myOffer()
    {

        $user=Session::get('MIGAO_WECHAT_USER');
        $user_id=$user->id;

        $lists=OfferOffer::where('user_id',$user_id)->get();

        return $lists;

        
    }



  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request)
    {
        return 2;
    }


      public function getShare(Request $request)
    {  $id=$request->id;

        $list=OfferOffer::with('up.user')->where('id',$id)->first();

        $count=OfferUp::where('offer_id',$id)->count();
$list['count']=$count;

        return $list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public functio

    $user=Session::get('MIGAO_WECHAT_USER');n up(Request $request)
    {  $user_id=$user->id;



            $id=$request->id;
        
        $has=OfferUp::where('user_id',$user_id)->where('offer_id',$id)->first();

        if($has){

            return 2;

        }else{
            $up=new OfferUp;
            $up->user_id=$user_id;
            $up->offer_id=$id;

            $up->save();

        }

    
        return $id;
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
