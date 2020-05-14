<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalPersonInfoTable extends Migration
{
    /**
     * Run the migrations.
     * created Albert Topalu 02.04.19
     * @return void
     */
    public function up()
    {
        Schema::create('PhysicalPersonInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physical_person_id')->nullable();
            $table->integer('line_n')->nullable();
            $table->integer('info_type_id')->length(2)->nullable();
            $table->integer('info_kind_id')->length(2)->nullable();
            $table->text('representation')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('city_name',100)->nullable();
            $table->string('e_mail',100)->nullable();
            $table->string('url_name',100)->nullable();
            $table->string('phone_number',25)->nullable();
            $table->string('phone_number_without_codes',25)->nullable();
            $table->string('created_by',20)->nullable();
            $table->string('updated_by',20)->nullable();
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
        Schema::dropIfExists('PhysicalPersonInfo');
    }
}
