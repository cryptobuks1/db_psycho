<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingSchedulePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingSchedulePayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contractor_contract_id')->nullable();
            $table->integer('bl_schedule_article_id')->nullable();
            $table->integer('bl_leasing_contract_specification_id')->nullable();
            $table->date('bl_leasing_schedule_payment_date')->nullable();
            $table->decimal('bl_leasing_schedule_payment_plan',9,2)->nullable();
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
        Schema::dropIfExists('blLeasingSchedulePayments');
    }
}
