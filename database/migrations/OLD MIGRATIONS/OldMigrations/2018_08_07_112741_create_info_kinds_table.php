<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_InfoKinds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_type_id')->nullable();
            $table->string('info_kind_code', 30)->nullable();
            $table->string('info_kind_name', 100)->nullable();
//            $table->string('suser_name', 100)->nullable(); //commit Albert Topalu 14.11.18
//            $table->dateTime('modify_date')->nullable();  //commit Albert Topalu 14.11.18

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
        Schema::dropIfExists('_InfoKinds');
    }
}
