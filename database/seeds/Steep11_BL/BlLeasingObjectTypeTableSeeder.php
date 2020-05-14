<?php

use Illuminate\Database\Seeder;

class BlLeasingObjectTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingObjectType::truncate();

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\BL\BlLeasingObjectType::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_leasing_object_type_name' => 'Тягач',
            'bl_leasing_object_type_name_en' => 'ROAD TRACTOR',
            'uid_1c_code' => '42e11020-bb12-11e8-8102-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectType::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_leasing_object_type_name' => 'Легковой автомобиль',
            'bl_leasing_object_type_name_en' => 'PASSENGER CARS',
            'uid_1c_code' => 'c2c882c8-4ac3-11e8-80fe-00505688e016',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectType::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_leasing_object_type_name' => 'Грузовой автомобиль (полная масса свыше 3,5 т)',
            'bl_leasing_object_type_name_en' => 'RIGID TRUCK',
            'uid_1c_code' => 'c2c882c4-4ac3-11e8-80fe-00505688e016',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectType::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_leasing_object_type_name' => 'Самосвал',
            'bl_leasing_object_type_name_en' => 'DUMPTRUCK',
            'uid_1c_code' => 'c2c882c7-4ac3-11e8-80fe-00505688e016',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectType::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_leasing_object_type_name' => 'Строительное оборудование',
            'bl_leasing_object_type_name_en' => 'CONSTRUCTION EQUIPMENT',
            'uid_1c_code' => 'c2c882cd-4ac3-11e8-80fe-00505688e016',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingObjectTypes_id_seq\"', 10, true)");
        }
    }
}
