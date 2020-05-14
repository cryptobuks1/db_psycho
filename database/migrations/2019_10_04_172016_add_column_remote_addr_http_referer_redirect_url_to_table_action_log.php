<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRemoteAddrHttpRefererRedirectUrlToTableActionLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__ActionLogs', function(Blueprint $table) {
            $table->string('remote_addr', 50)->nullable();
            $table->string('http_referer', 150)->nullable();
            $table->string('redirect_url', 150)->nullable();
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
            $table->dropColumn('remote_addr');
            $table->dropColumn('http_referer');
            $table->dropColumn('redirect_url');
        });
    }
}
