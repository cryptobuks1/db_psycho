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
            $table->integer('consumer_id');
            $table->string('token', 191);
            $table->string('email_issue', 191);
            $table->string('email_new')->nullable();
            $table->integer('status_n');
            $table->integer('action_id');
            $table->integer('type_verify')->nullable();
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
        Schema::dropIfExists('ConsumerActivityTokens');
    }
}
