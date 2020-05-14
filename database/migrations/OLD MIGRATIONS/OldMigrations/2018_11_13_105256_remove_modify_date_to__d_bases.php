<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveModifyDateToDBases extends Migration
{
    /**
     * Albert Topalu 13.11.18
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::table('_DBases', function($table) {
//            $table->dropColumn('modify_date');
//        });
//    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
