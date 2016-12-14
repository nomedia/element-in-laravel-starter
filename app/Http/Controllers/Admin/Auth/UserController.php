<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

    	 	$per_page=$request->per_page;
    	$search=$request->search;

        
        $where=" 1=1 ";
    	if($search){
    	
    	   foreach ($search as $key => $s) {

    	   	if($key=="name"){
    	   		$where=$where." and name like '%".$s."%'";
    	   	}
    	   	if($key=="email"){
    	   		$where=$where." and email like '%".$s."%'";
    	   	}
    	
    	   	# code...
    	   }
    	}

    return User::latest()->whereRaw($where)->orderBy('created_at', 'desc')->paginate($per_page);
    }
}
