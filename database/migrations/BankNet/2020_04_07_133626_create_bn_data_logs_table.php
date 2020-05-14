<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnDataLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnDataLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bn_signal_id')->nullable();
            $table->string('objectName', 100 )->nullable();
            $table->string('objectID', 100 )->nullable();
            $table->text('object_json')->nullable();
            $table->integer('status_n')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('bnDataLogs');
    }
}
