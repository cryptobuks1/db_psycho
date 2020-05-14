<?php

use Illuminate\Database\Seeder;

class AccessRightByRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessRightByRole::truncate();

        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 1,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 2,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 3,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 4,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 9,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 5,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 10,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 5,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 15,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 16,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 23,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 7,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 24,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 7,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 25,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 7,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 31,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 8,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 32,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 8,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 39,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 40,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 41,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 42,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 43,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 44,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 45,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 46,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 47,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 48,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 49,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 50,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 53,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 54,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 55,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 56,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 57,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 58,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 59,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 60,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 61,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 62,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 63,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 64,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 65,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 66,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 67,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 68,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 69,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 70,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 73,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 74,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 75,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 76,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 77,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 78,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 81,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 82,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 83,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 84,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 85,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 86,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 16,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 87,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 88,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 89,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 90,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 91,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 92,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 93,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 94,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 95,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 96,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 97,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 98,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 18,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 101,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 102,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 103,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 104,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 105,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 106,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 19,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 109,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 110,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 111,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 112,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 113,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 114,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 20,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 117,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 118,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 119,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 120,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 121,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 122,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 123,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 124,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 125,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 126,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 127,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 128,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 131,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 132,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 133,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 134,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 135,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 136,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 139,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 140,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 141,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 142,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 143,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 144,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 147,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 148,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 149,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 150,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 151,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 153,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 154,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 155,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 156,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 157,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 158,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 161,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 162,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 163,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 164,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 165,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 166,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 51,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 169,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 170,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 171,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 172,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 173,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 174,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 52,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 175,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 176,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 177,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 178,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 179,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 180,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 53,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 181,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 182,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 183,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 184,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 185,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 186,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 187,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 188,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 189,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 190,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 191,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 192,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 55,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 193,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 194,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 195,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 196,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 197,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 198,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 56,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 199,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 200,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 201,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 202,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 203,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 204,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 57,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 205,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 206,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 207,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 208,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 209,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 210,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 58,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 211,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 212,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 213,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 214,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 215,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 216,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 59,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 217,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 218,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 219,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 220,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 221,
        //            'access_right_id' => 7,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 222,
        //            'access_right_id' => 8,
        //            'access_role_id' => 3,
        //            'controller_id' => 60,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 225,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 226,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 227,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 228,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 229,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 230,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 61,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 231,
        //            'access_right_id' => 1,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 232,
        //            'access_right_id' => 2,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 233,
        //            'access_right_id' => 3,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 234,
        //            'access_right_id' => 4,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 235,
        //            'access_right_id' => 5,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 236,
        //            'access_right_id' => 6,
        //            'access_role_id' => 3,
        //            'controller_id' => 62,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 237,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 238,
        //            'access_right_id' => 2,
        //            'access_role_id' => 4,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 239,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 244,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 5,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 246,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 247,
        //            'access_right_id' => 2,
        //            'access_role_id' => 4,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 254,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 7,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 255,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 7,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 256,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 8,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 258,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 259,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 260,
        //            'access_right_id' => 5,
        //            'access_role_id' => 4,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 261,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 262,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 263,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 10,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 264,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 265,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 266,
        //            'access_right_id' => 5,
        //            'access_role_id' => 4,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 267,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 268,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 269,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 270,
        //            'access_right_id' => 5,
        //            'access_role_id' => 4,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 271,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 272,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 273,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 274,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 13,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 275,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 276,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 277,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 15,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 278,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 279,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 280,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 281,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 21,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 282,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 283,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 284,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 46,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 286,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 287,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 288,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 47,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 290,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 291,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 292,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 48,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 294,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 295,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 296,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 49,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 298,
        //            'access_right_id' => 1,
        //            'access_role_id' => 4,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 299,
        //            'access_right_id' => 3,
        //            'access_role_id' => 4,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 300,
        //            'access_right_id' => 4,
        //            'access_role_id' => 4,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 301,
        //            'access_right_id' => 6,
        //            'access_role_id' => 4,
        //            'controller_id' => 50,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 302,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 303,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 304,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 310,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 311,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 312,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 318,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 319,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 320,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 324,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 325,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 326,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 330,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 331,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 332,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 336,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 337,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 338,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 342,
        //            'access_right_id' => 1,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 343,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 350,
        //            'access_right_id' => 1,
        //            'access_role_id' => 7,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 351,
        //            'access_right_id' => 2,
        //            'access_role_id' => 7,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 352,
        //            'access_right_id' => 3,
        //            'access_role_id' => 7,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 357,
        //            'access_right_id' => 1,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 358,
        //            'access_right_id' => 2,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 359,
        //            'access_right_id' => 3,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //
        //
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 364,
        //            'access_right_id' => 1,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 365,
        //            'access_right_id' => 2,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 366,
        //            'access_right_id' => 3,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 367,
        //            'access_right_id' => 4,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 368,
        //            'access_right_id' => 7,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 369,
        //            'access_right_id' => 8,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 370,
        //            'access_right_id' => 6,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 1,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 2,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 3,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 4,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 5,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 6,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 7,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 8,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 9,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 10,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 11,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 12,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 13,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 14,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 15,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 16,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 17,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 18,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 19,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 20,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 21,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 22,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 23,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 24,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 25,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 26,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 27,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 28,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 29,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 30,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 31,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 32,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 33,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 34,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 35,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 36,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 37,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 38,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 39,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 40,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 41,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 42,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 43,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 44,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 45,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 46,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 47,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 48,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 49,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 50,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 51,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 52,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 53,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 54,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 55,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 56,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 57,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 58,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 59,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 60,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 61,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 62,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 63,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 64,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 65,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 66,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 67,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 68,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 69,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 70,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 71,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 72,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 73,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 74,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 75,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 76,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 77,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 78,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 79,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 80,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 81,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 82,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 83,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 84,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 85,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 86,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 16,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 87,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 88,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 89,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 90,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 91,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 92,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 93,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 94,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 95,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 96,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 97,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 98,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 99,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 100,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 18,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 101,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 102,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 103,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 104,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 105,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 106,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 107,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 108,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 19,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 109,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 110,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 111,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 112,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 113,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 114,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 115,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 116,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 20,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 117,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 118,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 119,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 120,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 121,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 122,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 123,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 124,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 125,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 126,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 127,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 128,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 129,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 130,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 131,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 132,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 133,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 134,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 135,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 136,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 137,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 138,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 139,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 140,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 141,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 142,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 143,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 144,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 145,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 146,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 147,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 148,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 149,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 150,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 151,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 152,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 153,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 154,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 155,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 156,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 157,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 158,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 159,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 160,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 161,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 162,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 163,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 164,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 165,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 166,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 167,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 168,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 51,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 169,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 170,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 171,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 172,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 173,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 174,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 52,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 175,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 176,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 177,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 178,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 179,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 180,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 53,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 181,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 182,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 183,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 184,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 185,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 186,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 187,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 188,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 189,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 190,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 191,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 192,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 55,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 193,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 194,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 195,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 196,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 197,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 198,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 56,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 199,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 200,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 201,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 202,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 203,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 204,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 57,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 205,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 206,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 207,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 208,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 209,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 210,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 58,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 211,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 212,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 213,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 214,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 215,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 216,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 59,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 217,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 218,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 219,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 220,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 221,
            'access_right_id' => 7,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 222,
            'access_right_id' => 8,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 223,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 224,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 60,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 225,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 226,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 227,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 228,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 229,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 230,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 61,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 231,
            'access_right_id' => 1,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 232,
            'access_right_id' => 2,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 233,
            'access_right_id' => 3,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 234,
            'access_right_id' => 4,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 235,
            'access_right_id' => 5,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 236,
            'access_right_id' => 6,
            'access_role_id' => 3,
            'controller_id' => 62,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 237,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 238,
            'access_right_id' => 2,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 239,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 240,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 241,
            'access_right_id' => 7,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 242,
            'access_right_id' => 8,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 243,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 244,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 245,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 246,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 247,
            'access_right_id' => 2,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 248,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 249,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 250,
            'access_right_id' => 7,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 251,
            'access_right_id' => 8,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 252,
            'access_right_id' => 5,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 253,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 254,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 255,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 7,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 256,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 257,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 8,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 258,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 259,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 260,
            'access_right_id' => 5,
            'access_role_id' => 4,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 261,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 262,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 263,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 10,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 264,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 265,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 266,
            'access_right_id' => 5,
            'access_role_id' => 4,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 267,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 268,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 269,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 270,
            'access_right_id' => 5,
            'access_role_id' => 4,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 271,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 272,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 273,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 274,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 13,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 275,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 276,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 277,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 15,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 278,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 279,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 280,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 281,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 21,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 282,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 283,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 284,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 285,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 46,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 286,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 287,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 288,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 289,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 47,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 290,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 291,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 292,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 293,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 48,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 294,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 295,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 296,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 297,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 49,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 298,
            'access_right_id' => 1,
            'access_role_id' => 4,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 299,
            'access_right_id' => 3,
            'access_role_id' => 4,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 300,
            'access_right_id' => 4,
            'access_role_id' => 4,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 301,
            'access_right_id' => 6,
            'access_role_id' => 4,
            'controller_id' => 50,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 302,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);

        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 303,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 304,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 305,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 306,
        //            'access_right_id' => 7,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 307,
        //            'access_right_id' => 8,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 308,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 309,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 4,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 310,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 14,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);

        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 311,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 312,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 313,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 314,
        //            'access_right_id' => 7,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 315,
        //            'access_right_id' => 8,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 316,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 317,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 318,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 319,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 320,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 9,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 321,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 322,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 323,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 9,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 324,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 325,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 326,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 11,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);

        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 327,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 328,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 329,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 11,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 330,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 331,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 17,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 332,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 333,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 334,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 335,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 17,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 336,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 12,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 337,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 338,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 339,
        //            'access_right_id' => 4,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 340,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 341,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 12,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 342,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 343,
        //            'access_right_id' => 2,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 344,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 345,
            'access_right_id' => 4,
            'access_role_id' => 6,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 346,
        //            'access_right_id' => 7,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 347,
        //            'access_right_id' => 8,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 348,
        //            'access_right_id' => 5,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 349,
        //            'access_right_id' => 6,
        //            'access_role_id' => 6,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 350,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 4,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 343,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 357,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 14,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);

        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 358,
        //            'access_right_id' => 2,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 359,
        //            'access_right_id' => 3,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 360,
        //            'access_right_id' => 4,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 361,
        //            'access_right_id' => 7,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 362,
        //            'access_right_id' => 8,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 363,
        //            'access_right_id' => 6,
        //            'access_role_id' => 7,
        //            'controller_id' => 14,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 364,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 365,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);


        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 366,
        //            'access_right_id' => 3,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 367,
            'access_right_id' => 4,
            'access_role_id' => 7,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-10 11:00:00',
            'updated_at' => '2019-05-10 11:00:00',
        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 368,
        //            'access_right_id' => 7,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 369,
        //            'access_right_id' => 8,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 370,
        //            'access_right_id' => 6,
        //            'access_role_id' => 7,
        //            'controller_id' => 6,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-10 11:00:00',
        //            'updated_at' => '2019-05-10 11:00:00',
        //        ]);
        //
        //
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 371,
        //            'access_right_id' => 6,
        //            'access_role_id' => NULL,
        //            'controller_id' => 110,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-05-22 11:00:00',
        //            'updated_at' => '2019-05-22 11:00:00',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 372,
            'access_right_id' => 9,
            'access_role_id' => NULL,
            'controller_id' => 110,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-22 11:00:00',
            'updated_at' => '2019-05-22 11:00:00',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 373,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 112,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:01',
            'updated_at' => '2019-06-10 11:00:01',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 374,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 112,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:02',
            'updated_at' => '2019-06-10 11:00:02',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 375,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 113,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:03',
            'updated_at' => '2019-06-10 11:00:03',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 376,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 113,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:04',
            'updated_at' => '2019-06-10 11:00:04',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 377,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 74,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:05',
            'updated_at' => '2019-06-10 11:00:05',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 378,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 74,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:06',
            'updated_at' => '2019-06-10 11:00:06',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 379,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 72,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:07',
            'updated_at' => '2019-06-10 11:00:07',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 380,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 72,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:08',
            'updated_at' => '2019-06-10 11:00:08',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 381,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 114,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:09',
            'updated_at' => '2019-06-10 11:00:09',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 382,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:10',
            'updated_at' => '2019-06-10 11:00:10',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 383,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:11',
            'updated_at' => '2019-06-10 11:00:11',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 384,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 107,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:12',
            'updated_at' => '2019-06-10 11:00:12',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 385,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 107,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:13',
            'updated_at' => '2019-06-10 11:00:13',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 386,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 107,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:14',
            'updated_at' => '2019-06-10 11:00:14',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 387,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:15',
            'updated_at' => '2019-06-10 11:00:15',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 388,
            'access_right_id' => 3,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:16',
            'updated_at' => '2019-06-10 11:00:16',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 389,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:17',
            'updated_at' => '2019-06-10 11:00:17',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 390,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:18',
            'updated_at' => '2019-06-10 11:00:18',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 391,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:19',
            'updated_at' => '2019-06-10 11:00:19',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 392,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:20',
            'updated_at' => '2019-06-10 11:00:20',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 393,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:21',
            'updated_at' => '2019-06-10 11:00:21',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 394,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 82,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:22',
            'updated_at' => '2019-06-10 11:00:22',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 395,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 82,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:23',
            'updated_at' => '2019-06-10 11:00:23',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 396,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:24',
            'updated_at' => '2019-06-10 11:00:24',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 397,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 84,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:25',
            'updated_at' => '2019-06-10 11:00:25',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 398,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 84,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:26',
            'updated_at' => '2019-06-10 11:00:26',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 399,
            'access_right_id' => 5,
            'access_role_id' => 6,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:27',
            'updated_at' => '2019-06-10 11:00:27',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 400,
            'access_right_id' => 5,
            'access_role_id' => 6,
            'controller_id' => 110,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:28',
            'updated_at' => '2019-06-10 11:00:28',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 401,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 104,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:29',
            'updated_at' => '2019-06-10 11:00:29',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 402,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 104,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:29',
            'updated_at' => '2019-06-10 11:00:29',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 403,
            'access_right_id' => 4,
            'access_role_id' => 6,
            'controller_id' => 83,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 404,
            'access_right_id' => 4,
            'access_role_id' => 7,
            'controller_id' => 83,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 405,
            'access_right_id' => 3,
            'access_role_id' => 6,
            'controller_id' => 114,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:14',
            'updated_at' => '2019-06-10 11:00:14',
        ]);
        //        /**/
        //        \App\Models\AccessRightByRole::create([
        //            'id' => 405,
        //            'access_right_id' => 3,
        //            'access_role_id' => 6,
        //            'controller_id' => 114,
        //            'actual_l' => 1,
        //            'deleted_l' => 0,
        //            'created_by' => 'seed',
        //            'updated_by' => 'seed',
        //            'created_at' => '2019-06-10 11:00:14',
        //            'updated_at' => '2019-06-10 11:00:14',
        //        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 406,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 114,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:14',
            'updated_at' => '2019-06-10 11:00:14',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 407,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 121,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 408,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 121,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 409,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 122,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 410,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 411,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 98,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 412,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 413,
            'access_right_id' => 5,
            'access_role_id' => 7,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 414,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 122,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 415,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 416,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 98,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 417,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 418,
            'access_right_id' => 5,
            'access_role_id' => 6,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 419,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 122,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 420,
            'access_right_id' => 8,
            'access_role_id' => 6,
            'controller_id' => 122,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 421,
            'access_right_id' => 8,
            'access_role_id' => 6,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 422,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 122,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 423,
            'access_right_id' => 8,
            'access_role_id' => 7,
            'controller_id' => 119,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 424,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 425,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 426,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 116,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 427,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 428,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 429,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 116,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 430,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 431,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 432,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 116,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 433,
            'access_right_id' => 10,
            'access_role_id' => 6,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 434,
            'access_right_id' => 10,
            'access_role_id' => 6,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 435,
            'access_right_id' => 10,
            'access_role_id' => 6,
            'controller_id' => 116,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 436,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 437,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 438,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 118,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 439,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 117,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 440,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 441,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 442,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 443,
            'access_right_id' => 10,
            'access_role_id' => 6,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 444,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 445,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 127,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 446,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 128,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 447,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 129,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 448,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 68,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 449,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 68,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 450,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 120,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 451,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 120,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 452,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 130,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 453,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 454,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 455,
            'access_right_id' => 8,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 456,
            'access_right_id' => 8,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 457,
            'access_right_id' => 5,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 458,
            'access_right_id' => 5,
            'access_role_id' => 6,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 459,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 104,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 460,
            'access_right_id' => 10,
            'access_role_id' => 7,
            'controller_id' => 106,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 461,
            'access_right_id' => 7,
            'access_role_id' => 7,
            'controller_id' => 120,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 462,
            'access_right_id' => 7,
            'access_role_id' => 6,
            'controller_id' => 120,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


