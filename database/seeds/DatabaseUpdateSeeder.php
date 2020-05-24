<?php

use App\Models\AccessRight;
use Illuminate\Database\Seeder;

class DatabaseUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MenuItemAccessRolesSeeder::class);
    }
}
