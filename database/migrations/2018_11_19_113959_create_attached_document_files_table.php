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
            $table->integer('att_doc_file_title_id')->length(4)->nullable();
            $table->integer('file_type_id')->length(4)->nullable();
            $table->integer('att_doc_id')->length(4)->nullable();
            $table->string('att_doc_file_name', 100)->nullable();
            $table->string('att_doc_file_code', 20)->nullable();
            $table->integer('att_doc_file_size')->length(4)->nullable();
            $table->longText('att_doc_file')->nullable();
            $table->string('att_doc_file_link', 150)->nullable();
            $table->text('att_doc_file_description')->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->integer('att_doc_file_status')->lenght(4)->nullable();
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
