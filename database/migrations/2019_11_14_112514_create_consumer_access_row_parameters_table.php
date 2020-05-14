<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerAccessRowParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ConsumerAccessRowParameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_access_row_id')->nullable();
            $table->integer('data_types_id')->nullable();
            $table->integer('access_axes_parameter_id')->nullable();
            $table->string('access_row_parameter_value')->nullable();
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
        Schema::dropIfExists('_ConsumerAccessRowParameters');
    }
}
