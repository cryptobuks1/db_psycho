<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MenuItems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_route_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('menu_item_parent_id')->nullable();
            $table->integer('menu_item_group_l')->nullable();
            $table->string('menu_item_name',100)->nullable();
            $table->string('caption_code',100)->nullable();
            $table->integer('line_n')->nullable();
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
        Schema::dropIfExists('MenuItems');
    }
}
