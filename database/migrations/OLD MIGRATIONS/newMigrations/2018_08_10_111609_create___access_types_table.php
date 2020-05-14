<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_n')->length(4);
            $table->string('access_type_code', 30);
            $table->string('access_type_name', 100);
            $table->boolean('actual_l');
            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();

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
        Schema::dropIfExists('__AccessTypes');
    }
}
