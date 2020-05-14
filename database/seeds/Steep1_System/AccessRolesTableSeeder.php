<?php

use Illuminate\Database\Seeder;

class AccessRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessRole::truncate();

        /**/
        \App\Models\AccessRole::create([
            'id' => 1,
            'access_role_code' => 'Company',
            'access_role_name' => 'Company',
            'user_interface_id' => NULL,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 2,
            'access_role_code' => 'Contractor',
            'access_role_name' => 'Contractor',
            'user_interface_id' => NULL,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 3,
            'access_role_code' => 'manager',
            'access_role_name' => 'manager',
            'user_interface_id' => NULL,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 4,
            'access_role_code' => 'user',
            'access_role_name' => 'user',
            'user_interface_id' => 1,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 5,
            'access_role_code' => 'administrator',
            'access_role_name' => 'administrator',
            'user_interface_id' => 10,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 6,
            'access_role_code' => 'Rbl_manager',
            'access_role_name' => 'manager RBL',
            'user_interface_id' => 2,
            'menu_item_id_left' => 2,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => 'statistics',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 7,
            'access_role_code' => 'Rbl_user',
            'access_role_name' => 'user RBL',
            'user_interface_id' => 4,
            'menu_item_id_left' => 2,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => 'customerRequests',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 8,
            'access_role_code' => 'Rbl_administrator',
            'access_role_name' => 'administrator RBL',
            'user_interface_id' => 3,
            'menu_item_id_left' => 2,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => 'statistics',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 9,
            'access_role_code' => 'developer',
            'access_role_name' => 'developer tester',
            'user_interface_id' => NULL,
            'menu_item_id_left' => 1,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessRole::create([
            'id' => 20,
            'access_role_code' => 'Bn_administrator',
            'access_role_name' => 'administrator BankNet',
            'user_interface_id' => 10,
            'menu_item_id_left' => NULL,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => '',
            'actual_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);

    }
}
