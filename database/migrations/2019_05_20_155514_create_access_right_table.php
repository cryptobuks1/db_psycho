<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__AccessRights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_right_code', 50)->nullable();
            $table->string('access_right_name', 100)->nullable();
            $table->string('access_right_remark')->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('__AccessRights');
    }
}
