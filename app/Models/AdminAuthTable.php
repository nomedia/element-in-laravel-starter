<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminAuthTable extends Model
{
    
   public $fillable = [
        'name',
        'display_name',
        'pid',
        'icon',
        'status'
    ];

    	    public static $rules = [
             'name'=>"required|unique:admin_auth_tables|min:1",
            'display_name'=>"required|unique:admin_auth_tables|min:1",
 
   


        
    ];



    public function fields(){

    return $this->hasMany('App\Modles\AdminAuthField', 'table_id', 'id');

    }

      public function getStatusAttribute($value){
switch ($value) {
           case '1':
               return true;
               break;
           

            case '0':
               return false;
               break;
      
       }
   }
}
