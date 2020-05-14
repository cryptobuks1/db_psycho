<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CompanyInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('info_kind_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('info_type_id')->nullable();
            $table->string('representation', 500)->nullable();
            $table->string('city_name', 100)->nullable();
            $table->string('e_mail', 100)->nullable();
            $table->string('url_name', 100)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('phone_number_without_codes', 25)->nullable();
//            $table->string('suser_name', 100)->nullable(); //commit Albert Topalu 14.11.18
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
        Schema::dropIfExists('CompanyInfo');
    }
}
