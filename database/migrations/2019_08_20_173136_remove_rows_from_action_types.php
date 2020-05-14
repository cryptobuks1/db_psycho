<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveRowsFromActionTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__ActionTypes', function (Blueprint $table) {
            $table->dropColumn('use_for_entity_l');
            $table->dropColumn('use_for_list_l');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('__ActionTypes', function (Blueprint $table) {
            $table->boolean('use_for_entity_l')->nullable();
            $table->boolean('use_for_list_l')->nullable();
        });
    }
}
