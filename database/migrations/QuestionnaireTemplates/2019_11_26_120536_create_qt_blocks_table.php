<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTBlocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id');
            $table->integer('qt_page_id');
            $table->integer('line_n')->nullable();
            $table->string('block_name', 100)->nullable();
            $table->string('block_code', 50)->nullable();
            $table->longText('block_description')->nullable();
            $table->longText('block_remark')->nullable();
            $table->string('caption_code', 100)->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->integer('active_l')->nullable();
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
        Schema::dropIfExists('QTBlocks');
    }
}
