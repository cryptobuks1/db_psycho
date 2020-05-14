<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToBlInsurancePolicyContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blInsurancePolicyContracts', function($table) {
            $table->string('d9_insurant',100)->nullable();
            $table->string('d10_insurance_company',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blInsurancePolicyContracts', function($table) {
            $table->dropColumn('d9_insurant')->nullable();
            $table->dropColumn('d10_insurance_company')->nullable();
        });
    }
}
