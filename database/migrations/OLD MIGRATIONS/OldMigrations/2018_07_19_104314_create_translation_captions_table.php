<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationCaptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('_translation_captions', function (Blueprint $table) {
        Schema::create('_TranslationCaptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caption_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->string('caption_translation', 500)->nullable();
            $table->string('created_by',100)->nullable();
            $table->string('updated_by',100)->nullable();
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
        Schema::dropIfExists('_TranslationCaptions');
    }
}
