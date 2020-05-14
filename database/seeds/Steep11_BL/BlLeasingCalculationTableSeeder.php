<?php

use Illuminate\Database\Seeder;

class BlLeasingCalculationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingCalculation::truncate();

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 1,
            'bl_status_id' => NULL,
            'bl_leasing_contract_specification_id' => NULL,
            'bl_leasing_object_group_id' => 1,
            'table_n_base' => 81,
            'row_id_base' => 1,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000001',
            'bl_leasing_calculation_date' => '2020-01-10 09:21:20',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => '1d4e04fb-3e7a-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 2,
            'bl_status_id' => NULL,
            'bl_leasing_contract_specification_id' => NULL,
            'bl_leasing_object_group_id' => 2,
            'table_n_base' => 81,
            'row_id_base' => 2,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000002',
            'bl_leasing_calculation_date' => '2020-01-15 15:36:35',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => '6c9f946b-3eac-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 3,
            'bl_status_id' => 2,
            'bl_leasing_contract_specification_id' => 1,
            'bl_leasing_object_group_id' => 1,
            'table_n_base' => 86,
            'row_id_base' => 1,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000003',
            'bl_leasing_calculation_date' => '2020-01-15 09:36:35',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => '06f847bf-3eb6-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 4,
            'bl_status_id' => null,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_object_group_id' => 5,
            'table_n_base' => 81,
            'row_id_base' => 4,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000004',
            'bl_leasing_calculation_date' => '2020-01-16 10:10:10',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => 'ec737645-4113-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 5,
            'bl_status_id' => null,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_object_group_id' => 5,
            'table_n_base' => 81,
            'row_id_base' => 4,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000005',
            'bl_leasing_calculation_date' => '2020-01-16 11:11:11',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => 'c56b1995-4122-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 6,
            'bl_status_id' => null,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_object_group_id' => 6,
            'table_n_base' => 81,
            'row_id_base' => 5,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000007',
            'bl_leasing_calculation_date' => '2020-01-16 09:55:20',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => 'a00ada35-4287-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        \App\Models\BL\BlLeasingCalculation::create([
            'id' => 7,
            'bl_status_id' => null,
            'bl_leasing_contract_specification_id' => null,
            'bl_leasing_object_group_id' => 7,
            'table_n_base' => 81,
            'row_id_base' => 6,
            'company_id' => 5,
            'currency_id' => 1,
            'bl_leasing_calculation_number' => '0000-000008',
            'bl_leasing_calculation_date' => '2020-01-16 10:11:20',
            'bl_leasing_calculation_kind' => 'Первичный расчет',
            'deleted_l' => 0,
            'uid_1c_code' => '0a0df735-428f-11ea-a042-708bcda427ce',
            'db_area_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-10 09:21:20',
            'updated_at' => '2020-01-10 09:21:20',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingCalculations_id_seq\"', 20, true)");
        }
    }
}
