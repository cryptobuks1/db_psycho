<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FeRoutes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_component_id')->nullable();
            $table->integer('be_route_id')->nullable();
            $table->string('caption_code',100)->nullable();
            $table->integer('parent_id')->nullable();
            $table->boolean('has_children')->nullable();
            $table->boolean('use_steps_l')->nullable();
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
        Schema::dropIfExists('FeRoutes');
    }
}
