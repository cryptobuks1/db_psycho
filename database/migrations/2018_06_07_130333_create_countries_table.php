<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_Countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_name',100)->nullable();
            $table->string('country_full_name',100)->nullable();
            $table->string('country_code',5)->nullable();
            $table->string('country_code_alpha2',4)->nullable();
            $table->string('country_code_alpha3',6)->nullable();
            $table->boolean('own_doc_types_l')->nullable();
            $table->boolean('actual_l')->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('_Countries');
    }
}
