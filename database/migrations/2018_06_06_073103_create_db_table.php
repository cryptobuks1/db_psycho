<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DBases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id')->length(4)->nullable();
            $table->integer('db_type_id')->length(4)->nullable();
            $table->string('db_code',50)->nullable();
            $table->string('db_name',100)->nullable();
            $table->string('db_remark',200)->nullable();
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
        Schema::dropIfExists('_DBases');
    }
}
