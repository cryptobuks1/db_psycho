<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsRequestMethodHttpUserAgentToTableActionLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__ActionLogs', function(Blueprint $table) {
            $table->string('request_method', 20)->nullable();
            $table->string('http_user_agent', 255)->nullable();
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
            $table->dropColumn('request_method');
            $table->dropColumn('http_user_agent');
         });
    }
}
