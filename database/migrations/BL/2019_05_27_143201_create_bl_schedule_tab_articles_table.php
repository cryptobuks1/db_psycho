<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlScheduleTabArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blScheduleTabArticles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_schedule_id')->nullable();
            $table->integer('bl_schedule_article_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->boolean('referential_l')->nullable();
            $table->boolean('calculated_l')->nullable();
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
        Schema::dropIfExists('blScheduleTabArticles');
    }
}
