<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtAnswerScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTAnswerScenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_sets_questions_list_id')->nullable();
            $table->integer('table_n')->nullable();
            $table->integer('row_id')->nullable();
            $table->integer('qt_question_answer_id')->nullable();
            $table->integer('qt_scenario_id')->nullable();
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
        Schema::dropIfExists('QTAnswerScenarios');
    }
}
