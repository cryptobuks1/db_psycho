<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotificationsExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NotificationsExchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contractor_contract_id')->nullable();
            $table->string('contractor_contract_code' , 100)->nullable();
            $table->integer('contractor_id')->nullable();
            $table->string('contractor_code', 100)->nullable();
            $table->date('notification_date')->nullable();
            $table->text('notification_title')->nullable();
            $table->text('notification_text')->nullable();
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
        Schema::dropIfExists('NotificationsExchanges');
    }
}
