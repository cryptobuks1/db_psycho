<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldActualLToFeRouteStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('FeRoutesSteps', function($table) {
            $table->boolean('actual_l')->after('create_fe_route_step_object_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('FeRoutesSteps', function($table) {
            $table->dropColumn('actual_l');
        });
    }
}
