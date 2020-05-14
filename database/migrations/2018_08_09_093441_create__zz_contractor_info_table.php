<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZzContractorInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZzContractorInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_type_id')->length(2)->nullable();
            $table->integer('country_id')->length(2)->nullable();
            $table->integer('contractor_info_id')->length(4)->nullable();
            $table->integer('reason_date_change_id')->length(2)->nullable();
            $table->integer('contractor_id')->length(8)->nullable();
            $table->integer('info_kind_id')->length(2)->nullable();
            $table->integer('region_id')->length(2)->nullable();
            $table->integer('line_n')->length(4)->nullable();
            $table->string('representation', 500)->nullable();
            $table->string('city_name', 100)->nullable();
            $table->string('e_mail', 100)->nullable();
            $table->string('url_name', 100)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('phone_number_without_codes', 25)->nullable();
            $table->string('recorded_by', 100)->nullable();
            $table->date('recorded_at', 100)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

//            $table->dateTime('record_date')->nullable();
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
        Schema::dropIfExists('ZzContractorInfo');
    }
}
