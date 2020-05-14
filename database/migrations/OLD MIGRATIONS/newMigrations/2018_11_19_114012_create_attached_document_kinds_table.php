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
            $table->integer('db_area_id')->lenght(4)->nullable();
            $table->integer('att_doc_type_id')->lenght(4);
            $table->string('att_doc_kind_code', 50);
            $table->string('att_doc_kind_name', 100);
            $table->boolean('use_file_titles_l');
            $table->integer('att_doc_files_quantity')->lenght(2);
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('delete_l');
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
        Schema::dropIfExists('AttachedDocumentKinds');
    }
}
