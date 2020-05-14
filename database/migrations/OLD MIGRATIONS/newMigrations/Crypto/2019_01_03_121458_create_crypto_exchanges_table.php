<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_CryptoExchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->length(2)->nullable();
            $table->integer('images_id')->length(4)->nullable();
            $table->string('c_exchange_name', 100);
            $table->string('c_exchange_code', 60)->unique();
            $table->string('c_exchange_remark', 200)->nullable();
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
        Schema::dropIfExists('_CryptoExchanges');
    }
}
