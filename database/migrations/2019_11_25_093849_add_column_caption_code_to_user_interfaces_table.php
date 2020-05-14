<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCaptionCodeToUserInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('__UserInterfaces', function(Blueprint $table)
        {
            $table->string('caption_code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('__UserInterfaces', function(Blueprint $table)
        {
            $table->dropColumn('caption_code');
        });
    }
}
