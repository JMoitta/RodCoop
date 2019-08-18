<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasterListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caster_list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('list_caster_id')->unsigned();
            $table->foreign('list_caster_id')->references('id')->on('list_casters');
            $table->bigInteger('praying_house_id')->unsigned();
            $table->foreign('praying_house_id')->references('id')->on('praying_houses');
            $table->bigInteger('cooperator_id')->unsigned();
            $table->foreign('cooperator_id')->references('id')->on('cooperators');
            $table->timestamp('date_caster');
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
        Schema::dropIfExists('caster_list_items');
    }
}
