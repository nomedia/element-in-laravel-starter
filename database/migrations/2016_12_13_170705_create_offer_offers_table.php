<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('identity');
            $table->string('name');
            $table->string('high');
            $table->integer('college_id');
            $table->tinyInteger('result');
            $table->string('consultant');
            $table->string('instructor');
            $table->integer('user_id');
            

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_offers');
    }
}
