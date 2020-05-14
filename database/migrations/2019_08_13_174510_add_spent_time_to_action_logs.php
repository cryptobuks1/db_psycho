<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpentTimeToActionLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__ActionLogs', function(Blueprint $table) {
            $table->decimal('spent_time', 15, 3)->nullable();
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
            $table->dropColumn('spent_time');
        });
    }
}
