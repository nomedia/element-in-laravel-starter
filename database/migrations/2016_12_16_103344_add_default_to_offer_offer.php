<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultToOfferOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_offers', function (Blueprint $table) {
            
            $table->string('consultant')->default("")->change();
              $table->string('instructor')->default("")->change();

               $table->string('name')->default("")->change();
             // $table->string('instructor')->default("")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_offers', function (Blueprint $table) {
          
            $table->string('consultant')->default("")->change();
              $table->string('instructor')->default("")->change();

               $table->string('name')->default("")->change();
        });
    }
}
