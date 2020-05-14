<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtensionOneAdditionalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ExtensionOneAdditionalDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calculation_parameter_type_id')->nullable();
            $table->string('one_additional_detail_code', 100)->nullable();
            $table->integer('one_add_detail_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->boolean('answer_list_l')->nullable();
            $table->boolean('actual_l')->nullable();
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
        Schema::dropIfExists('ExtensionOneAdditionalDetails');
    }
}
