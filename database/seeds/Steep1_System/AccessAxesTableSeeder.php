<?php

use Illuminate\Database\Seeder;

class AccessAxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessAxis::truncate();

        /**/
        \App\Models\AccessAxis::create([
            'id' => 1,
            'access_axis_name' => 'contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
        ]);

        /**/
        \App\Models\AccessAxis::create([
            'id' => 2,
            'access_axis_name' => 'partner',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"__AccessAxes_id_seq\"', 10, true)");
        }
    }
}
