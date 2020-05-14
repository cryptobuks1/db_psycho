<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlRequiredDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::dropIfExists('BlRequiredDocuments');

                Schema::create('BlRequiredDocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n_doc')->nullable();
            $table->integer('row_id_doc')->nullable();
            $table->integer('bl_att_doc_kind_id')->nullable();
            $table->integer('db_area_id')->nullable();
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
        Schema::dropIfExists('BlRequiredDocuments');
    }
}
