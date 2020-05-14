<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequiredLAndDefaultValueColumnToCalculationTemplateParameterSettingsTable extends Migration
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
            $table->boolean("required_l")->default(false)->nullable();
            $table->string("default_value", 255)->nullable();
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
            $table->dropColumn("required_l");
            $table->dropColumn("default_value");
        });
    }
}