//        /**/
//        \App\Models\AccessRightByRole::create([
//            'id' => 463,
//            'access_right_id' => 1,
//            'access_role_id' => 6,
//            'controller_id' => 5,
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-10 11:00:30',
//            'updated_at' => '2019-06-10 11:00:30',
//        ]);
//        /**/
//        \App\Models\AccessRightByRole::create([
//            'id' => 464,
//            'access_right_id' => 1,
//            'access_role_id' => 7,
//            'controller_id' => 5,
//            'actual_l' => 1,
//            'deleted_l' => 0,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-06-10 11:00:30',
//            'updated_at' => '2019-06-10 11:00:30',
//        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 465,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 150,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 466,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 151,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 467,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 152,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 468,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 153,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 469,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 158,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 470,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 159,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 471,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 160,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 472,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 161,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 473,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 162,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 474,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 156,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 475,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 156,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 476,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 177,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 477,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 177,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 478,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 179,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 479,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 179,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 480,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 134,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 481,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 134,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 482,
            'access_right_id' => 1,
            'access_role_id' => 7,
            'controller_id' => 180,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 483,
            'access_right_id' => 1,
            'access_role_id' => 6,
            'controller_id' => 180,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 484,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 180,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);
        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 485,
            'access_right_id' => 2,
            'access_role_id' => 6,
            'controller_id' => 180,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 486,
            'access_right_id' => 2,
            'access_role_id' => 7,
            'controller_id' => 104,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 490,
            'access_right_id' => 3,
            'access_role_id' => 20,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 491,
            'access_right_id' => 1,
            'access_role_id' => 20,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 492,
            'access_right_id' => 2,
            'access_role_id' => 20,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 493,
            'access_right_id' => 5,
            'access_role_id' => 20,
            'controller_id' => 115,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 494,
            'access_right_id' => 1,
            'access_role_id' => 20,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);


        /**/
        \App\Models\AccessRightByRole::create([
            'id' => 495,
            'access_right_id' => 2,
            'access_role_id' => 20,
            'controller_id' => 6,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 11:00:30',
            'updated_at' => '2019-06-10 11:00:30',
        ]);

        if (config("database.default") == "pgsql")
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_AccessRightByRoles_id_seq\"', 600, true)");


    }


}
