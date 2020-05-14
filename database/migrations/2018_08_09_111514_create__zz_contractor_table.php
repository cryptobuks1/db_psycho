<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZzContractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZzContractors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->length(2)->nullable();
            $table->integer('reason_date_change_id')->length(2)->nullable();
            $table->integer('contractor_id')->length(8)->nullable();
            $table->boolean('individual_l')->nullable();
            $table->string('contractor_full_name',200)->nullable();
            $table->string('contractor_short_name',100)->nullable();
            $table->string('taxpayer_number',30)->nullable();
            $table->string('code_reason_number',30)->nullable();
            $table->string('register_number',30)->nullable();
            $table->string('social_security_number',30)->nullable();
            $table->string('entrepreneur_certificate',30)->nullable();
            $table->dateTime('entrepreneur_certificate_date')->nullable();
            $table->string('first_name',40)->nullable();
            $table->string('last_name',40)->nullable();
            $table->string('middle_name',40)->nullable();
            $table->boolean('male_l')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->date('record_date')->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

//            $table->boolean('entrepreneur_l')->nullable();

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
        Schema::dropIfExists('ZzContractors');
    }
}
