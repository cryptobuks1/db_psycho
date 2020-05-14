<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessEntitiesByRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_AccessEntitiesByRoles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_entity_id')->nullable();
            $table->integer('access_role_id')->nullable();
            $table->integer('action_type_id')->nullable();
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
        Schema::dropIfExists('_AccessEntitiesByRoles');
    }
}
