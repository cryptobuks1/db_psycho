<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTSets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->integer('qt_block_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->string('question_set_name', 100)->nullable();
            $table->string('question_set_code', 50)->nullable();
            $table->longText('question_set_description')->nullable();
            $table->longText('question_set_remark')->nullable();
            $table->string('caption_code', 20)->nullable();
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
        Schema::dropIfExists('QTSets');
    }
}
