<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainLToConsumerAccessRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_ConsumerAccessRoles', function($table) {
            $table->boolean('main_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_ConsumerAccessRoles', function($table) {
            $table->dropColumn('main_l')->nullable();
        });
    }
}
