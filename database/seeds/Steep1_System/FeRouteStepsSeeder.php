<?php

use Illuminate\Database\Seeder;

class FeRouteStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FeRouteStep::truncate();


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 1,
            'fe_route_id' => 87,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'line_n' => 0,
            'fe_route_step_code' => 'step6',
            'fe_route_step_name' => 'Финиш',
            'fe_route_step_title' => 'Шаг 6',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-03 16:29:50',
            'updated_at' => '2019-05-03 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 2,
            'fe_route_id' => 87,
            'fe_component_id' => 3,
            'be_route_id' => 446,
            'line_n' => 1,
            'fe_route_step_code' => 'step1',
            'fe_route_step_name' => 'Скачать Анкету',
            'fe_route_step_title' => 'Шаг 1',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);



        /**/
        \App\Models\FeRouteStep::create([
            'id' => 4,
            'fe_route_id' => 87,
            'fe_component_id' => 24,
            'be_route_id' => 441,
            'line_n' => 2,
            'fe_route_step_code' => 'step2',
            'fe_route_step_name' => 'Загрузить документы',
            'fe_route_step_title' => 'Шаг 2',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 5,
            'fe_route_id' => 87,
            'fe_component_id' => 25,
            'be_route_id' => 597,
            'line_n' => 3,
            'fe_route_step_code' => 'step3',
            'fe_route_step_name' => 'Отправить Заявку',
            'fe_route_step_title' => 'Шаг 3',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 66,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);



//        /**/
//        \App\Models\FeRouteStep::create([
//            'id' => 6,
//            'fe_route_id' => 87,
//            'fe_component_id' => 22,
//            'be_route_id' => 401,
//            'line_n' => 5,
//            'fe_route_step_code' => 'step5',
//            'fe_route_step_name' => 'Разработка',
//            'fe_route_step_title' => 'Шаг 5',
//            'create_fe_route_step_object_l' => 0,
//            'deleted_l' => 0,
//            'fe_url_id' => 5,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-05-03 16:29:50',
//            'updated_at' => '2019-05-03 16:29:50',
//            ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 7,
            'fe_route_id' => 84,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'line_n' => 0,
            'fe_route_step_code' => 'step7',
            'fe_route_step_name' => 'Финальная страница',
            'fe_route_step_title' => 'Шаг 7',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 8,
            'fe_route_id' => 84,
            'fe_component_id' => 3,
            'be_route_id' => 428,
            'line_n' => 1,
            'fe_route_step_code' => 'step1',
            'fe_route_step_name' => 'Оформление заявки',
            'fe_route_step_title' => 'Шаг 1',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 9,
            'fe_route_id' => 84,
            'fe_component_id' => 10,
            'be_route_id' => 221,
            'line_n' => 2,
            'fe_route_step_code' => 'step2',
            'fe_route_step_name' => 'Формирование КП',
            'fe_route_step_title' => 'Шаг 2',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 10,
            'fe_route_id' => 84,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'line_n' => 3,
            'fe_route_step_code' => 'step3',
            'fe_route_step_name' => 'Отправить на согласование',
            'fe_route_step_title' => 'Шаг 3',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 11,
            'fe_route_id' => 84,
            'fe_component_id' => 3,
            'be_route_id' => 446,
            'line_n' => 4,
            'fe_route_step_code' => 'step4',
            'fe_route_step_name' => 'Документы для предоставления',
            'fe_route_step_title' => 'Шаг 4',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 12,
            'fe_route_id' => 84,
            'fe_component_id' => 24,
            'be_route_id' => 441,
            'line_n' => 5,
            'fe_route_step_code' => 'step5',
            'fe_route_step_name' => 'Предоставление документов',
            'fe_route_step_title' => 'Шаг 5',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRouteStep::create([
            'id' => 13,
            'fe_route_id' => 84,
            'fe_component_id' => 25,
            'be_route_id' => 495,
            'line_n' => 6,
            'fe_route_step_code' => 'step6',
            'fe_route_step_name' => 'Отправить заявку',
            'fe_route_step_title' => 'Шаг 6',
            'create_fe_route_step_object_l' => 0,
            'deleted_l' => 0,
            'fe_url_id' => 66,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-03 16:29:50',
            'updated_at' => '2019-05-03 16:29:50',
        ]);

/**/
\App\Models\FeRouteStep::create([
	'id' => 14,
	'fe_route_id' => 227,
	'fe_component_id' => 27,
	'be_route_id' => 572,
	'line_n' => 1,
	'fe_route_step_code' => 'step1',
	'fe_route_step_name' => 'Заполнить анкету',
	'fe_route_step_title' => 'Шаг 1',
	'create_fe_route_step_object_l' => 1,
	'deleted_l' => 0,
	'fe_url_id' => 5,
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-05-03 16:29:50',
	'updated_at' => '2019-05-03 16:29:50',
	]);
/**/
\App\Models\FeRouteStep::create([
	'id' => 15,
	'fe_route_id' => 227,
	'fe_component_id' => 22,
	'be_route_id' => 401,
	'line_n' => 0,
	'fe_route_step_code' => 'step6',
	'fe_route_step_name' => 'Финиш',
	'fe_route_step_title' => 'Шаг 6',
	'create_fe_route_step_object_l' => 0,
	'deleted_l' => 0,
	'fe_url_id' => 49,
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-05-03 16:29:50',
	'updated_at' => '2019-05-03 16:29:50',
	]);
/**/
\App\Models\FeRouteStep::create([
	'id' => 16,
	'fe_route_id' => 227,
	'fe_component_id' => 3,
	'be_route_id' => 446,
	'line_n' => 2,
	'fe_route_step_code' => 'step2',
	'fe_route_step_name' => 'Скачать Анкету',
	'fe_route_step_title' => 'Шаг 2',
	'create_fe_route_step_object_l' => 0,
	'deleted_l' => 0,
	'fe_url_id' => 5,
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-04-10 16:29:50',
	'updated_at' => '2019-04-10 16:29:50',
	]);
/**/
\App\Models\FeRouteStep::create([
	'id' => 17,
	'fe_route_id' => 227,
	'fe_component_id' => 24,
	'be_route_id' => 441,
	'line_n' => 3,
	'fe_route_step_code' => 'step3',
	'fe_route_step_name' => 'Загрузить документы',
	'fe_route_step_title' => 'Шаг 3',
	'create_fe_route_step_object_l' => 0,
	'deleted_l' => 0,
	'fe_url_id' => 5,
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-04-10 16:29:50',
	'updated_at' => '2019-04-10 16:29:50',
	]);
/**/
\App\Models\FeRouteStep::create([
	'id' => 18,
	'fe_route_id' => 227,
	'fe_component_id' => 25,
	'be_route_id' => 597,
	'line_n' => 4,
	'fe_route_step_code' => 'step4',
	'fe_route_step_name' => 'Отправить Заявку',
	'fe_route_step_title' => 'Шаг 4',
	'create_fe_route_step_object_l' => 0,
	'deleted_l' => 0,
	'fe_url_id' => 66,
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-04-10 16:29:50',
	'updated_at' => '2019-04-10 16:29:50',
	]);
        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"FeRoutesSteps_id_seq\"', 100, true)");
        }

    }


}
