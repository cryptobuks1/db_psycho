<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemParametersValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SystemParametersValues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_par_code', 191);
            $table->integer('sys_par_id');
            $table->string('sys_par_allow_val_option', 191)->nullable();
            $table->string('sys_par_allow_val_rem', 191)->nullable();
            $table->string('sys_par_type')->nullable();
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
        Schema::dropIfExists('SystemParametersValues');
    }
}
