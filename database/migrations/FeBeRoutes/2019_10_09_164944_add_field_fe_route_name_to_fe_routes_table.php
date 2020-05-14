<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFeRouteNameToFeRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('FeRoutes', function($table) {
//            $table->string('fe_route_name', 100)->after('fe_route_code')->nullable();
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
//            $table->dropColumn('fe_route_name', 100);
//        });
    }
}
