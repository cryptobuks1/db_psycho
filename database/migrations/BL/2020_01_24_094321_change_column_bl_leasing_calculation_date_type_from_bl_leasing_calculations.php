<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnBlLeasingCalculationDateTypeFromBlLeasingCalculations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('"blLeasingCalculations"', function(Blueprint $table)
        {
            $table->dateTime("bl_leasing_calculation_date")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('"blLeasingCalculations"', function(Blueprint $table)
        {
            $table->date("bl_leasing_calculation_date")->nullable()->change();
        });
    }
}
