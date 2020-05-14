<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTypeControllerFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DbTypeControllerFields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_type_controller_id')->length(4)->nullable();
            $table->integer('data_type_id')->length(4)->nullable();
            $table->string('table_field_name', 100)->nullable();
            $table->string('field_name', 100)->nullable();
            $table->string('field_alias', 100)->nullable();
            $table->boolean('field_reference')->nullable();
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
        Schema::dropIfExists('_DbTypeControllerFields');
    }
}
