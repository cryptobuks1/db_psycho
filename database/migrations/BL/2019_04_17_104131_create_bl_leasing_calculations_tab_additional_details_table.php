<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingCalculationsTabAdditionalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingCalculationsTabAdditionalDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_leasing_calculation_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->integer('one_add_detail_id')->nullable();
            $table->string('one_add_detail_value', 255)->nullable();
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
        Schema::dropIfExists('blLeasingCalculationsTabAdditionalDetails');
    }
}
