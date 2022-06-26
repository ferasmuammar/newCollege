<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryupdateToUsertows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usertows', function (Blueprint $table) {
            $table->foreignId('country_id')->after('status');
            $table->foreign('country_id')->on('countries')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usertows', function (Blueprint $table) {
            //
        });
    }
}
