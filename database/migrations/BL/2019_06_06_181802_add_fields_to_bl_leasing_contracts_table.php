<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToBlLeasingContractsTable extends Migration
{

    public function up()
    {
        Schema::table('blLeasingContracts', function (Blueprint $table) {
            $table->string('d2_leasing_contract_status', 50)->nullable();
            $table->string('d4_payment_with_VAT', 50)->nullable();
            $table->string('d5_payment_deadline', 50)->nullable();
            $table->string('d6_payment_status', 50)->nullable();
            $table->string('d7_payment_number', 50)->nullable();
            $table->string('d8_payment_balance', 50)->nullable();
        });
    }

    public function down()
    {
        Schema::table('blLeasingContracts', function($table) {
            $table->dropColumn('d2_leasing_contract_status');
            $table->dropColumn('d4_payment_with_VAT');
            $table->dropColumn('d5_payment_deadline');
            $table->dropColumn('d6_payment_status');
            $table->dropColumn('d7_payment_number');
            $table->dropColumn('d8_payment_balance');
        });
    }
}
