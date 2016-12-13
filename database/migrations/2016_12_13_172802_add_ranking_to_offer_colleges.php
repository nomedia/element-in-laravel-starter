<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRankingToOfferColleges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_colleges', function (Blueprint $table) {
            $table->integer('ranking');
             $table->integer('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_colleges', function (Blueprint $table) {
               $table->integer('ranking');
             $table->integer('type');
        });
    }
}
