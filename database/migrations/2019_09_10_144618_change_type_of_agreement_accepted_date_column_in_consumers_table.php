<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeOfAgreementAcceptedDateColumnInConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Consumers', function(Blueprint $table) {
            $table->dropColumn('agreement_accepted_date');
        });
        Schema::table('Consumers', function(Blueprint $table) {
            $table->timestamp('agreement_accepted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Consumers', function($table) {
            $table->dropColumn('agreement_accepted_date');
        });
        Schema::table('Consumers', function($table) {
            $table->date('agreement_accepted_date')->nullable();
        });
    }
}
