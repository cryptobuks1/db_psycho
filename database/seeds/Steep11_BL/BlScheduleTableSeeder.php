<?php

use Illuminate\Database\Seeder;

class BlScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlSchedule::truncate();

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 1,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000001 от 10.01.2020 9:21:20',
            'uid_1c_code' => '4bac3d7b-3e8f-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 2,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000002 от 15.01.2020 15:36:35',
            'uid_1c_code' => '0b78dceb-3ead-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 3,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000003 от 15.01.2020 9:36:35',
            'uid_1c_code' => '06f847c0-3eb6-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 4,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000004 от 16.01.2020 10:10:10',
            'uid_1c_code' => '508ff8b5-4114-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 4,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000005 от 16.01.2020 11:11:11',
            'uid_1c_code' => 'a6830055-4123-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 6,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 6,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000007 от 16.01.2020 9:55:20',
            'uid_1c_code' => '090d85e5-4289-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Графики Справочники.блГрафики'*/
        \App\Models\BL\BlSchedule::create([
            'id' => 7,
            'db_area_id' => 6,
            'bl_leasing_calculation_id' => 7,
            'company_id' => 5,
            'contractor_id' => NULL,
            'bl_schedule_type_id' => 1,
            'bl_schedule_name' => 'График платежей Лизинговый расчет 0000-000008 от 16.01.2020 10:11:20',
            'uid_1c_code' => '1975b935-4292-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blSchedules_id_seq\"', 10, true)");
        }
    }
}
