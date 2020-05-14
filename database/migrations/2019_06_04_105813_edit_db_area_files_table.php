<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditDbAreaFilesTable extends Migration
{

    public function up()
    {
        Schema::table('DbAreaFiles', function($table) {
            $table->dropColumn('db_area_file_storage_type');
            $table->dropColumn('db_area_file_path');
            $table->dropColumn('db_area_file_bd');
            $table->dropColumn('db_area_file_size');
            $table->dropColumn('file_type_id');

        });
    }

    public function down()
    {
        //
    }
}
