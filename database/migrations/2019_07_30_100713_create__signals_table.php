<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__Signals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('change_request_id')->length(4)->nullable();
            $table->integer('db_area_id')->length(4)->nullable();
            $table->integer('system_status_id')->length(4);
            $table->string('request_incoming_n',20)->nullable();
            $table->string('signal_type_code',20);
            $table->boolean('signal_error_l');
            $table->string('signal_error_code')->nullable();
            $table->text('signal_error_message')->nullable();
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
        Schema::dropIfExists('__Signals');
    }
}
