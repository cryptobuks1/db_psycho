<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTQuestionTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n')->nullable();
            $table->string('question_type_name', 100)->nullable();
            $table->string('question_type_code', 50)->nullable();
            $table->boolean('reference_l')->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->boolean('active_l')->nullable();
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
        Schema::dropIfExists('QTQuestionTypes');
    }
}
