<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DBases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id')->length(4);
            $table->string('db_code',50)->nullable();
            $table->string('db_name',100)->nullable();
//            $table->string('db_description',1024)->nullable();
//            $table->string('suser_name',100)->nullable();
//            $table->dateTime('modify_date')->nullable();
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
        Schema::dropIfExists('_DBases');
    }
}
