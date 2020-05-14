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
            $table->integer('consumer_id')->length(4)->nullable();
            $table->string('db_area_code',30)->nullable();
            $table->string('db_area_name',100)->nullable();
            $table->string('db_area_token',200)->nullable();
            $table->integer('db_partition_1')->length(2)->nullable();
            $table->integer('db_partition_2')->length(2)->nullable();
            $table->boolean('actual_l')->length(2)->nullable();
            $table->boolean('deleted_l')->length(2)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

            $table->timestamps();
//            $table->string('db_area_pass',30)->nullable();
//            $table->dateTime('modify_date')->nullable();
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



