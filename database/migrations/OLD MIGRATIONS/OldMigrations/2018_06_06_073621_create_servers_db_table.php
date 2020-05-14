<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ServersDB', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server_name',100)->nullable();
            $table->string('server_ip',30)->nullable();
            $table->string('server_url',100)->nullable();
            $table->string('suser_name',100)->nullable();
            $table->dateTime('modify_date')->nullable();
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
        Schema::dropIfExists('_ServersDB');
    }
}
