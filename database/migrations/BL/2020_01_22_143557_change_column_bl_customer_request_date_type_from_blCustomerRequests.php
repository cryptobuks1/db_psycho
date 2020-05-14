<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnBlCustomerRequestDateTypeFromblCustomerRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('"blCustomerRequests"', function(Blueprint $table)
        {
           $table->dateTime("bl_customer_request_date")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('"blCustomerRequests"', function(Blueprint $table)
        {
            $table->date("bl_customer_request_date")->nullable()->change();
        });
    }
}
