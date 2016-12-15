<?php

namespace App\Models\Migao;

use Illuminate\Database\Eloquent\Model;

class OfferUp extends Model
{
       public function user()
    {
      
       return $this->hasOne('App\Models\Migao\OfferUser', 'id', 'user_id');
    }
}
