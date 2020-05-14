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
            $table->integer('db_area_id')->length(2)->nullable();
            $table->integer('country_id')->length(2)->nullable();
            $table->boolean('actual_l');
            $table->string('uid_1c_code')->nullable();
            $table->boolean('individual_l');
            $table->string('contractor_full_name',200);
            $table->string('contractor_short_name',100);
            $table->string('taxpayer_number',30)->nullable();
            $table->string('code_reason_number',30)->nullable();
            $table->string('register_number',30)->nullable();
            $table->string('identity_document',250)->nullable();
            $table->string('social_security_number',30)->nullable();
            $table->string('entrepreneur_certificate',30)->nullable();
            $table->date('entrepreneur_certificate_date')->nullable();
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
        Schema::dropIfExists('Contractors');
    }
}
