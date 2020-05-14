<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currency::truncate();

        \App\Models\Currency::create([
            'id' => 1,
            'currency_name' => 'Российский рубль',
            'currency_code' => 'руб.',
            'currency_code_n' => 643,
            'currency_symbol' => null,
            'currency_remark' => null,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-22 10:52:00',
            'updated_at' => '2020-01-22 10:52:00',
        ]);

    }
}
