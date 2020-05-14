<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Help', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('image_id')->nullable();
            $table->integer ('page_id')->nullable();
            $table->integer ('help_parent_id')->nullable();
            $table->boolean ('group_l')->nullable();
            $table->string  ('help_code',100)->nullable();
            $table->text  ('help_title')->nullable();
            $table->text ('help_description')->nullable();
            $table->boolean ('actual_l')->nullable();
            $table->boolean ('deleted_l')->nullable();
            $table->string  ('created_by',20)->nullable();
            $table->string  ('updated_by',20)->nullable();
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
        Schema::dropIfExists('Help');
    }
}
