<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_type_code', 30)->nullable();
            $table->string('access_type_name', 100)->nullable();
            $table->boolean('actual_l')->nullable();
//            $table->string('suser_name', 100)->nullable(); //commit Albert Topalu 14.11.18
//            $table->date('modify_date')->nullable();  //commit Albert Topalu 14.11.18
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
        Schema::dropIfExists('__access_types');
    }
}
