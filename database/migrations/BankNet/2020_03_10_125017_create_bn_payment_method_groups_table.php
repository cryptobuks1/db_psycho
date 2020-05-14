<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnPaymentMethodGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnPaymentMethodGroups', function (Blueprint $table) {

//            $table->increments('test');
            $table->integer('id');
            $table->text("payment_method_group_code")->nullable();
            $table->string("payment_method_group_name", 100)->nullable();
            $table->integer("position")->nullable();
            $table->text("description")->nullable();
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
        Schema::dropIfExists('bnPaymentMethodGroups');
    }
}
