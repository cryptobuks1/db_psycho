<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRowsToActionLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__ActionLogs', function(Blueprint $table) {
            $table->decimal('spent_time_site', 15, 3)->nullable();
            $table->decimal('spent_time_1c', 15, 3)->nullable();
            $table->decimal('spent_time_connection', 15, 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('__ActionLogs', function(Blueprint $table) {
            $table->dropColumn('spent_time_site');
            $table->dropColumn('spent_time_1c');
            $table->dropColumn('spent_time_connection');
        });
    }
}
