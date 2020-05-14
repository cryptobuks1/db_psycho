<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoredFileIdToBlLeasingCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blLeasingCalculations', function(Blueprint $table) {
            $table->integer('stored_file_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blLeasingCalculations', function(Blueprint $table) {
            $table->dropColumn('stored_file_id');
        });
    }
}
