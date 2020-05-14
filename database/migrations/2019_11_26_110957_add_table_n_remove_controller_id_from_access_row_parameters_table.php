<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableNRemoveControllerIdFromAccessRowParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("__AccessRowParameters", function(Blueprint $table)
        {
            $table->dropColumn("controller_id");
            $table->integer("table_n")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("__AccessRowParameters", function(Blueprint $table)
        {
            $table->integer("controller_id")->nullable();
            $table->dropColumn("table_n");
        });
    }
}
