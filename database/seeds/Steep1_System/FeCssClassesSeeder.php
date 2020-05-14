<?php

use Illuminate\Database\Seeder;

class FeCssClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeCssClass::truncate();

        /**/
        \App\Models\FeCssClass::create([
            'id' => 1,
            'fe_css_class_code' => 'btn btn-green',
            'fe_css_class_name' => 'btn btn-green',
            'fe_css_class_comment' => 'акцент на ключевых кнопках (напр. РБЛ - красный фон)',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 2,
            'fe_css_class_code' => 'btn btn-grey',
            'fe_css_class_name' => 'btn btn-grey',
            'fe_css_class_comment' => NULL,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 3,
            'fe_css_class_code' => 'btn btn-default',
            'fe_css_class_name' => 'btn btn-default',
            'fe_css_class_comment' => 'класс для фильтра',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 4,
            'fe_css_class_code' => 'btn btn-dropdown',
            'fe_css_class_name' => 'btn btn-dropdown',
            'fe_css_class_comment' => 'класс для раскрывающегося списка',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 5,
            'fe_css_class_code' => 'btn btn-dark ',
            'fe_css_class_name' => 'btn btn-dark ',
            'fe_css_class_comment' => NULL,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 6,
            'fe_css_class_code' => 'btn btn-green focused',
            'fe_css_class_name' => '',
            'fe_css_class_comment' => 'класс для нажатой кнопки',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-08 16:00:00',
            'updated_at' => '2019-05-08 16:00:00',
        ]);


        /**/
        \App\Models\FeCssClass::create([
            'id' => 7,
            'fe_css_class_code' => 'smenu-btn',
            'fe_css_class_name' => 'smenu-btn',
            'fe_css_class_comment' => 'класс для кнопок в faq',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:00',
            'updated_at' => '2019-06-19 16:00:00',
            ]);

    }
}
