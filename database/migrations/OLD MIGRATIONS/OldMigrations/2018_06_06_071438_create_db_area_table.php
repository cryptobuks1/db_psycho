<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DbAreas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_id')->length(2)->nullable();
            $table->string('db_area_code',30)->nullable();
            $table->string('db_area_pass',30)->nullable();
            $table->string('db_area_token',400)->nullable();
            $table->integer('db_partition_1')->length(2)->nullable();
            $table->integer('db_partition_2')->length(2)->nullable();
//            $table->string('suser_name',100)->nullable();
            $table->dateTime('modify_date')->nullable();
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
        Schema::dropIfExists('_DbAreas');
    }
}



