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
            $table->integer('file_type_id')->length(4)->nullable();
            $table->integer('table_n')->length(4)->nullable();
            $table->integer('att_doc_type_id')->length(4)->nullable();
            $table->integer('att_doc_kind_id')->length(4)->nullable();
            $table->integer('row_id')->length(4)->nullable();
            $table->boolean('deleted_l')->length(4)->nullable();
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
        Schema::dropIfExists('AppendedFiles');
    }
}
