<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_Regions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->length(2)->nullable();
            $table->string('region_code',15)->nullable();
            $table->string('region_code_alpha',15)->nullable();
            $table->string('region_name',100)->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('_Regions');
    }
}
