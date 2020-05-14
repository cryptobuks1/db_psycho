<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__ActionTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_type_code',50)->nullable();
            $table->string('action_type_name',100)->nullable();
            $table->string('action_type_remark')->nullable();

            $table->boolean('use_for_entity_l')->nullable();
            $table->boolean('use_for_list_l')->nullable();

            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();
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
        Schema::dropIfExists('__ActionTypes');
    }
}
