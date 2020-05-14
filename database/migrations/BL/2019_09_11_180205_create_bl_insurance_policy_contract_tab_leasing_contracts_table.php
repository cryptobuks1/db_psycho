<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateblInsurancePolicyContractTabLeasingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blInsurancePolicyContractTabLeasingContracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bl_insurance_policy_contract_tab_leasing_contract_id')->nullable();
            $table->integer('contractor_contract_id')->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('bl_insurance_policy_contract_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blInsurancePolicyContractTabLeasingContracts');
    }
}
