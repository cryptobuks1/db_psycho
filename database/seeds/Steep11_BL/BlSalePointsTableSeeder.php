<?php

use Illuminate\Database\Seeder;

class BlSalePointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlSalePoint::truncate();

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\BL\BlSalePoint::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_sale_point_name' => 'Точка продажи',
            'bl_sale_point_address' => 'г. Москва, ул Маши Порываевой,34',
            'uid_1c_code' => '80fff921-1c77-11e8-80f8-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blSalePoints_id_seq\"', 10, true)");
        }
    }
}
