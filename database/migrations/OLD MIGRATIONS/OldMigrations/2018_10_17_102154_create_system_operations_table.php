<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SystemOperations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_oper_code');
            $table->string('sys_oper_name')->nullable();
            $table->string('sys_oper_rem')->nullable();
            $table->integer('caption_code')->nullable();
            $table->integer('caption_id')->nullable();
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
        Schema::dropIfExists('system_operations');
    }
}
