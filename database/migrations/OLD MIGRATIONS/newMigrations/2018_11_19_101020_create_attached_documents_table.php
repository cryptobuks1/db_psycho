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
            $table->integer('att_doc_type_id')->lenght(4);
            $table->integer('att_doc_kind_id')->lenght(4);
            $table->integer('table_n')->lenght(4);
            $table->string('att_doc_name', 100);
            $table->boolean('actual_l');
            $table->integer('row_id')->lenght(4);
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l');
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
