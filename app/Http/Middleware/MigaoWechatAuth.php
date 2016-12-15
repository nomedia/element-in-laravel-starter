<?php

namespace App\Http\Middleware;

use App\Models\Migao\OfferUser;
use Closure;
use Illuminate\Support\Facades\Session;

class MigaoWechatAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


      $user=Session::get("MIGAO_WECHAT_USER");


      if(!$user){



         $mu=new OfferUser;
         $mu->openid=$request->openid;
         $mu->nickname=$request->nickname;
         $mu->head=$request->headimgurl;

         //判断数据库里面有没有存在 
         $count=OfferUser::where('openid',$request->openid)->first();

         if($count){

               OfferUser::where('openid',$request->openid)->update(['nickname'=>$request->nickname,'head'=>$request->headimgurl]);
            $mu=$count;
         }else{
            $mu->save();
         }

         

         Session::put('MIGAO_WECHAT_USER',$mu);
     $user=Session::get("MIGAO_WECHAT_USER");
           


      }else{

        if($user->nickname==""){
            //如果昵称是空的话 就去更新他的信息
            
            OfferUser::where('openid',$request->openid)->update(['nickname'=>$request->nickname,'head'=>$request->headimgurl]);
        }



      }


     

        return $next($request);
    }
}
