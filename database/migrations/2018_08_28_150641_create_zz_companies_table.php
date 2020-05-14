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

            $table->integer('company_id')->length(8)->nullable();
            $table->integer('reason_date_change_id')->length(2)->nullable();
            $table->integer('country_id')->length(2)->nullable();
            $table->boolean('individual_l')->nullable();
            $table->string('company_full_name',200)->nullable();
            $table->string('company_short_name',100)->nullable();
            $table->string('taxpayer_number',30)->nullable();
            $table->string('code_reason_number',30)->nullable();
            $table->string('register_number',30)->nullable();
            $table->string('social_security_number',30)->nullable();
            $table->string('entrepreneur_certificate',30)->nullable();
            $table->dateTime('entrepreneur_certificate_date')->nullable();
            $table->string('recorded_by', 100)->nullable();
            $table->date('recorded_at')->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

//            $table->boolean('entrepreneur_l')->nullable();
//            $table->date('record_date')->nullable();

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
