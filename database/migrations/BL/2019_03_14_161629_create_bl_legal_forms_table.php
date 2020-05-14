<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLegalFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLegalForms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bl_legal_form_name')->nullable();
            $table->string('bl_legal_form_full_name',200)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->integer('db_area_id')->nullable();
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
        Schema::dropIfExists('blLegalForms');
    }
}
