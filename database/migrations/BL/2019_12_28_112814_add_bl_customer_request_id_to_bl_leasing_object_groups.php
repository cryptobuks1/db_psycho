<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlCustomerRequestIdToBlLeasingObjectGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("blLeasingObjectGroups", function(Blueprint $table)
        {
            $table->integer("bl_customer_request_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("blLeasingObjectGroups", function(Blueprint $table)
        {
            $table->dropColumn("bl_customer_request_id");
        });
    }
}
