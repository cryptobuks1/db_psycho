<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeRouteUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FeRouteUrls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fe_route_id')->nullable();
            $table->integer('fe_url_id')->nullable();
            $table->string('fe_route_url_parameter',50)->nullable();
            $table->integer('line_n')->nullable();
            $table->boolean('use_card_l')->nullable();
            $table->boolean('actual_l')->nullable();
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
        Schema::dropIfExists('FeRouteUrls');
    }
}
