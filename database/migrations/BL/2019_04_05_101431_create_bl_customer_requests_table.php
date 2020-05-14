<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlCustomerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blCustomerRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessee_contractor_id')->nullable();
            $table->integer('bl_status_id')->nullable();
            $table->integer('db_area_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('lessee_bl_legal_form_id')->nullable();
            $table->integer('supplier_contractor_id')->nullable();
            $table->integer('supplier_bl_legal_form_id')->nullable();
            $table->string('bl_customer_request_number', 15)->nullable();
            $table->date('bl_customer_request_date')->nullable();
            $table->integer('lessee_type')->lenght(1)->nullable();
            $table->string('lessee_name',200)->nullable();
            $table->string('lessee_second_name',100)->nullable();
            $table->string('lessee_first_name',100)->nullable();
            $table->string('lessee_middle_name',100)->nullable();
            $table->string('lessee_person_phone',50)->nullable();
            $table->string('lessee_position',100)->nullable();
            $table->string('lessee_email',50)->nullable();
            $table->string('lessee_inn',12)->nullable();
            $table->string('lessee_kpp',9)->nullable();
            $table->string('lessee_ogrn',15)->nullable();
            $table->string('lessee_legal_address',200)->nullable();
            $table->string('lessee_actual_address',200)->nullable();
            $table->string('lessee_phone',50)->nullable();
            $table->integer('supplier_type')->nullable();
            $table->string('supplier_name',200)->nullable();
            $table->string('supplier_second_name',100)->nullable();
            $table->string('supplier_first_name',100)->nullable();
            $table->string('supplier_middle_name',100)->nullable();
            $table->string('supplier_email',50)->nullable();
            $table->string('supplier_inn',12)->nullable();
            $table->string('supplier_kpp',19)->nullable();
            $table->string('supplier_ogrn',15)->nullable();
            $table->string('supplier_legal_address',200)->nullable();
            $table->string('supplier_actual_address',200)->nullable();
            $table->string('supplier_person_phone',50)->nullable();
            $table->string('supplier_person_FIO',100)->nullable();
            $table->string('supplier_phone',50)->nullable();
            $table->string('supplier_position',100)->nullable();
            $table->string('uid_1c_code',36)->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

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
        Schema::dropIfExists('blCustomerRequests');
    }
}
