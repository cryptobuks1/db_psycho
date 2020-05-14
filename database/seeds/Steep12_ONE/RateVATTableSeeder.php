<?php

use Illuminate\Database\Seeder;

class RateVATTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RateVAT::truncate();

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 1,
            'rate_VAT_code' => 'НДС18',
            'rate_VAT_name' => '18%',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 2,
            'rate_VAT_code' => 'НДС18_118',
            'rate_VAT_name' => '18/118',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 3,
            'rate_VAT_code' => 'НДС10',
            'rate_VAT_name' => '10%',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 4,
            'rate_VAT_code' => 'НДС10_110',
            'rate_VAT_name' => '10/110',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 5,
            'rate_VAT_code' => 'НДС0',
            'rate_VAT_name' => '0%',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 6,
            'rate_VAT_code' => 'БезНДС',
            'rate_VAT_name' => 'Без НДС',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 7,
            'rate_VAT_code' => 'НДС20',
            'rate_VAT_name' => '20%',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\RateVAT::create([
            'id' => 8,
            'rate_VAT_code' => 'НДС20_120',
            'rate_VAT_name' => '20/120',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
    }
}
