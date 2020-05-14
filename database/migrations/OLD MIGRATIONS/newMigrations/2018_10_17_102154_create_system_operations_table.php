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
            $table->string('sys_oper_code', 191);
            $table->string('sys_oper_name', 191)->nullable();
            $table->string('sys_oper_rem', 191)->nullable();
            $table->integer('caption_code')->nullable();
            $table->integer('caption_id')->nullable();
            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();

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
        Schema::dropIfExists('SystemOperations');
    }
}
