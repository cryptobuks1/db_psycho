<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtQuestionKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTQuestionKinds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->integer('qt_question_type_id')->nullable();
            $table->string('question_kind_name', 100)->nullable();
            $table->string('question_kind_code', 50)->nullable();
            $table->string('caption_code', 100)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('QTQuestionKinds');
    }
}
