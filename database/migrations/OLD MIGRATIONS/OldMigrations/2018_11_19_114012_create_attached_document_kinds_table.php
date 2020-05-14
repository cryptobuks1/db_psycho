<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachedDocumentKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AttachedDocumentKinds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('att_doc_type_id');
            $table->string('att_doc_kind_code', 50);
            $table->string('att_doc_kind_name', 100);
            $table->boolean('use_file_titles_l');
            $table->integer('att_doc_files_quantity');
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
        Schema::dropIfExists('AttachedDocumentKinds');
    }
}
