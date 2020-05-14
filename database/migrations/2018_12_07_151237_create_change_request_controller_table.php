<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequestControllers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_type_controller_id')->length(4)->nullable();
            $table->integer('change_request_id')->length(4)->nullable();
            $table->integer('row_id')->length(4)->nullable(); //example contractor_id
            $table->integer('row_id_dep')->length(4)->nullable(); //example contractor_id
            $table->string('main_l')->nullable();
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
        Schema::dropIfExists('ChangeRequestControllers');
    }
}
