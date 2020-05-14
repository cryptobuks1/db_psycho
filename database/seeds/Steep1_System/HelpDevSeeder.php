<?php

use Illuminate\Database\Seeder;

class HelpDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Help::truncate();


        \App\Models\Help::create([
            "id"                    =>"1",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Регистрация предмета лизинга",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"2",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Правила лизинга",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"3",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Лизинговые платежи",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"4",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Стоимость услуги лизинга и счета-фактуры",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"5",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Страхование и страховые случаи",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"6",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Получение и восстановление документов",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"7",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Доступ в личный кабинет",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"8",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Подача заявки на лизинг",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"9",
            "image_id"              =>"24",
            "page_id"               =>null,
            "help_parent_id"  =>null,
            "group_l"               =>false,
            "help_code"             =>"",
            "help_title"            =>"Общие вопросы по лизингу",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"10",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"1",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"11",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"1",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"12",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"2",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"13",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"2",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"14",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"3",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"15",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"3",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"16",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"4",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"17",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"4",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"18",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"5",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"19",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"5",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"20",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"6",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"21",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"6",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"22",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"7",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"23",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"7",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"24",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"8",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"25",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"8",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"26",
            "image_id"              =>"23",
            "page_id"               =>"0",
            "help_parent_id"        =>"9",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Как получить кредит",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);
        \App\Models\Help::create([
            "id"                    =>"27",
            "image_id"              =>"23",
            "page_id"               =>"1",
            "help_parent_id"        =>"9",
            "group_l"               =>true,
            "help_code"             =>"",
            "help_title"            =>"Что такое справка о доходах",
            "help_description"      =>"",
            "actual_l"              =>false,
            "deleted_l"             =>false,

            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);




    }
}
