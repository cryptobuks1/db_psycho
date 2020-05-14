<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBlInsurancePolicyContractTabLeasingContractIdFromBlInsurancePolicyContractTabLeasingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blInsurancePolicyContractTabLeasingContracts', function (Blueprint $table) {
            $table->dropColumn('bl_insurance_policy_contract_tab_leasing_contract_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blInsurancePolicyContractTabLeasingContracts', function (Blueprint $table) {
            $table->integer('bl_insurance_policy_contract_tab_leasing_contract_id')->nullable();
        });
    }
}
