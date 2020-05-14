<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PartnerEmployees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("partner_id")->nullable();
            $table->string("partner_employee_name", 100)->nullable();
            $table->string("partner_employee_position", 100)->nullable();
            $table->string("uid_1c_code", 36)->nullable();
            $table->boolean("deleted_l")->nullable();
            $table->boolean("actual_l")->nullable();
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
        Schema::dropIfExists('PartnerEmployees');
    }
}
