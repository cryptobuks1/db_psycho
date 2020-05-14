<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerSessionTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ConsumerSessionTokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string("token_old", 400)->unique()->nullable();
            $table->string("token_current", 400)->unique();
            $table->timestamp("last_activity_time");
            $table->timestamp("token_generation_time")->nullable();
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
        Schema::dropIfExists('ConsumerSessionTokens');
    }
}
