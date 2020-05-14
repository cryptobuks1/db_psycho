<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtQuestionsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTQuestionTables', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('db_area_id')->nullable();
            $table->integer('qt_question_kind_id')->nullable();
            $table->integer('default_lines_quantity')->nullable();
            $table->integer('allow_appending')->nullable();
            $table->integer('view_table_in_set_l')->nullable();
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
        Schema::dropIfExists('QTQuestionTables');
    }
}
