<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbAreaFileTable extends Migration
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
            $table->string('db_area_file_name', 150);
            $table->integer('db_area_file_size');
            $table->integer('file_type_id');
            $table->integer('bl_att_doc_kind_id');
            $table->integer('table_n_owner');
            $table->integer('row_id_owner');
            $table->integer('table_n_doc');
            $table->integer('row_id_doc');
            $table->longText('db_area_file_bd');
            $table->integer('db_area_id');
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
        Schema::dropIfExists('DbAreaFiles');
    }
}
