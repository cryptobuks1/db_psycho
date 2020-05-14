<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnCurrencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string("currency_name", 100)->nullable();
            $table->string("currency_code", 20)->nullable();
            $table->integer("currency_code_n")->nullable();
            $table->integer("currency_type_n")->nullable();
            $table->string("currency_symbol", 20)->nullable();
            $table->string("currency_remark", 100)->nullable();
            $table->boolean("deleted_l")->nullable();
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
        Schema::dropIfExists('bnCurrencies');
    }
}
