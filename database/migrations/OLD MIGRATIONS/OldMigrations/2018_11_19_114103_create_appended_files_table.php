<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppendedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AppendedFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_file_name', 100);
            $table->integer('file_type_id');
            $table->string('table_n');
            $table->integer('row_id');
            $table->string('app_file_bd');
            $table->integer('db_area_id')->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
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
        Schema::dropIfExists('AppendedFiles');
    }
}
