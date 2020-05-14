<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToFeurlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('FeUrls', function($table) {
            $table->integer('fe_url_image_id')->nullable();
            $table->text('fe_url_header_top')->nullable();
            $table->text('fe_url_header_bottom')->nullable();
            $table->text('fe_url_info')->nullable();
            $table->text('fe_url_footer_top')->nullable();
            $table->text('fe_url_footer_bottom')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('FeUrls', function($table) {
            $table->dropColumn('fe_url_image_id')->nullable();
            $table->dropColumn('fe_url_header_top')->nullable();
            $table->dropColumn('fe_url_header_bottom')->nullable();
            $table->dropColumn('fe_url_info')->nullable();
            $table->dropColumn('fe_url_footer_top')->nullable();
            $table->dropColumn('fe_url_footer_bottom')->nullable();
        });
    }
}
