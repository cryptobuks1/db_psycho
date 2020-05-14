<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddControllerFolderColumnToControllersTable extends Migration
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
            $table->string("controller_folder")->default("\Api")->nullable();
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
            $table->dropColumn("controller_folder");
        });
    }
}
