<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultToAdminAuthTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_auth_tables', function (Blueprint $table) {
        
            $table->integer('pid')->default(9)->change();
              $table->integer('sort')->default(9)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_auth_tables', function (Blueprint $table) {
                $table->integer('pid')->default(9)->change();
              $table->integer('sort')->default(9)->change();
        });
    }
}
