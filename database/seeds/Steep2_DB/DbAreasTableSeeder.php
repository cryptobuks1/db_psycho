<?php

use Illuminate\Database\Seeder;

class DbAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbArea::truncate();

        /**/
        \App\Models\DbArea::create([
            'id' => 1,
            'db_area_code' => 'Dev',
            'db_area_name' => 'BS Leasing',
            'db_area_token' => 'e9787a38-4772-4cbb-a9c6-23a4a65d110f',
            'db_partition_1' => NULL,
            'db_partition_2' => NULL,
            'db_id' => 7,
            'consumer_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);

        /**/
        \App\Models\DbArea::create([
            'id' => 6,
            'db_area_code' => 'BlLising',
            'db_area_name' => 'BS Leasing',
            'db_area_token' => 'e9787a38-4772-4cbb-a9c6-23a4a65d110f',
            'db_partition_1' => NULL,
            'db_partition_2' => NULL,
            'db_id' => 6,
            'consumer_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);


        /**/
        \App\Models\DbArea::create([
            'id' => 7,
            'db_area_code' => 'BlLising_1',
            'db_area_name' => 'БЛ Лизинг',
            'db_area_token' => '4096b931-006e-45b7-9481-0ca16b0aac60',
            'db_partition_1' => NULL,
            'db_partition_2' => NULL,
            'db_id' => 7,
            'consumer_id' => 5,
            'actual_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_DbAreas_id_seq\"', 2000, true)");
        }

    }
}
