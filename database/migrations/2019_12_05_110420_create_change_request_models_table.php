<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequestModels', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('db_type_model_id')->nullable();
            $table->integer('db_type_model_id_dep')->nullable();
            $table->integer('change_request_id')->length(4)->nullable();
            $table->integer('row_id')->nullable(); //example contractor_id
            $table->integer('row_id_dep')->nullable(); //example contractor_id
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('ChangeRequestModels');
    }
}
