<?php

use Illuminate\Database\Seeder;

class FeItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeItem::truncate();

        /**/
        \App\Models\FeItem::create([
            'id' => 1,
            'fe_item_code' => 'items_per_page',
            'fe_item_name' => 'Количество элементов в таблице',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeItem::create([
            'id' => 2,
            'fe_item_code' => 'search',
            'fe_item_name' => 'Поиск',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeItem::create([
            'id' => 3,
            'fe_item_code' => 'pagination',
            'fe_item_name' => 'Пагинация',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeItem::create([
            'id' => 4,
            'fe_item_code' => 'button',
            'fe_item_name' => 'Кнопка',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeItem::create([
            'id' => 5,
            'fe_item_code' => 'step_pagination',
            'fe_item_name' => 'Пагинация в Шагах',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);
    }
}
