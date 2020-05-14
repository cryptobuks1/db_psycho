<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_Banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name', 100);
            $table->string('bank_name_en', 200);
            $table->string('registry_number', 20)->nullable();
            $table->string('bank_swift_code', 20)->unique();
            $table->string('bank_nation_code', 9);
            $table->string('bank_corr_account', 50);
            $table->string('code_reason_number', 50)->nullable();
            $table->integer('country_id')->nullable();//todo сказаьть что id - строка
            $table->string('city_name', 100)->nullable();
            $table->string('city_name_en', 100)->nullable();
            $table->string('bank_remark', 200)->nullable();
            $table->boolean('deleted_l')->nullable();
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
        Schema::dropIfExists('_Banks');
    }
}
