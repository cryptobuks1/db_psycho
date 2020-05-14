<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToDbareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('_DbAreas', function(Blueprint $table) {

            $table->integer('consumer_id')->length(4);
            $table->string('db_area_name',100)->nullable();
            $table->boolean('actual_l');
            $table->boolean('deleted_l');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_DbAreas');
    }
}
