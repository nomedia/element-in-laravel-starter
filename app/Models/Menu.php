<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    

    public $fillable = [
        'url',
        'display_name',
        'pid',
        'icon',
        'status'
    ];

    	    public static $rules = [
       'name'=>"required|unique:roles|min:1",
 
   


        
    ];

}
