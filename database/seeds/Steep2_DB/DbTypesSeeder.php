<?php

use Illuminate\Database\Seeder;

class DbTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbType::truncate();

        /**/
        \App\Models\DbType::create([
            'id' => 1,
            'db_type_code' => 'Development',
            'db_type_name' => 'Development',
            'db_type_remark' => 'База данных разработчиков',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);


        /**/
        \App\Models\DbType::create([
            'id' => 2,
            'db_type_code' => 'DbTest',
            'db_type_name' => 'Db Test',
            'db_type_remark' => 'Тестовая база данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-01 13:58:00',
            'updated_at' => '2019-04-01 13:58:00',
        ]);

        /**/
        \App\Models\DbType::create([
            'id' => 7,
            'db_type_code' => 'BlLisingRbl',
            'db_type_name' => 'Росбанк Лизинг БЛ',
            'db_type_remark' => 'Росбанк Лизинг Бухгалтерия Бизнес Лоджик',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 13:58:00',
            'updated_at' => '2019-04-10 13:58:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"__DbTypes_id_seq\"', 2000, true)");
        }
    }
}
