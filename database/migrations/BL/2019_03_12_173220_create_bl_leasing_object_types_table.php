<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingObjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingObjectTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->string('uid_1c_code',36)->nullable();
            $table->string('bl_leasing_object_type_name',100)->nullable();
            $table->string('bl_leasing_object_type_name_en',100)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('blLeasingObjectTypes');
    }
}
