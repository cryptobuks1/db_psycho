<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * created Albert Topalu 03.04.19
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingContracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physical_person_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->integer('contractor_contract_id')->nullable();
            $table->integer('bl_sale_point_id')->nullable();
            $table->string('uid_1c_code',36)->nullable();
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
        Schema::dropIfExists('blLeasingContracts');
    }
}
