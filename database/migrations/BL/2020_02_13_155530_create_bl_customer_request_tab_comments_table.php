<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlCustomerRequestTabCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blCustomerRequestTabComments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer("bl_customer_request_id");
            $table->integer("line_n")->nullable();
            $table->string("comments_system", 10)->nullable();
            $table->string("comments_guid", 36)->nullable();
            $table->text("comments_description")->nullable();
            $table->string("comments_author", 100)->nullable();
            $table->dateTime("comments_date")->nullable();
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
        Schema::dropIfExists('blCustomerRequestTabComments');
    }
}
