<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdAndMultipleValuesLToInfoKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_InfoKinds', function(Blueprint $table) {
            $table->integer('parent_id')->nullable();
            $table->boolean('multiple_values_l')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_InfoKinds', function(Blueprint $table)
        {
            $table->dropColumn('parent_id');
            $table->dropColumn('multiple_values_l');
        });
    }
}
