<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ConsumerAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_id')->length(4);
            $table->string('consumer_account_code', 100)->nullable();
            $table->string('consumer_account_name',100)->nullable();
            $table->boolean('actual_l');
            $table->boolean('deleted_l');
            $table->string('created_by', 40)->nullable();
            $table->string('updated_by', 40)->nullable();
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
        Schema::dropIfExists('_ConsumerAccounts');
    }
}
