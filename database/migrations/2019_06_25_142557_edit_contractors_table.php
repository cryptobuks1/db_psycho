<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Contractors', function(Blueprint $table)
        {
            $table->dropColumn("entrepreneur_certificate_date");
            $table->dropColumn("actual_l");
        });
        Schema::table('Contractors', function(Blueprint $table)
        {
            $table->date("entrepreneur_certificate_date")->nullable();
            $table->boolean("actual_l")->nullable();
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
