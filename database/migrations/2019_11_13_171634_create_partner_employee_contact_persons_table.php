<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerEmployeeContactPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PartnerEmployeeContactPersons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("partner_employee_id")->nullable();
            $table->integer("contact_person_id")->nullable();
            $table->integer("line_n")->nullable();
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
        Schema::dropIfExists('PartnerEmployeeContactPersons');
    }
}
