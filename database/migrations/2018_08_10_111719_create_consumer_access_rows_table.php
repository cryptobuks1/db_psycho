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
        Schema::create('_ConsumerAccessRows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_axis_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->integer('access_role_id')->nullable();
            $table->integer('consumer_id')->nullable();
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
        Schema::dropIfExists('_ConsumerAccessRows');
    }
}
