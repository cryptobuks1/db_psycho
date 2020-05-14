<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireQuestionAnswersTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuestionnaireQuestionAnswersTables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("questionnaire_question_answer_id")->nullable();
            $table->integer("qt_question_table_attribute_id");
            $table->integer("line_n")->nullable();
            $table->string("question_answers_table_value", 255)->nullable();
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
        Schema::dropIfExists('QuestionnaireQuestionAnswersTables');
    }
}
