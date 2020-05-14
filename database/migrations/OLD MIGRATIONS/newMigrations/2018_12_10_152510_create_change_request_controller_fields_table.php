<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestControllerFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequestControllerFields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('change_request_controller_id')->lenght(4);
            $table->integer('db_type_controller_field_id')->lenght(4);
            $table->boolean('field_reference')->nullable();
            $table->integer('line_n')->lenght(4)->nullable();
            $table->string('status')->lenght(2)->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('ChangeRequestControllerFields');
    }
}
