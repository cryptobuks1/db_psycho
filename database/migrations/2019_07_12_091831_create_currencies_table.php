<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_Currencies', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('currency_id')->nullable();
            $table->string('currency_name', 100)->nullable();
            $table->string('currency_code', 20)->nullable();
            $table->integer('currency_code_n')->nullable();
            $table->string('currency_symbol', 20)->nullable();
            $table->string('currency_remark', 200)->nullable();
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
        Schema::dropIfExists('_Currencies');
    }
}
