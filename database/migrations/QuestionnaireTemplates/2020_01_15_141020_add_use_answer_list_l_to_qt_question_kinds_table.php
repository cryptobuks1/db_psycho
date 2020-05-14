<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseAnswerListLToQtQuestionKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('QTQuestionKinds', function (Blueprint $table) {
            $table->boolean('use_answer_list_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('QTQuestionKinds', function (Blueprint $table) {
            $table->dropColumn('use_answer_list_l');
        });
    }
}
