<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActualLToFeUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('FeUrls', function($table) {
//            $table->boolean('actual_l')->after('be_route_name')->nullable();
            $table->boolean('actual_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('FeUrls', function($table) {
            $table->dropColumn('actual_l');
        });
    }
}
