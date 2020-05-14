<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTPages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->integer('questionnaire_templates_id')->nullable();
            $table->string('page_name', 100)->nullable();
            $table->string('page_code', 50)->nullable();
            $table->longText('page_description')->nullable();
            $table->longText('page_remark')->nullable();
            $table->longText('header')->nullable();
            $table->longText('footer')->nullable();
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
        Schema::dropIfExists('QTPages');
    }
}
