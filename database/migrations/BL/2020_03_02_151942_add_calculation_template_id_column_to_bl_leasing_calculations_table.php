<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCalculationTemplateIdColumnToBlLeasingCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("blLeasingCalculations", function(Blueprint $table)
        {
            $table->integer("calculation_template_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("blLeasingCalculations", function(Blueprint $table)
        {
            $table->dropColumn("calculation_template_id");
        });
    }
}
