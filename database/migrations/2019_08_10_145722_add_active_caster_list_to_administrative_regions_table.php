<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveCasterListToAdministrativeRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administrative_regions', function (Blueprint $table) {
            $table->bigInteger('active_caster_list_id')->unsigned()->nullable();
            $table->foreign('active_caster_list_id')->references('id')->on('list_casters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrative_regions', function (Blueprint $table) {
            $table->dropForeign('administrative_regions_active_caster_list_id_foreign');
            $table->dropColumn('active_caster_list_id');
        });
    }
}
