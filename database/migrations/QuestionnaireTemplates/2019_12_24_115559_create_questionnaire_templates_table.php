<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuestionnaireTemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->string('form_name', 100)->nullable();
            $table->text('message')->nullable();
            $table->string('questionnaire_templates_name', 100)->nullable();
            $table->string('questionnaire_templates_code', 50)->nullable();
            $table->text('description')->nullable();
            $table->text('remark')->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->string('caption_code', 100)->nullable();
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
        Schema::dropIfExists('QuestionnaireTemplates');
    }
}
