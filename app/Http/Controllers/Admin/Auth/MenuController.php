<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $per_page=$request->per_page;
        $search=$request->search;

        
        $where=" 1=1 ";
        if($search){
        
           foreach ($search as $key => $s) {

            if($key=="display_name"){
                $where=$where." and display_name like '%".$s."%'";
            }
            if($key=="email"){
                $where=$where." and email like '%".$s."%'";
            }
        
            # code...
           }
        }


        return Menu::whereRaw($where)->orderBy('id')->get();

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
         $data=$request->all();
        return Menu::create($data);
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
        $data=$request->all();
        $rs=Menu::findOrFail($id)->update($data);

            if($rs){
            $json['msg']="编辑成功";
            $json['rs']=$rs;
        }else{
                $json['msg']="编辑失败";
            $json['rs']=$rs;
        }
        return $json;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rs=Menu::whereIn('id',$request->ids)->delete();
        if($rs){
            $json['msg']="删除成功";
            $json['rs']=$rs;
        }else{
            $json['msg']="删除失败";
            $json['rs']=$rs;
        }

        return $json;

    }
}
