<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * created Albert Topalu 03.04.19
     * @return void
     */
    public function up()
    {
        Schema::create('ContractorContracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n')->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->string('contractor_contract_name',100)->nullable();
            $table->integer('row_id')->nullable();
            $table->date('contractor_contract_date')->nullable();
            $table->string('contractor_contract_number', 50)->nullable();
            $table->date('contractor_contract_expiration_date')->nullable();
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
        Schema::dropIfExists('ContractorContracts');
    }
}
