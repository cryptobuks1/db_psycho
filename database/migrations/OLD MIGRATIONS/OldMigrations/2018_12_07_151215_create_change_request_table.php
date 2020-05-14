<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChangeRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id');
            $table->integer('table_n')->nullable();
            $table->integer('row_id')->nullable();
            $table->string('status', 50)->nullable();
            $table->text('comment')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
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
        Schema::dropIfExists('ChangeRequests');
    }
}
