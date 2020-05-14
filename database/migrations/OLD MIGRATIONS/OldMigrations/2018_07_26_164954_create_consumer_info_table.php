<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contractor_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('info_kind_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('info_type_id')->nullable();
            $table->integer('representation')->nullable();
            $table->string('city_name')->nullable();
            $table->string('e_mail')->nullable();
            $table->string('url_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_without_codes')->nullable();
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
        Schema::dropIfExists('consumer_info');
    }
}
