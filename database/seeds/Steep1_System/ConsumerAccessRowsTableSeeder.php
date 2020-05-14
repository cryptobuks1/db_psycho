<?php

use Illuminate\Database\Seeder;

class ConsumerAccessRowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ConsumerAccessRow::truncate();


        /**/
        \App\Models\ConsumerAccessRow::create([
            'id' => 1,
            'access_axis_id' => 1,
            'db_area_id' => 6,
            'access_role_id' => null,
            'consumer_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 16:00:00',
            'updated_at' => '2019-12-11 16:00:00',
        ]);


        /**/
        \App\Models\ConsumerAccessRow::create([
            'id' => 2,
            'access_axis_id' => 1,
            'db_area_id' => 6,
            'access_role_id' => 7,
            'consumer_id' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 16:00:00',
            'updated_at' => '2019-12-11 16:00:00',
        ]);

        /**/
        \App\Models\ConsumerAccessRow::create([
            'id' => 3,
            'access_axis_id' => 1,
            'db_area_id' => 6,
            'access_role_id' => null,
            'consumer_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 16:00:00',
            'updated_at' => '2019-12-11 16:00:00',
        ]);

    }
}
