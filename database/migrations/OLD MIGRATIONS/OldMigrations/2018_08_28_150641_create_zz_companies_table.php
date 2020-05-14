<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZzCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZzCompanies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->nullable();
            $table->string('company_full_name',200)->nullable();
            $table->string('company_short_name',100)->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('reason_date_change_id')->nullable();
            $table->boolean('individual_l')->nullable();
            $table->boolean('entrepreneur_l')->nullable();
            $table->string('taxpayer_number',30)->nullable();
            $table->string('register_number',30)->nullable();
            $table->string('social_security_number',30)->nullable();
            $table->string('entrepreneur_certificate',30)->nullable();
            $table->dateTime('entrepreneur_certificate_date')->nullable();
            $table->date('record_date')->nullable();
//            $table->string('suser_name', 100)->nullable(); //commit Albert Topalu 14.11.18
//            $table->dateTime('modify_date')->nullable();  //commit Albert Topalu 14.11.18

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
        Schema::dropIfExists('ZzCompanies');
    }
}
