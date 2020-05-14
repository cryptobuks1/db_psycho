<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveInterfaceIdFromAccessRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_AccessRoles', function (Blueprint $table) {
            $table->dropColumn('interface_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_AccessRoles', function (Blueprint $table) {
            $table->integer('interface_id')->nullable();
        });
    }
}
