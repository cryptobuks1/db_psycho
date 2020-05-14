<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Consumers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('IsAdmin')->default(2);
            $table->string('consumer_code',100)->nullable();
            $table->string('consumer_login',100)->nullable();
            $table->string('password')->nullable();
            $table->string('consumer_pass')->nullable();
            $table->rememberToken();
            $table->string('consumer_name',100);
            $table->integer('consumer_status_n')->length(2);
            $table->string('email',100)->unique();
            $table->string('email2',100)->nullable();
            $table->string('phone_number',25)->nullable();
            $table->string('url_name',100)->nullable();
            $table->string('first_name',40)->nullable();
            $table->string('last_name',40)->nullable();
            $table->string('middle_name',40)->nullable();
            $table->boolean('male_l')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place',100)->nullable();
//            $table->string('suser_name',100)->nullable();
//            $table->date('modify_date');
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
        Schema::dropIfExists('Consumers');
    }
}
