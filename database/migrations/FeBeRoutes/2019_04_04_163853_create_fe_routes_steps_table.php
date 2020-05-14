<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeRoutesStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FeRoutesSteps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_route_id');
            $table->integer('fe_component_id')->nullable();
            $table->integer('be_route_id')->nullable();
            $table->integer("line_n")->nullable();
            $table->string("fe_route_step_code",20)->nullable();
            $table->string("fe_route_step_name",50)->nullable();
            $table->string("fe_route_step_title",50)->nullable();
            $table->boolean("create_fe_route_step_object_l")->nullable();
            $table->boolean("deleted_l")->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
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
        Schema::dropIfExists('FeRoutesSteps');
    }
}
