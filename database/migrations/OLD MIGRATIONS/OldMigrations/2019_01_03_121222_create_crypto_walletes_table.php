<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoWalletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CryptoWallets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_wallet_code', 100)->unique();;
            $table->string('c_wallet_name', 100);
            $table->string('c_wallet_n', 100);
            $table->integer('c_account_id')->length(8);
            $table->string('uid_1c_code', 36)->nullable();
            $table->string('c_wallet_remark', 20)->nullable();
            $table->boolean('actual_l');
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
        Schema::dropIfExists('CryptoWallets');
    }
}
