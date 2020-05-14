<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTypeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DbTypeModels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('write_n')->nullable();
            $table->integer('db_type_id')->length(4)->nullable();
            $table->integer('table_n')->nullable();
            $table->string('object_type_code',50)->nullable();
            $table->integer('object_kind_n')->length(4)->nullable();
            $table->string('object_key_field', 50)->nullable();
            $table->integer('object_owner_table_n')->nullable();
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
        Schema::dropIfExists('_DbTypeModels');
    }
}
