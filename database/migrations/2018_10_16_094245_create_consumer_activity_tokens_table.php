<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerActivityTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ConsumerActivityTokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_id')->nullable();
            $table->string('token', 191)->nullable();
            $table->string('email_issue', 191)->nullable();
            $table->string('email_new')->nullable();
            $table->integer('status_n')->nullable();
            $table->integer('action_id')->nullable();
            $table->integer('type_verify')->nullable();
            $table->timestamps();

            $table->index('token');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ConsumerActivityTokens');
    }
}
