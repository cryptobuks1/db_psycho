<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRowParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessRowParameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('controller_id')->nullable();
            $table->string('table_field_name',100)->nullable();
            $table->string('parameter_code',25);
            $table->string('parameter_name',100)->nullable();
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
        Schema::dropIfExists('__AccessRowParameters');
    }
}
