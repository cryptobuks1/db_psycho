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
            $table->string('report_name', 191)->nullable();
            $table->string('report_name_en', 191)->nullable();
            $table->string('report_name_ru', 191)->nullable();
            $table->string('report_lng',10)->nullable();
            $table->string('report_organisation', 191)->nullable();
            $table->string('report_format',191)->nullable();
            $table->date('report_start_date')->nullable();
            $table->date('report_end_date')->nullable();
            $table->string('report_status',20)->nullable();
            $table->longText('report_file')->nullable();
            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();

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
