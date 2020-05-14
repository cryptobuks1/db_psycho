<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlAttachedDocumentKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BlAttachedDocumentKinds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bl_att_doc_kind_name', 100)->nullable();
            $table->integer('bl_att_doc_file_size')->nullable();
            $table->boolean('bl_att_doc_periodic_l')->nullable();
            $table->integer('bl_file_type_set_id')->nullable();
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
        Schema::dropIfExists('BlAttachedDocumentKinds');
    }
}
