<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingCalculations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_status_id')->nullable();
            $table->integer('bl_leasing_contract_specification_id')->nullable();
            $table->integer('bl_leasing_object_group_id')->nullable();
            $table->integer('table_n_base')->nullable();
            $table->integer('row_id_base')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->string('bl_leasing_calculation_number', 11)->nullable();
            $table->date('bl_leasing_calculation_date')->nullable();
            $table->string('bl_leasing_calculation_kind', 100)->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->integer('db_area_id')->nullable();
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
        Schema::dropIfExists('blLeasingCalculations');
    }
}
