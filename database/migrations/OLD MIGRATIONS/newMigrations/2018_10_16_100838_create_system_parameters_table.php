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
            $table->string('sys_par_code', 191)->nullable();
            $table->string('sys_par_value', 191)->nullable();
            $table->string('sys_par_name', 191)->nullable();
            $table->string('sys_par_rem', 191)->nullable();
            $table->string('data_type_code', 191)->nullable();
            $table->integer('data_type_id')->nullable();
            $table->boolean('sys_par_use_allow_values_l')->nullable();
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
        Schema::dropIfExists('SystemParameters');
    }
}
