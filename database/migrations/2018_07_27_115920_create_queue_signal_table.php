<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueSignalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_signals', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('model', 20)->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('change_request_id')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('queue_signals');
    }
}
