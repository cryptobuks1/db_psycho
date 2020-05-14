<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlScheduleTabSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blScheduleTabSchedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_schedule_article_id')->nullable();
            $table->integer('bl_schedule_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->float('schedule_row_n', 15 , 2)->nullable();
            $table->date('schedule_row_date')->nullable();
            $table->float('schedule_row_value', 15, 2)->nullable();
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
        Schema::dropIfExists('blScheduleTabSchedules');
    }
}
