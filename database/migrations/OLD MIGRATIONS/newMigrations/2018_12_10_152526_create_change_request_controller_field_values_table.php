<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestControllerFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequestControllerFieldValues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('change_request_controller_field_id')->lenght(4);
            $table->string('field_value_type_code', 100)->nullable(); //current, new, old
            $table->text('field_value')->nullable(); //current, new, old
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
        Schema::dropIfExists('ChangeRequestControllerFieldValues');
    }
}
