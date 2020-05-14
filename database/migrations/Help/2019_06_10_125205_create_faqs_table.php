<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('image_id')->nullable();
            $table->integer ('faq_parent_id')->nullable();
            $table->boolean ('group_l')->nullable();
            $table->string ('faq_code',100)->nullable();
            $table->string ('faq_title')->nullable();
            $table->string ('faq_description',200)->nullable();
            $table->Text ('faq_text')->nullable();
            $table->boolean ('actual_l')->nullable();
            $table->boolean ('deleted_l')->nullable();
            $table->string  ('created_by',20)->nullable();
            $table->string  ('updated_by',20)->nullable();
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
        Schema::dropIfExists('faq');
    }
}
