<?php

use Illuminate\Database\Seeder;

class DbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DBase::truncate();


        /**/
        \App\Models\DBase::create([
            'id' => 6,
            'db_code' => 'LK_RB',
            'db_name' => 'Бизнес Лоджик Лизинг Бухгалтерия',
            'db_remark' => '',
            'server_id' => 4,
            'db_type_id' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);


        /**/
        \App\Models\DBase::create([
            'id' => 7,
            'db_code' => 'rbl_dev',
            'db_name' => 'Лизинг БЛ (разработка)',
            'db_remark' => '',
            'server_id' => 4,
            'db_type_id' => 7,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_DBases_id_seq\"', 2000, true)");
        }


    }
}
