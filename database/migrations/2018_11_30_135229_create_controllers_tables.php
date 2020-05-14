<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControllersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__Controllers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('controller_code',100)->nullable();
            $table->string('controller_name',100)->nullable();
            $table->integer('controller_table_n')->nullable();
            $table->integer('controller_table_n_dep')->nullable();
            $table->integer('controller_type_id')->nullable();
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
        Schema::dropIfExists('__Controllers');
    }


}
