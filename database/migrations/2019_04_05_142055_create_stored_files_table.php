<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoredFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StoredFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stored_file_code', 150)->nullable();
            $table->string('stored_file_name', 150)->nullable();
            $table->string('stored_file_extension', 20)->nullable();
            $table->string('stored_file_mime', 100)->nullable();
            $table->integer('stored_file_size')->nullable();
            $table->integer('file_type_id')->nullable();
            $table->integer('table_n')->nullable();
            $table->integer('row_id')->nullable();
            $table->string('table_file_field', 100)->nullable();
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
        Schema::dropIfExists('StoredFiles');
    }
}
