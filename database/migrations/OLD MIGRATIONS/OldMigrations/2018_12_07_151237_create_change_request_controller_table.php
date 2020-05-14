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
        Schema::create('ChangeRequestController', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('change_request_id');
            $table->integer('db_type_controller_id');
            $table->integer('row_id'); //example contractor_id
            $table->integer('row_owner_id'); // id from table DBTypeControllers field object_owner_id
            $table->integer('main_l');
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
        Schema::dropIfExists('ChangeRequestController');
    }
}
