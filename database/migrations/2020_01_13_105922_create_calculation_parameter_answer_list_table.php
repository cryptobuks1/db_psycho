<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculationParameterAnswerListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CalculationParameterAnswerList', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('extension_one_additional_detail_id')->nullable();
            $table->string('calculation_parameter_value', 255)->nullable();
            $table->integer('table_n')->nullable();
            $table->integer('row_id')->nullable();
            $table->boolean('active_l')->nullable();
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
        Schema::dropIfExists('CalculationParameterAnswerList');
    }
}
