<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_ImageCategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_category_code', 50)->unique();
            $table->string('image_category_name', 100);
            $table->string('image_category_path', 200);
            $table->boolean('deleted_l');
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
        Schema::dropIfExists('_ImageCategories');
    }
}
