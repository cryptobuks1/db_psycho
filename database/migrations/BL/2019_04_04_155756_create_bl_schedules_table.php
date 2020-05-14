<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blSchedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->integer('bl_leasing_calculation_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('bl_schedule_type_id')->nullable();
            $table->string('bl_schedule_name', 100)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l', 20)->nullable();
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
        Schema::dropIfExists('blSchedules');
    }
}
