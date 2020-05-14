<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSupplierNameToBlCustomerRequestTabLeasingObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blCustomerRequestTabLeasingObjects', function($table) {
            $table->string('supplier_name',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blCustomerRequestTabLeasingObjects', function($table) {
            $table->dropColumn('supplier_name')->nullable();
        });
    }
}
