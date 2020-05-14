<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtSetsQuestionsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTSetsQuestionsList', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_question_kind_id')->nullable();
            $table->integer('qt_set_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->string('question_name',200)->nullable();
            $table->string('question_code',50)->nullable();
            $table->integer('question_width')->nullable();
            $table->boolean('question_required_l')->nullable();
            $table->string('caption_code',100)->nullable();
            $table->integer('deleted_l')->nullable();
            $table->integer('active_l')->nullable();
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
        Schema::dropIfExists('QTSetsQuestionsList');
    }
}
