<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n')->length(4)->nullable();
            $table->string('access_type_code', 30)->nullable();
            $table->string('access_type_name', 100)->nullable();
            $table->string('action_type_remark', 191)->nullable();
            $table->integer('use_for_entity_l')->length(1)->nullable();
            $table->integer('use_for_list_l')->length(1)->nullable();
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
        Schema::dropIfExists('__AccessTypes');
    }
}
