<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->nullable();
            $table->integer('organizatoin_id')->nullable();
            $table->integer('file_type_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status_id')->nullable();
            $table->dateTime('created_date')->nullable();
//            $table->string('suser_name', 100)->nullable();
            $table->date('modify_date')->nullable();
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
        Schema::dropIfExists('consumer_reports');
    }
}
