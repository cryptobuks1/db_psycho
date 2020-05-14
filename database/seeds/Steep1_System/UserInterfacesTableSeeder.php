<?php

use Illuminate\Database\Seeder;

class UserInterfacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserInterface::truncate();


        /**/
        \App\Models\UserInterface::create([
            'id' => 1,
            'user_interface_code' => 'Client',
            'user_interface_name' => 'Веб кабинет клиента',
            'caption_code' => 'СlientWebCabinet',
            'menu_item_id_left' => 120,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => NULL,
            'home_url' => 'leasingCalculations',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\UserInterface::create([
            'id' => 2,
            'user_interface_code' => 'Manager',
            'user_interface_name' => 'Manager interface',
            'caption_code' => 'ManagerWebCabinet',
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
        \App\Models\UserInterface::create([
            'id' => 3,
            'user_interface_code' => 'Administrator',
            'user_interface_name' => 'Administrator interface',
            'caption_code' => 'AdministratorWebCabinet',
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
        \App\Models\UserInterface::create([
            'id' => 4,
            'user_interface_code' => 'Client_Rbl',
            'user_interface_name' => 'Сlient interface',
            'caption_code' => 'СlientWebCabinet',
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
        \App\Models\UserInterface::create([
            'id' => 10,
            'user_interface_code' => 'Administrator_BankNet',
            'user_interface_name' => 'Administrator interface',
            'caption_code' => 'Administrator',
            'menu_item_id_left' => 132,
            'menu_item_id_top' => NULL,
            'home_fe_route_id' => 107,
            'home_url' => 'faq',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);

        /**/
        \App\Models\UserInterface::create([
            'id' => 11,
            'user_interface_code' => 'top_menu_bank_net',
            'user_interface_name' => 'Top Menu Bank Net',
            'caption_code' => '',
            'menu_item_id_left' => null,
            'menu_item_id_top' => 145,
            'home_fe_route_id' => null,
            'home_url' => '',
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 09:00:00',
            'updated_at' => '2019-04-24 09:00:00',
        ]);

    }
}
