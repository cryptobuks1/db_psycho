<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFeUrlPageThemeToFeUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('FeUrls', function($table) {
            $table->string('fe_url_page_theme', 100)->after('fe_url_footer_bottom')->nullable();
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
            $table->dropColumn('fe_url_page_theme');
        });
    }
}
