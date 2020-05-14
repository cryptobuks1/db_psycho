<?php

use Illuminate\Database\Seeder;

class BlLeasingObjectModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingObjectModel::truncate();

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 1,
            'bl_leasing_object_model_name' => '3255',
            "bl_leasing_object_model_issue_year" => '2014',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_name' => 'A1',
            "bl_leasing_object_model_issue_year" => '2010',
            'uid_1c_code' => 'fe5e9338-6a6a-11e8-80fb-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 1,
            'bl_leasing_object_model_name' => '5490',
            "bl_leasing_object_model_issue_year" => '2016',
            'uid_1c_code' => '95313a40-bff5-11e8-8102-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_name' => 'A8',
            "bl_leasing_object_model_issue_year" => '2019',
            'uid_1c_code' => 'fe5e933f-6a6a-11e8-80fb-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 5,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_name' => 'R8',
            "bl_leasing_object_model_issue_year" => '2010',
            'uid_1c_code' => 'fe5e9344-6a6a-11e8-80fb-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 6,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 3,
            'bl_leasing_object_model_name' => 'Tipo HB',
            "bl_leasing_object_model_issue_year" => '2019',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 7,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 3,
            'bl_leasing_object_model_name' => 'Tipo',
            "bl_leasing_object_model_issue_year" => '2019',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 8,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 4,
            'bl_leasing_object_model_name' => 'Granta',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 9,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 4,
            'bl_leasing_object_model_name' => 'XRAY',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 10,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 4,
            'bl_leasing_object_model_name' => '4x4 5D Urban',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 11,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 5,
            'bl_leasing_object_model_name' => 'OCTAVIA',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '402983f8-0923-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /**/
        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 12,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 5,
            'bl_leasing_object_model_name' => 'Rapid',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);        /**/

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 13,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 5,
            'bl_leasing_object_model_name' => 'Karoq',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 14,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 6,
            'bl_leasing_object_model_name' => 'X5',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 15,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 6,
            'bl_leasing_object_model_name' => 'i8',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 16,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 6,
            'bl_leasing_object_model_name' => 'X6',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '5e2d22ad-ff78-11e7-9955-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 17,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 7,
            'bl_leasing_object_model_name' => 'КС-5571ВY-С-22 32т. 28м. 4 секц',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 18,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 9,
            'bl_leasing_object_model_name' => 'КР-777',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '5a897ce5-40ee-11ea-a042-708bcda427ce',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlLeasingObjectModel::create([
            'id' => 19,
            'db_area_id' => 6,
            'bl_leasing_object_brand_id' => 8,
            'bl_leasing_object_model_name' => '6520',
            "bl_leasing_object_model_issue_year" => '',
            'uid_1c_code' => '7a448cd3-fe08-11e8-810b-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingObjectModels_id_seq\"', 20, true)");
        }
    }
}
