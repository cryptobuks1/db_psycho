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
            $table->integer('att_doc_type_id')->lenght(4)->nullable();
            $table->integer('att_doc_kind_id')->lenght(4)->nullable();
            $table->integer('table_n')->lenght(4)->nullable();
            $table->string('att_doc_name', 100)->nullable();
            $table->boolean('actual_l')->nullable();
            $table->integer('row_id')->lenght(4)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('AttachedDocuments');
    }
}
