<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainLColumnToControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("__Controllers", function(Blueprint $table)
        {
            $table->boolean("main_l")->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("__Controllers", function(Blueprint $table)
        {
            $table->dropColumn("main_l");
        });
    }
}
