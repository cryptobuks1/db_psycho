<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlCustomerRequestTabLeasingObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blCustomerRequestTabLeasingObjects', function (Blueprint $table){
        $table->increments('id');
        $table->integer('bl_customer_request_id')->nullable();
        $table->integer('line_n')->nullable();
        $table->integer('bl_leasing_object_type_id')->nullable();
        $table->integer('bl_leasing_object_brand_id')->nullable();
        $table->integer('bl_leasing_object_model_id')->nullable();
        $table->integer('bl_leasing_object_group_id')->nullable();
        $table->float('bl_leasing_object_price', 15, 2)->nullable();
        $table->integer('bl_leasing_object_quantity')->nullable();
        $table->float('bl_leasing_object_sum', 15, 2)->nullable();
        $table->integer('bl_leasing_calculation_main_document_id')->nullable();
        $table->integer('currency_id')->nullable();
        $table->integer('rate_VAT_id')->nullable();
        $table->integer('supplier_contractor_id')->nullable();
        $table->string('created_by',20)->nullable();
        $table->string('updated_by',20)->nullable();

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
        Schema::dropIfExists('blCustomerRequestTabLeasingObjects');
    }
}
