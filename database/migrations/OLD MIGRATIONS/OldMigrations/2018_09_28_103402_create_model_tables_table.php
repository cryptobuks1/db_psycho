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
            $table->integer('table_n')->length(8);
            $table->string('table_code',100);
            $table->string('table_name',100);
            $table->string('created_by',100);
            $table->string('updated_by',100);

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
