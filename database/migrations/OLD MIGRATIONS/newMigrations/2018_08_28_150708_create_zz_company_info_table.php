<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZzCompanyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ZzCompanyInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->lenght(2)->nullable();
            $table->integer('country_id')->lenght(2)->nullable();
            $table->integer('reason_date_change_id')->lenght(2)->nullable();
            $table->integer('company_info_id')->lenght(4);
            $table->integer('company_id')->lenght(8)->nullable();
            $table->integer('info_type_id')->lenght(2);
            $table->integer('info_kind_id')->lenght(2)->nullable();
            $table->integer('line_n')->lenght(4)->nullable();
            $table->string('representation', 500)->nullable();
            $table->string('city_name', 100)->nullable();
            $table->string('e_mail', 100)->nullable();
            $table->string('url_name', 100)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('phone_number_without_codes', 25)->nullable();
            $table->date('recorded_at');
            $table->string('recorded_by', 100);
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
        Schema::dropIfExists('ZzCompanyInfo');
    }
}
