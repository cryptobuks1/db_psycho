<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachedDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AttachedDocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('att_doc_name', 100);
            $table->integer('att_doc_kind_id');
            $table->integer('att_doc_type_id');
            $table->boolean('actual_l');
            $table->string('table_n');
            $table->integer('row_id');
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
        Schema::dropIfExists('AttachedDocuments');
    }
}
