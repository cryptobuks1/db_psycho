<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtAnswerScenarioObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTAnswerScenarioObjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_answer_scenario_id')->nullable();
            $table->integer('table_n')->nullable();
            $table->integer('row_id')->nullable();
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
        Schema::dropIfExists('QTAnswerScenarioObjects');
    }
}
