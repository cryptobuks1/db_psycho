<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTypeControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DbTypeControllers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_type_id')->nullable();
            $table->integer('controller_id');
            $table->string('object_type_code');
            $table->integer('object_kind_n');
            $table->string('object_key_field');
            $table->integer('object_owner_id')->nullable();
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
        Schema::dropIfExists('DbTypeControllers');
    }
}
