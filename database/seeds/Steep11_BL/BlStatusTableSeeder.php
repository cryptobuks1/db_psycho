<?php

use Illuminate\Database\Seeder;

class BlStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlStatus::truncate();

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\BL\BlStatus::create([
            //'id' => 1,
            'db_area_id' => 6,
            'bl_status_name' => 'Расчет не утвержден',
            'uid_1c_code' => '39820f89-d6b0-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 2,
            'db_area_id' => 6,
            'bl_status_name' => 'Расчет утвержден',
            'uid_1c_code' => '39820f8a-d6b0-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 3,
            'db_area_id' => 6,
            'bl_status_name' => 'Новое обращение',
            'uid_1c_code' => 'e0656bb3-01b0-11e8-848d-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 7,
            'bl_status_name' => 'Запрос в обработке',
            'uid_1c_code' => 'e0656bb3-01b0-11e8-848d-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Черновик',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Отправлен',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'В обработке',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Обращение утверждено',
            'uid_1c_code' => '39820f83-d6b0-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Действующий',
            'uid_1c_code' => '39820f6f-d6b0-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Обращение не утверждено',
            'uid_1c_code' => '39820f82-d6b0-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\BL\BlStatus::create([
            //'id' => 4,
            'db_area_id' => 6,
            'bl_status_name' => 'Согласование расчёта',
            'uid_1c_code' => '05ca6487-1ba0-11e8-b9df-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blStatuses_id_seq\"', 20, true)");
        }
    }
}
