<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnsAccessAxesParameterToAccessAxesParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__AccessAxesParameters', function($table) {
            $table->dropColumn('country_id');
            $table->dropColumn('region_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('__AccessAxesParameters', function($table) {
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
        });
    }
}
