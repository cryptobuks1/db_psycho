<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtValidationRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QTValidationRules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qt_validation_id');
            $table->string('validation_rule_name', 100);
            $table->string('validation_value', 255);
            $table->boolean('deleted_l');
            $table->boolean('active_l');
            $table->string('created_by', 20);
            $table->string('updated_by', 20);
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
        Schema::dropIfExists('QTValidationRules');
    }
}
