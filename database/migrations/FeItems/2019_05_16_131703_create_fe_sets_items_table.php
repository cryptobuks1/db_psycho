<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeSetsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__FeSetsItems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_item_id')->nullable();
            $table->integer('fe_set_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('action_type_id')->nullable();
            $table->integer('fe_css_class_id')->nullable();
            $table->string('fe_set_item_code',100)->nullable();
            $table->string('fe_set_item_name',100)->nullable();
            $table->integer('line_n')->nullable();
            $table->boolean('execute_fe_action_l')->nullable();
            $table->boolean('use_fe_set_item_controller_l')->nullable();
            $table->string('caption_code',100)->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('__FeSetsItems');
    }
}
