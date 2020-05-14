<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequiredDocumentKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RequiredDocumentKinds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('att_doc_kind_id');
            $table->integer('table_n');
            $table->integer('row_id');
            $table->boolean('delete_l');
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
        Schema::dropIfExists('RequiredDocumentKinds');
    }
}
