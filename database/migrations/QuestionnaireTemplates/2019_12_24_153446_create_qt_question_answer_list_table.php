<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtQuestionAnswerListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTQuestionAnswerList', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_question_kind_id')->nullable();
            $table->string('question_answer_value',255)->nullable();
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
        Schema::dropIfExists('QTQuestionAnswerList');
    }
}
