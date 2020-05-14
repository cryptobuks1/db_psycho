<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->length(8)->nullable();
            $table->integer('company_id')->length(8)->nullable();
            $table->string('report_name')->nullable();
            $table->string('report_name_en')->nullable();
            $table->string('report_name_ru')->nullable();
            $table->string('report_lng',10)->nullable();
            $table->string('report_organisation')->nullable();
            $table->string('report_format')->nullable();
            $table->date('report_start_date')->nullable();
            $table->date('report_end_date')->nullable();
            $table->string('report_status',20)->nullable();
            $table->longText('report_file')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
