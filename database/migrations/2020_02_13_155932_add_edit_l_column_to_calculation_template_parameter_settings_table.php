<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditLColumnToCalculationTemplateParameterSettingsTable extends Migration
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
            $table->boolean("edit_l")->default(true)->nullable();
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
            $table->dropColumn("edit_l");
        });
    }
}
