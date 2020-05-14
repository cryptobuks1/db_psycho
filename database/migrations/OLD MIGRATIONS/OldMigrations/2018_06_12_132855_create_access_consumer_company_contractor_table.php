<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessConsumerCompanyContractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AccessConsumerCompaniesContractors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->length(8)->nullable();
            $table->integer('contractor_id')->length(8)->nullable();
            $table->integer('consumer_id')->length(4)->nullable();
            $table->boolean('maim_l')->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('read_only_l')->nullable();
//            $table->string('suser_name',100)->nullable();
            $table->date('modify_date')->nullable();
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
        Schema::dropIfExists('AccessConsumerCompaniesContractors');
    }
}
