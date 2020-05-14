<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BeRoutes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('controller_id')->nullable();
            $table->integer('action_type_id')->nullable();
            $table->string('be_route_code',100)->nullable();
            $table->string('be_route_path',100)->nullable();
            $table->string('be_route_name',100)->nullable();
            $table->boolean("deleted_l")->nullable();
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
        Schema::dropIfExists('BeRoutes');
    }
}
