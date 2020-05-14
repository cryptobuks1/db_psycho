<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPartnerPointIdToBlCustomerRequestsTable extends Migration
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
            $table->integer("partner_point_id")->nullable();
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
            $table->dropColumn("partner_point_id");
        });
    }
}
