<?php
// Bogdan Yartsun 4.04.2019 10:00

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlLeasingObjectGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blLeasingObjectGroups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('db_area_id')->nullable();
            $table->string('bl_leasing_object_group_name','150')->nullable();
            $table->string('uid_1c_code','36')->nullable();
            $table->boolean('deleted_l')->nullable();
            $table->string('created_by','20')->nullable();
            $table->string('updated_by','20')->nullable();
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
        Schema::dropIfExists('blLeasingObjectGroups');
    }
}
