<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculationTemplateParameterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CalculationTemplateParameterSettings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calculation_template_id')->nullable();
            $table->integer('extension_one_additional_detail_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->integer('number_more')->nullable();
            $table->integer('number_less')->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('CalculationTemplateParameterSettings');
    }
}
