<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractorContractNameToBlLeasingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blLeasingContracts', function (Blueprint $table) {
            $table->string('contractor_contract_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blLeasingContracts', function (Blueprint $table) {
            $table->dropColumn("contractor_contract_name");
        });
    }
}
