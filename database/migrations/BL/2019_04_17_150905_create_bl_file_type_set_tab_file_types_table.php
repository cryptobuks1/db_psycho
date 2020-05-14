<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlFileTypeSetTabFileTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("blFileTypeSetTabFileTypes", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_file_type_set_id')->nullable();
            $table->integer('file_type_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists("blFileTypeSetTabFileTypes");
    }
}
