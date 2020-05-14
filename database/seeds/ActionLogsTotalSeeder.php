<?php

use Illuminate\Database\Seeder;

class ActionLogsTotalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ActionLogsTotal::truncate();

        \App\Models\ActionLogsTotal::create([
            "action_type_id" => 26,
            "controller_id" => 32,
            'count' => '6',
            'date' => '2019-08-16',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ActionLogsTotal::create([
            "action_type_id" => 26,
            "controller_id" => 32,
            'count' => '9',
            'date' => '2019-08-17',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ActionLogsTotal::create([
            "action_type_id" => 26,
            "controller_id" => 32,
            'count' => '2',
            'date' => '2019-08-18',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ActionLogsTotal::create([
            "action_type_id" => 26,
            "controller_id" => 32,
            'count' => '6',
            'date' => '2019-08-22',
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"__ActionLogsTotal_id_seq\"', 100, true)");
        }
    }
}
