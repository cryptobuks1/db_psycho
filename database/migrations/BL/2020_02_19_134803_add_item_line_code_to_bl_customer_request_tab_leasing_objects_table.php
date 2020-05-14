<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemLineCodeToBlCustomerRequestTabLeasingObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blCustomerRequestTabLeasingObjects', function(Blueprint $table) {
            $table->string('item_line_code', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blCustomerRequestTabLeasingObjects', function(Blueprint $table) {
            $table->dropColumn('item_line_code');
        });
    }
}
