<?php

use Illuminate\Database\Seeder;

class AccessRightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessRight::truncate();


        /**/
        \App\Models\AccessRight::create([
            'id' => 1,
            'access_right_code' => 'read',
            'access_right_name' => 'read',
            'access_right_remark' => 'read',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 2,
            'access_right_code' => 'record',
            'access_right_name' => 'record',
            'access_right_remark' => 'Запись данных. Инициализируется при Insert и Update.',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 3,
            'access_right_code' => 'insert',
            'access_right_name' => 'insert',
            'access_right_remark' => 'insert',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 4,
            'access_right_code' => 'update',
            'access_right_name' => 'update',
            'access_right_remark' => 'update',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 5,
            'access_right_code' => 'delete',
            'access_right_name' => 'delete',
            'access_right_remark' => 'delete',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 6,
            'access_right_code' => 'deleteMark',
            'access_right_name' => 'deleteMark',
            'access_right_remark' => 'deleteMark',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 7,
            'access_right_code' => 'download',
            'access_right_name' => 'download',
            'access_right_remark' => 'download',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 8,
            'access_right_code' => 'upload',
            'access_right_name' => 'upload',
            'access_right_remark' => 'upload',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 9,
            'access_right_code' => 'actualMark',
            'access_right_name' => 'actualMark',
            'access_right_remark' => 'actualMark',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 10,
            'access_right_code' => 'sendRequest',
            'access_right_name' => 'sendRequest',
            'access_right_remark' => 'sendRequest',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 16:00:00',
            'updated_at' => '2019-05-17 16:00:00',
        ]);


        /**/
        \App\Models\AccessRight::create([
            'id' => 12,
            'access_right_code' => 'filter',
            'access_right_name' => 'filter',
            'access_right_remark' => 'Права на использование сложного фильтра в списке',
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-25 16:00:00',
            'updated_at' => '2019-09-25 16:00:00',
            ]);


    }
}
