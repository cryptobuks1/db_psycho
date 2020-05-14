<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__ActionLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("controller_id")->nullable();
            $table->integer("row_id")->nullable();
            $table->integer("consumer_id")->nullable();
            $table->integer("action_type_id")->nullable();
            $table->boolean("action_log_error_l")->nullable();
            $table->string("action_log_error_code", 20)->nullable();
            $table->text("action_log_message")->nullable();
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
        Schema::dropIfExists('__ActionLogs');
    }
}
