<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachedDocumentFileTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AttachedDocumentFileTitles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('att_doc_kind_id')->length(4)->nullable();
            $table->string('att_doc_title_name', 100)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('delete_l')->nullable();
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
        Schema::dropIfExists('AttachedDocumentFileTitles');
    }
}
