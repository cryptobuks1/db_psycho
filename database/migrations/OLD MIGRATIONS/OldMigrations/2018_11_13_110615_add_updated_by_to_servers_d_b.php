<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdatedByToServersDB extends Migration
{
    /**
     * Albert Topalu 13.11.18
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_ServersDB', function($table) {
            $table->string('updated_by')->length(100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
