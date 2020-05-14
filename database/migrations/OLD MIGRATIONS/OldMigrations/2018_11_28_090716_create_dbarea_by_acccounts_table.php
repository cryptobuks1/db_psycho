<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbareaByAcccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_DbAreaByAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_by_consumer_account_id')->length(4);
            $table->integer('db_area_id')->length(4);
            $table->integer('consumer_account_id')->length(4);
            $table->boolean('actual_l');
            $table->boolean('deleted_l');
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_DbAreaByAccounts');
    }
}
