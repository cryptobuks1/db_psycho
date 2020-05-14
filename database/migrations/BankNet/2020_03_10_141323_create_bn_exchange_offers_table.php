<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnExchangeOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnExchangeOffers', function (Blueprint $table) {
//            $table->increments('id');
//            $table->increments('test');
            $table->integer('id');
            $table->integer('bn_exchanger_id')->nullable();
            $table->integer('bn_currency_id_input')->nullable();
            $table->integer('payment_method_id_input')->nullable();
            $table->integer('bn_currency_id_output')->nullable();
            $table->integer('payment_method_id_output')->nullable();
            $table->float('irrevocable_exchange_treshold_n',15 , 2)->nullable();
            $table->float('min_exchange_treshold_n', 15, 2 )->nullable();
            $table->float('max_exchange_treshold_n', 15, 2 )->nullable();
            $table->float('transaction_security_percent_n', 15, 2 )->nullable();
            $table->float('calculated_rate_n', 10, 9 )->nullable();
            $table->string('status_code', 20)->nullable();
            $table->float('reserve_n', 15, 2)->nullable();
            $table->float('payment_waiting_period_1', 15, 2 )->nullable();
            $table->float('payment_waiting_period_2', 15, 2 )->nullable();
            $table->float('payment_waiting_period_3', 15, 2 )->nullable();
            $table->float('payment_waiting_period_4', 15, 2 )->nullable();
            $table->text('telegram_link')->nullable();
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
        Schema::dropIfExists('bnExchangeOffers');
    }
}
