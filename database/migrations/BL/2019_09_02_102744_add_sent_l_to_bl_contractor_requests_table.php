<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSentLToBlContractorRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blContractorRequests', function (Blueprint $table) {
            $table->boolean('sent_l')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blContractorRequests', function (Blueprint $table) {
            $table->dropColumn('sent_l');
        });
    }
}
