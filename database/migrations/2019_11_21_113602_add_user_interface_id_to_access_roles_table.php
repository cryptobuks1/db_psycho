<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInterfaceIdToAccessRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_AccessRoles', function(Blueprint $table)
        {
            $table->integer('user_interface_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_AccessRoles', function(Blueprint $table)
        {
            $table->dropColumn('user_interface_id');
        });
    }
}
