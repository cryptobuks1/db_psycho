<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCalculatingLToBlLeasingCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blLeasingCalculations', function(Blueprint $table) {
            $table->boolean('calculating_l')->default(false)->nullable();
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
            $table->dropColumn('calculating_l');
        });
    }
}
