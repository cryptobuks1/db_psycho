<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__UserInterfaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id_left')->nullable();
            $table->integer('menu_item_id_top')->nullable();
            $table->integer('help_id')->nullable();
            $table->integer('home_fe_route_id')->nullable();
            $table->string('user_interface_code', 100)->nullable();
            $table->string('user_interface_name', 100)->nullable();
            $table->string('home_url', 100)->nullable();
            $table->boolean('actual_l')->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->string('created_by', 20)->nullable();
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
        Schema::dropIfExists('__UserInterfaces');
    }
}
