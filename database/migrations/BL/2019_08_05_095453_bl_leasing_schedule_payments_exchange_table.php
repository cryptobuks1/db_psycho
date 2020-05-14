<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlLeasingSchedulePaymentsExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingSchedulePaymentsExchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contractor_contract_id')->nullable();
            $table->string('contractor_contract_code',100)->nullable();
            $table->integer('bl_schedule_article_id')->nullable();
            $table->string('bl_schedule_article_code', 100)->nullable();
            $table->integer('bl_leasing_contract_specification_id')->nullable();
            $table->string('bl_leasing_contract_specification_code', 100)->nullable();
            $table->date('bl_leasing_schedule_payment_date')->nullable();
            $table->decimal('bl_leasing_schedule_payment_plan', 9,2)->nullable();
            $table->decimal('bl_leasing_schedule_payment_fact', 9,2)->nullable();
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
        Schema::dropIfExists('blLeasingSchedulePaymentsExchanges');
    }
}
