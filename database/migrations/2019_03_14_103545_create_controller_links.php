<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControllerLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__ControllerLinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('controller_id')->length(4)->nullable();
            $table->integer('controller_id_link')->length(4)->nullable();
            $table->string('table_field_name_composite', 100)->nullable();
            $table->string('table_field_name', 100)->nullable();
            $table->smallInteger('parent_link_l')->nullable();
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
        Schema::dropIfExists('__ControllerLinks');

    }
}
