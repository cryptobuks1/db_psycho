<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SystemParameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_par_code')->nullable();
            $table->string('sys_par_value')->nullable();
            $table->string('sys_par_name')->nullable();
            $table->string('sys_par_rem')->nullable();
            $table->string('data_type_code')->nullable();
            $table->integer('data_type_id')->nullable();
            $table->boolean('sys_par_use_allow_values_l')->nullable();
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
        Schema::dropIfExists('system_parameters');
    }
}
