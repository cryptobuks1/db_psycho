<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerAccessRowsNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ConsumerAccessRowsNew', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("db_area_id")->nullable();
            $table->integer("access_role_id")->nullable();
            $table->integer("contractor_contract_id")->nullable();
            $table->integer("contractor_id")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("consumer_id")->nullable();
            $table->boolean("actual_l")->nullable();
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
        Schema::dropIfExists('_ConsumerAccessRowsNew');
    }
}
