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
            $table->integer('table_n')->lenght(4);
            $table->integer('att_doc_type_id')->lenght(4);
            $table->integer('att_doc_kind_id')->lenght(4);
            $table->integer('row_id')->lenght(4);
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
        Schema::dropIfExists('RequiredDocumentKinds');
    }
}
