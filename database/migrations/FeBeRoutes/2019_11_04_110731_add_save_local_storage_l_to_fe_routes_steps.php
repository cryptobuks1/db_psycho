<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaveLocalStorageLToFeRoutesSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('FeRoutesSteps', function(Blueprint $table)
        {
            $table->boolean('save_local_storage_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('FeRoutesSteps', function(Blueprint $table)
        {
            $table->dropColumn('save_local_storage_l');
        });
    }
}
