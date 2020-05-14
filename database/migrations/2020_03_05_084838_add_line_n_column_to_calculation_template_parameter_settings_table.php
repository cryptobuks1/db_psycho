<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLineNColumnToCalculationTemplateParameterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("CalculationTemplateParameterSettings", function(Blueprint $table)
        {
            $table->integer("line_n")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("CalculationTemplateParameterSettings", function(Blueprint $table)
        {
            $table->dropColumn("line_n");
        });
    }
}
