<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUseDbAreaLToDbTypeControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('_DbTypeControllers', function($table) {
//            $table->boolean('use_db_area_l')->nullable();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('_DbTypeControllers', function($table) {
//            $table->dropColumn('use_db_area_l');
//        });
    }
}
