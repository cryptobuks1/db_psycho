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


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 1,
            'menu_item_id' => 1,
            'access_role_id' => 8,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 2,
            'menu_item_id' => 1,
            'access_role_id' => 6,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 3,
            'menu_item_id' => 16,
            'access_role_id' => 6,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 4,
            'menu_item_id' => 1,
            'access_role_id' => 7,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 5,
            'menu_item_id' => 7,
            'access_role_id' => 7,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 6,
            'menu_item_id' => 24,
            'access_role_id' => 6,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 7,
            'menu_item_id' => 24,
            'access_role_id' => 7,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 8,
            'menu_item_id' => 33,
            'access_role_id' => 7,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 9,
            'menu_item_id' => 33,
            'access_role_id' => 6,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 20,
            'menu_item_id' => 1,
            'access_role_id' => 4,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 29,
            'menu_item_id' => 1,
            'access_role_id' => 5,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 30,
            'menu_item_id' => 1,
            'access_role_id' => 20,
            'menu_item_view_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 31,
            'menu_item_id' => 133,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 32,
            'menu_item_id' => 134,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 33,
            'menu_item_id' => 135,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 34,
            'menu_item_id' => 136,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 35,
            'menu_item_id' => 137,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\MenuItemAccessRole::create([
            'id' => 36,
            'menu_item_id' => 138,
            'access_role_id' => 20,
            'menu_item_view_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"MenuItemAccessRoles_id_seq\"', 2000, true)");
        }

    }
}
