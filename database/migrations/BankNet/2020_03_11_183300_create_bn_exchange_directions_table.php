<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnExchangeDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnExchangeDirections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bn_payment_method_id')->nullable();
            $table->integer('bn_payment_method_group_id')->nullable();
            $table->integer('bn_currency_id')->nullable();
            $table->string('exchange_direction_code', 100)->nullable();
            $table->string('exchange_direction_name', 100)->nullable();
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
        Schema::dropIfExists('bnExchangeDirections');
    }
}
