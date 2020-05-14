<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccessAxisCodeToAccessAxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__AccessAxes', function (Blueprint $table) {
            $table->string('access_axis_code',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('__AccessAxes', function (Blueprint $table) {
            $table->dropColumn('access_axis_code');
        });
    }
}
