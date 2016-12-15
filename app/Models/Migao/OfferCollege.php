<?php

namespace App\Models\Migao;

use Illuminate\Database\Eloquent\Model;

class OfferCollege extends Model
{
    //
    


    public function  offer(){
    	return $this->hasMany('App\Models\Migao\OfferOffer', 'college_id', 'id');
    }

    public function offer_count(){
    	return $this->offer();
    }


    // Category model
public function offerCount()
{
  return $this->offer() // or App\Product or any namespace you use
    ->selectRaw('college_id, count(*) as count')
    ->groupBy('college_id');
}
  

}
