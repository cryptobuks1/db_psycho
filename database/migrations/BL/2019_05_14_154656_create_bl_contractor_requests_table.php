<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlContractorRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blContractorRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bl_contractor_request_title', 200)->nullable();
            $table->integer('contractor_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('bl_status_id')->nullable();
            $table->integer('bl_contractor_request_type_id')->nullable();
            $table->text('bl_contractor_request_description')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->string('uid_1c_code', 36)->nullable();
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
        Schema::dropIfExists('blContractorRequests');
    }
}
