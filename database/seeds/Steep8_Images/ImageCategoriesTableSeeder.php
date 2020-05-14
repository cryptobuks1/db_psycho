<?php

use Illuminate\Database\Seeder;

class ImageCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ImageCategory::truncate();

        /**/
        \App\Models\ImageCategory::create([
            'id' => 1,
            'image_category_code' => 'Crypto',
            'image_category_name' => 'Crypto',
            'image_category_path' => 'public/img/crypto',
            'image_category_remark' => 'Картинки для Крито учета',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 2,
            'image_category_code' => 'MenuDashBoard',
            'image_category_name' => 'Menu DashBoard',
            'image_category_path' => 'public/img/menudashboard',
            'image_category_remark' => 'Картинки для Полного Меню DashBoard',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 3,
            'image_category_code' => 'MenuRBL',
            'image_category_name' => 'Menu RBL',
            'image_category_path' => 'public/img/menurbl',
            'image_category_remark' => 'Картинки для Меню RBL',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 4,
            'image_category_code' => 'InterfaceDashBoard',
            'image_category_name' => 'Menu DashBoard',
            'image_category_path' => 'public/img/interfacedashboard',
            'image_category_remark' => 'Картинки для Полного Интрерфейса DashBoard',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 5,
            'image_category_code' => 'InterfaceRBL',
            'image_category_name' => 'Menu RBL',
            'image_category_path' => 'public/img/interfacerbl',
            'image_category_remark' => 'Картинки для Интрерфейса RBL',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 6,
            'image_category_code' => 'Currencies',
            'image_category_name' => 'Currencies',
            'image_category_path' => 'public/img/currencies',
            'image_category_remark' => 'Картинки для Валют',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);


        /**/
        \App\Models\ImageCategory::create([
            'id' => 7,
            'image_category_code' => 'Countries',
            'image_category_name' => 'Countries',
            'image_category_path' => 'public/img/countries',
            'image_category_remark' => 'Картинки для Стран',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 17:00:00',
            'updated_at' => '2019-04-22 17:00:00',
        ]);

    }
}
