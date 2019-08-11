<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListCastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_casters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('administrative_region_id')->unsigned();
            $table->foreign('administrative_region_id')->references('id')->on('administrative_regions');
            $table->bigInteger('castor_user_id')->unsigned();
            $table->foreign('castor_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('list_casters');
    }
}
