<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_CryptoPlatforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_platform_code', 20)->unique();////????????
            $table->string('c_platform_name', 100);
            $table->string('c_platform_url', 100);
            $table->string('c_platform_remark', 100)->nullable();
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
        Schema::dropIfExists('_CryptoPlatforms');
    }
}
