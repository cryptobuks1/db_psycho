<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStoredFilesTable extends Migration
{

    public function up()
    {
        Schema::table('StoredFiles', function($table) {
            $table->tinyInteger('stored_file_storage_type')->nullable();
            $table->string('stored_file_path', 200)->nullable();
            $table->longText('stored_file_bd')->nullable();
            $table->dropColumn('table_file_field')->nullable();
        });
    }

    public function down()
    {
        Schema::table('StoredFiles', function($table) {
            $table->dropColumn('stored_file_storage_type');
            $table->dropColumn('stored_file_path');
            $table->dropColumn('stored_file_bd');
        });
    }
}
