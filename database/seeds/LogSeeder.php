<?php

use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config("database.default") == "pgsql"){
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"logs_id_seq\"', 2000, true)");
        }
    }
}
