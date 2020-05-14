<?php

use Illuminate\Database\Seeder;

class BlLeasingObjectBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingObjectBrand::truncate();

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 1,
            'bl_leasing_object_brand_name' => 'КАМАЗ',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '85490087-bff5-11e8-8102-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_name' => 'Audi',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => 'cd73a2fc-5d9d-11e8-80fb-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_name' => 'Fiat',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_name' => 'LADA',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_name' => 'SKODA',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '62ee360d-e3f6-11e8-8106-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 6,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_name' => 'BMW',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => 'e7b21838-ff6b-11e7-9955-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 7,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 3,
            'bl_leasing_object_brand_name' => 'МАЗ',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 8,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 4,
            'bl_leasing_object_brand_name' => 'КАМАЗ',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => '9c49bffd-75ff-11e8-80fd-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectBrand::create([
            'id' => 9,
            'db_area_id' => 6,
            'bl_leasing_object_type_id' => 5,
            'bl_leasing_object_brand_name' => 'Кран',
            'bl_leasing_object_brand_full_name' => '',
            'uid_1c_code' => 'd23b74b0-fec6-11e8-810b-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingObjectBrands_id_seq\"', 10, true)");
        }

    }
}
