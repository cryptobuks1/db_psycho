<?php

use Illuminate\Database\Seeder;

class BlLeasingObjectGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingObjectGroup::truncate();

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Новая группа 1',
            'uid_1c_code' => '6044a69e-3cf4-11ea-9d69-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 1,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Новая группа 1',
            'uid_1c_code' => '006d40bf-3d1c-11ea-9d69-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 2,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Группа грузовики',
            'uid_1c_code' => 'dae683c5-40e3-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 3,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Группа краны',
            'uid_1c_code' => '18320b05-40e4-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 3,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Новая группа 1',
            'uid_1c_code' => '86e6b875-4107-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 4,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 6,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Новая группа 1',
            'uid_1c_code' => 'db9d4e85-4281-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 5,
        ]);

        \App\Models\BL\BlLeasingObjectGroup::create([
            'id' => 7,
            'db_area_id' => 6,
            'bl_leasing_object_group_name' => 'Новая группа 1',
            'uid_1c_code' => 'a5b0d865-4285-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
            'bl_customer_request_id' => 6,
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingObjectGroups_id_seq\"', 10, true)");
        }

    }
}
