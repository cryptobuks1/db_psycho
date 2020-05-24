<?php

use Illuminate\Database\Seeder;

class MenuItemAccessRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MenuItemAccessRole::truncate();



        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"MenuItemAccessRoles_id_seq\"', 1000, true)");
        }

    }
}
