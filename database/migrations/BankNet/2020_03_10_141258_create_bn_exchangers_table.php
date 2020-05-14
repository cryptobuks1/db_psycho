<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnExchangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnExchangers', function (Blueprint $table) {
//            $table->increments('id');
//            $table->increments('test');
            $table->integer('id');
            $table->string('exchanger_name', 200)->nullable();
            $table->boolean('kyc_sent_l')->nullable();
            $table->boolean('anketa_sent_l')->nullable();
            $table->boolean('profile_accepted_l')->nullable();
            $table->boolean('confirmed_l')->nullable();
            $table->float('exchanger_rating_n', 15 ,2)->nullable();
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
        Schema::dropIfExists('bnExchangers');
    }
}
