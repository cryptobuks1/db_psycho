<?php

use Illuminate\Database\Seeder;

class BlScheduleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlScheduleType::truncate();

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlScheduleType::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_schedule_type_name' => 'График платежей',
            'uid_1c_code' => '3e8a12e9-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleType::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_schedule_type_name' => 'График начислений',
            'uid_1c_code' => '3e8a12e8-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleType::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_schedule_type_name' => 'График досрочного выкупа',
            'uid_1c_code' => '3e8a12e6-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blScheduleTypes_id_seq\"', 10, true)");
        }
    }
}
