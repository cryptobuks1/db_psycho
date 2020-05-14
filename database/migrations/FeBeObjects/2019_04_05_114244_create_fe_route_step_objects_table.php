<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeRouteStepObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FeRouteStepObjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_route_step_id')->nullable();
            $table->integer('fe_route_object_id')->nullable();
            $table->integer('row_id_fe_route_step_object')->nullable();
            $table->boolean('completed_l')->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FeRouteStepObjects');
    }
}
