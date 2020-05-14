<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeSetsItemsControllers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__FeSetsItemsControllers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('controller_id')->nullable();
            $table->integer('fe_set_item_id')->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean("deleted_l")->nullable();
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
        Schema::dropIfExists('__FeSetsItemsControllers');
    }
}
