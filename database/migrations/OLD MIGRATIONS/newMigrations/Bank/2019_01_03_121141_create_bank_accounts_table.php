<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BankAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->length(4)->nullable();
            $table->integer('bank_account_type_id')->length(4)->nullable();//todo ????
            $table->integer('table_n')->length(4);
            $table->integer('currency_id')->length(4)->nullable();//todo ???????
            $table->string('bank_account_n', 40);
            $table->string('bank_account_name', 60);
            $table->integer('row_id')->length(4);
            $table->string('bank_account_code', 256)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->string('bank_account_remark', 200)->nullable();
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
        Schema::dropIfExists('BankAccounts');
    }
}
