<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MenuItem::truncate();



        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"MenuItems_id_seq\"', 1000, true)");
        }

    }
}
