<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnQuestionDescriptionToQtSetsQuestionsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('QTSetsQuestionsList', function($table) {
            $table->text('question_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('QTSetsQuestionsList', function($table) {
            $table->dropColumn('question_description');
        });
    }
}
