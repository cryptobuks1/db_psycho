<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessAxesParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessAxesParameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('access_axis_id');
            $table->integer('line_n')->nullable();
            $table->integer('access_row_parameter_id');
            // todo Удалить после тестирования
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('name',100)->nullable();
            // end
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
        Schema::dropIfExists('__AccessAxesParameters');
    }
}
