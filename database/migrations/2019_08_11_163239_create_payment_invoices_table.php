<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PaymentInvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("contractor_contract_id")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("db_area_id")->nullable();
            $table->integer("stored_file_id")->nullable();
            $table->integer("contractor_id")->nullable();
            $table->string('uid_1c_code', 36)->nullable();
            $table->string('doc_number', 50)->nullable();
            $table->date("doc_date")->nullable();
            $table->decimal("doc_sum", 15, 2)->nullable();
            $table->boolean("actual_l")->nullable();
            $table->boolean("deleted_l")->nullable();
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
        Schema::dropIfExists('PaymentInvoices');
    }
}
