<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CryptoAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_account_name', 100);
            $table->integer('table_n')->length(4);
            $table->integer('row_id')->length(4);
            $table->integer('table_n_service')->length(4);
            $table->integer('row_id_service')->length(4);
            $table->string('c_account_login', 100);
            $table->string('c_account_pass', 100);
            $table->string('c_account_remark', 200);
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
        Schema::dropIfExists('CryptoAccounts');
    }
}
