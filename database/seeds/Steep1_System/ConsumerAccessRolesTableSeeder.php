<?php

use Illuminate\Database\Seeder;

class ConsumerAccessRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ConsumerAccessRole::truncate();

        //        \App\Models\ConsumerAccessRole::create([
        //            "id" => 1,
        //            "access_role_id" => "1",
        //            "consumer_id" => "1",
        //        ]);
        //
        //        \App\Models\ConsumerAccessRole::create([
        //            "id" => 2,
        //            "access_role_id" => "3",
        //            "consumer_id" => "3",
        //        ]);
        //
        //        \App\Models\ConsumerAccessRole::create([
        //            "id" => 3,
        //            "access_role_id" => "4",
        //            "consumer_id" => "2",
        //        ]);

        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 1,
            'consumer_id' => 1,
            'access_role_id' => 5,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 2,
            'consumer_id' => 2,
            'access_role_id' => 4,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 3,
            'consumer_id' => 3,
            'access_role_id' => 3,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 4,
            'consumer_id' => 9,
            'access_role_id' => 8,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 5,
            'consumer_id' => 10,
            'access_role_id' => 6,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 6,
            'consumer_id' => 11,
            'access_role_id' => 7,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 7,
            'consumer_id' => 6,
            'access_role_id' => 8,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 8,
            'consumer_id' => 7,
            'access_role_id' => 6,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 9,
            'consumer_id' => 8,
            'access_role_id' => 7,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 10,
            'consumer_id' => 12,
            'access_role_id' => 7,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 11,
            'consumer_id' => 16,
            'access_role_id' => 8,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 12,
            'consumer_id' => 13,
            'access_role_id' => 6,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 13,
            'consumer_id' => 14,
            'access_role_id' => 4,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 14,
            'consumer_id' => 15,
            'access_role_id' => 7,
            'main_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 15,
            'consumer_id' => 6,
            'access_role_id' => 6,
            'main_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 16,
            'consumer_id' => 6,
            'access_role_id' => 7,
            'main_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRole::create([
            'id' => 20,
            'consumer_id' => 20,
            'access_role_id' => 20,
            'main_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);

        if (config("database.default") == "pgsql")
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_ConsumerAccessRoles_id_seq\"', 100, true)");

    }
}