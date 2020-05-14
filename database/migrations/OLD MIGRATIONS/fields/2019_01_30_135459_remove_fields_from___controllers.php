<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFieldsFromControllers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__Controllers', function($table) {
            $table->dropColumn('controller_table_code');
            $table->dropColumn('controller_table_code_dep');
            $table->dropColumn('controller_type_code');
            $table->dropColumn('controller_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
