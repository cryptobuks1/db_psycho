<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDbAreaIdToPartnerPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PartnerPoints', function(Blueprint $table)
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
        Schema::table('PartnerPoints', function(Blueprint $table)
        {
            $table->dropColumn('db_area_id');
        });
    }
}
