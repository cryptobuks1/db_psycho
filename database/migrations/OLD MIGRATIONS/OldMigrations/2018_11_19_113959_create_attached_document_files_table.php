<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachedDocumentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AttachedDocumentFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('att_doc_file_name', 100);
            $table->string('att_doc_file_code', 100);
            $table->integer('file_type_id');
            $table->integer('att_doc_file_size');
            $table->integer('att_doc_id');
            $table->integer('att_doc_file_title_id');
            $table->string('att_doc_file');
            $table->string('att_doc_file_link', 150);
            $table->string('att_doc_file_description', 150);
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
        Schema::dropIfExists('AttachedDocumentFiles');
    }
}
