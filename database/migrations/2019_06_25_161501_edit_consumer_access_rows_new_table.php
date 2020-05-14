<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditConsumerAccessRowsNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_ConsumerAccessRowsNew', function(Blueprint $table)
        {
            $table->dropColumn("contractor_contract_id");
            $table->dropColumn("contractor_id");
            $table->dropColumn("company_id");
        });
        Schema::table('_ConsumerAccessRowsNew', function(Blueprint $table)
        {
            $table->integer('contractor_contract_id')->default(0)->nullable()->after('access_role_id');
            $table->integer('contractor_id')->default(0)->nullable()->after('contractor_contract_id');
            $table->integer('company_id')->default(0)->nullable()->after('contractor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_ConsumerAccessRowsNew', function(Blueprint $table)
        {
            $table->dropColumn("contractor_contract_id");
            $table->dropColumn("contractor_id");
            $table->dropColumn("company_id");
        });
        Schema::table('_ConsumerAccessRowsNew', function(Blueprint $table)
        {
            $table->integer('contractor_contract_id')->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('company_id')->nullable();
        });
    }
}
