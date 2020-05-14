<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlCustomerRequestStageToBlCustomerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("blCustomerRequests", function(Blueprint $table)
        {
            $table->integer("bl_customer_request_stage")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("blCustomerRequests", function(Blueprint $table)
        {
            $table->dropColumn("bl_customer_request_stage");
        });
    }
}
