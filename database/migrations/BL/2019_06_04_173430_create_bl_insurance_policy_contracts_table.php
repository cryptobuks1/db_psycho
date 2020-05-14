<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlInsurancePolicyContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blInsurancePolicyContracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->integer('contractor_id_insurance_company')->nullable();
            $table->integer('contractor_contract_id')->nullable();
            $table->integer('table_n_insurant')->nullable();
            $table->integer('row_id_insurant')->nullable();
            $table->double('bl_insurance_policy_contract_insurance_premium')->nullable();
            $table->double('bl_insurance_policy_contract_franchise_amount')->nullable();
            $table->date('d1_payment_term_next_installment')->nullable();
            $table->string('d2_leasing_contract_status', 50)->nullable();
            $table->string('d3_leasing_object', 100)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('blInsurancePolicyContracts');
    }
}
