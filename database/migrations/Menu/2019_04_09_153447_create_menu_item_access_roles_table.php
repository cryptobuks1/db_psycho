<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemAccessRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MenuItemAccessRoles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id')->nullable();
            $table->integer('access_role_id')->length(2)->nullable();
            $table->boolean('menu_item_view_l')->nullable();
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
        Schema::dropIfExists('MenuItemAccessRoles');
    }
}
