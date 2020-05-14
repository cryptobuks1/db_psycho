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
            $table->integer('company_id')->lenght(4);
            $table->integer('region_id')->lenght(2)->nullable();
            $table->integer('info_type_id')->lenght(2);
            $table->integer('country_id')->lenght(2)->nullable();
            $table->integer('info_kind_id')->lenght(4);
            $table->string('representation', 500);
            $table->string('city_name', 100)->nullable();
            $table->string('e_mail', 100)->nullable();
            $table->string('url_name', 100)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('phone_number_without_codes', 25)->nullable();
            $table->boolean('actual_l');
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
        Schema::dropIfExists('CompanyInfo');
    }
}
