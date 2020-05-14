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
            $table->integer('db_type_controller_id');
            $table->string('table_field_name');
            $table->string('field_name')->nullable();
            $table->string('field_alias')->nullable();
            $table->string('field_reference')->nullable();
            $table->integer('controller_id');
            $table->integer('data_type_id')->nullable();
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
        Schema::dropIfExists('db_type_controller_fields');
    }
}
