<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFeRouteCodeToFeRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('FeRoutes', function($table) {
//            $table->string('fe_route_code', 100)->after('caption_code')->nullable();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('FeRoutes', function($table) {
//            $table->dropColumn('fe_route_code', 100);
//        });
    }
}
