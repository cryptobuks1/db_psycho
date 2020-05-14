<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Companies', function(Blueprint $table)
        {
            $table->dropColumn("entrepreneur_certificate_date");

        });
        Schema::table('Companies', function(Blueprint $table)
        {
            $table->dateTime('entrepreneur_certificate_date')->nullable()->default("1970-01-01");
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
