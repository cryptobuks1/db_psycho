<?php

use Illuminate\Database\Seeder;

class ServersDbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ServerDb::truncate();


                /**/
        \App\Models\ServerDB::create([
            'id' => 3,
            'server_name' => 'Production 1С',
            'server_ip' => '195.36.231.176',
            'server_url' => 'rblclient.bs-logic.ru',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\ServerDB::create([
            'id' => 4,
            'server_name' => 'Development 1C',
            'server_ip' => '192.168.1.86',
            'server_url' => 'localhost',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_ServersDB_id_seq\"', 2000, true)");
        }

    }
}
