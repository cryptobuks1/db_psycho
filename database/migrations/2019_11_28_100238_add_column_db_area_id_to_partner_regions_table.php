<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDbAreaIdToPartnerRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PartnerRegions', function(Blueprint $table)
        {
            $table->integer('db_area_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PartnerRegions', function(Blueprint $table)
        {
            $table->dropColumn('db_area_id');
        });
    }
}
