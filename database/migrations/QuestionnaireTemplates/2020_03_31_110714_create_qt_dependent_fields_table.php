<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtDependentFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTDependentFields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_sets_questions_list_id')->nullable();
            $table->integer('qt_dependent_field_id')->nullable();
            $table->string('qt_dependent_foreign_key', 100)->nullable();
            $table->integer('deleted_l')->nullable();
            $table->integer('active_l')->nullable();
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
        Schema::dropIfExists('QTDependentFields');
    }
}
