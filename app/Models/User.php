<?php

namespace App\Models;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @version November 22, 2016, 9:36 am UTC
 */
class User extends Authenticatable
{

    use SoftDeletes, EntrustUserTrait{

        SoftDeletes::restore insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;

    }


    // use EntrustUserTrait; // add this trait to your user model
    //use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token','status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    'name'=>"required|unique:users|min:5",
    'password'=>'sometimes|required|max:50|min:6|confirmed',
    'password_confirmation'=>"sometimes|required|min:6",
    'email'=>'required|email|unique:users',


        
    ];


/*    public static $messages=[
            'name.required' => '用户名不能为空',
             'name.unique'=>"用户名已存在",
            'password.required' => '密码不能为空',
               'email.min' => '密码最少6位',
            'email.required'=>"邮箱地址必须填写",


           
    ];*/
      public function getStatusAttribute($value){
switch ($value) {
           case '1':
               return true;
               break;
           

            case '0':
               return false;
               break;
           

            case '3':
               return "未通过";
               break;
           
           default:
               return "审核中";
               break;
       }

  }
    
}
