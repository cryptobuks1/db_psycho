<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_activity_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->nullable();
            $table->boolean('main_l')->nullable();
            $table->string('suser_name', 100)->nullable();
            $table->date('modify_date')->nullable();
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
        Schema::dropIfExists('_activity_languages');
    }
}
