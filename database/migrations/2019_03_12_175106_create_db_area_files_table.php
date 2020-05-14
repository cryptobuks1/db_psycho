<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbAreaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DbAreaFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('db_area_file_name', 150)->nullable();
            $table->integer('db_area_file_size')->nullable();
            $table->integer('file_type_id')->nullable();
            $table->integer('bl_att_doc_kind_id')->nullable();
            $table->integer('stored_file_id')->nullable();
            $table->integer('table_n_owner')->nullable();
            $table->integer('row_id_owner')->nullable();
            $table->integer('table_n_doc')->nullable();
            $table->integer('row_id_doc')->nullable();
            $table->tinyInteger('db_area_file_storage_type')->nullable();
            $table->string('db_area_file_path', 200)->nullable();
            $table->longText('db_area_file_bd')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('DbAreaFiles');
    }
}
