<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__ModelTables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n')->length(4)->nullable();
            $table->string('table_code',50)->nullable();
            $table->string('table_name',100)->nullable();
            $table->boolean('use_db_area_l')->nullable();
            $table->boolean('use_stored_file_l')->nullable();
            $table->string('table_output_template',200)->nullable();
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
        Schema::dropIfExists('__ModelTables');
    }
}
