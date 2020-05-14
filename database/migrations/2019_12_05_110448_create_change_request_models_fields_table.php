<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestModelsFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequestModelFields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('change_request_model_id')->nullable();
            $table->integer('system_status_id')->nullable();
            $table->integer('db_type_model_field_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->boolean('field_reference')->nullable();
            $table->string('row_key_value')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('ChangeRequestModelFields');
    }
}
