<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contractors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->length(4)->nullable();
            $table->integer('country_id')->length(2)->nullable();
            $table->boolean('actual_l')->default(1)->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->boolean('individual_l')->nullable();
            $table->string('contractor_full_name',200)->nullable();
            $table->string('contractor_short_name',100)->nullable();
            $table->string('taxpayer_number',30)->nullable();
            $table->string('code_reason_number',30)->nullable();
            $table->string('register_number',30)->nullable();
            $table->string('social_security_number',30)->nullable();
            $table->string('entrepreneur_certificate',30)->nullable();
            $table->dateTime('entrepreneur_certificate_date')->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

            $table->timestamps();
//            $table->string('identity_document',250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contractors');
    }
}
