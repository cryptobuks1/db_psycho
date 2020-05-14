<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerAccessRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ConsumerAccessRows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->integer('access_type_id')->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->boolean('actual_l')->default(0);
            $table->boolean('read_only_l')->nullable();
//            $table->string('suser_name')->nullable();
            $table->date('modify_date')->nullable();
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
        Schema::dropIfExists('consumer_access_rows');
    }
}
