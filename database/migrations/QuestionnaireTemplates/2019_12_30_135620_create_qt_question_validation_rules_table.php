<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtQuestionValidationRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTQuestionValidationRules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_validation_rule_id');
            $table->integer('qt_question_kind_id');
            $table->boolean('deleted_l');
            $table->boolean('active_l');
            $table->string('created_by', 20);
            $table->string('updated_by', 20);
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
        Schema::dropIfExists('QTQuestionValidationRules');
    }
}
