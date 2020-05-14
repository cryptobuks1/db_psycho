<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuestionnaireQuestions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('que_id')->nullable();
            $table->string('que_que_text')->nullable();
            $table->integer('que_type_id')->nullable();
            $table->integer('caption_id')->nullable();
            $table->boolean('email_l')->nullable();
            $table->boolean('questionnaire_name_l')->nullable();
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
        Schema::dropIfExists('QuestionnaireQuestions');
    }
}
