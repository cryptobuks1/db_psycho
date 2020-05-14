<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_CryptoTokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->length(4)->nullable();
            $table->integer('currency_id')->length(4)->nullable();
            $table->string('c_token_name', 100)->unique();
            $table->string('c_token_code', 20)->unique();
            $table->string('c_token_symbol', 20);
            $table->string('c_token_remark', 200)->nullable();
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
        Schema::dropIfExists('_CryptoTokens');
    }
}
