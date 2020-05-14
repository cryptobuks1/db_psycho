<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePhotoFromConsumers extends Migration
{
    public function up()
    {
        Schema::table('Consumers', function($table) {
            $table->dropColumn('photo');
        });
    }

    public function down()
    {
        Schema::table('Consumers', function($table) {
            $table->text('photo')->nullable();
        });
    }
}
