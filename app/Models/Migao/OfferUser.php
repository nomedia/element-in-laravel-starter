<?php

namespace App\Models\Migao;

use Illuminate\Database\Eloquent\Model;

class OfferUser extends Model
{
    

 /* return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
       return $this->hasMany('App\Comment', 'foreign_key', 'local_key');*/
        public function offer()
    {
      
       return $this->hasMany('App\Models\Migao\OfferOffer', 'user_id', 'id');
    }


 



}
