<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPersonInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContactPersonInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->nullable();
            $table->integer('info_type_id')->nullable();
            $table->integer('contact_person_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('info_kind_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->text('representation')->nullable();
            $table->string('city_name', 100)->nullable();
            $table->string('e_mail', 100)->nullable();
            $table->string('url_name', 100)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('phone_number_without_codes', 25)->nullable();
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
        Schema::dropIfExists('ContactPersonInfo');
    }
}
