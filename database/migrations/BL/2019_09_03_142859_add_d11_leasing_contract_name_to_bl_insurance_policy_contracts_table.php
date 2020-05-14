<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddD11LeasingContractNameToBlInsurancePolicyContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blInsurancePolicyContracts', function($table) {
            $table->string('d11_leasing_contract_name',100)->nullable();
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
            $table->dropColumn('d11_leasing_contract_name')->nullable();
        });
    }
}
