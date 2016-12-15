<?php

namespace App\Models\Migao;

use Illuminate\Database\Eloquent\Model;

class OfferOffer extends Model
{
    


        public function up()
    {
      
       return $this->hasMany('App\Models\Migao\OfferUp', 'offer_id', 'id');
    }
   public function college()
    {
      
       return $this->hasOne('App\Models\Migao\OfferCollege', 'id', 'college_id');
    }

}
