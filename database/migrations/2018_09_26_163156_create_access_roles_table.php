<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_AccessRoles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id_left')->nullable();
            $table->integer('menu_item_id_top')->nullable();
            $table->string('access_role_code',30)->nullable();
            $table->string('access_role_name',100)->nullable();
            $table->boolean('actual_l')->nullable();
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
        Schema::dropIfExists('_AccessRoles');
    }
}
