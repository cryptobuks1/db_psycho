<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerAccessRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ConsumerAccessRows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_id')->lenght(4);
            $table->integer('db_area_id')->lenght(4);
            $table->integer('access_type_id')->lenght(4);
            $table->integer('contractor_id')->lenght(4)->nullable();
            $table->integer('company_id')->lenght(4)->nullable();
            $table->boolean('actual_l')->default(0);
            $table->boolean('read_only_l');
            $table->string('consumer_access_row_type_n')->lenght(2);
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();

            $table->timestamps();

            //$table->date('modify_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ConsumerAccessRows');
    }
}
