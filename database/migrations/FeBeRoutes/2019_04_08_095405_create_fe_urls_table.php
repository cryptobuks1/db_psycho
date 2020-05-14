<?php

// Bogdan Yartsun 8.04.2019

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FeUrls', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('controller_id')->nullable();
            $table->string('fe_url_code',100)->nullable();
            $table->string('fe_url_parameter',100)->nullable();
            $table->string('caption_code',100)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('FeUrls');
    }
}
