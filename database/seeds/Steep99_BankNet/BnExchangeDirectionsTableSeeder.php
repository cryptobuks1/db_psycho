<?php

use Illuminate\Database\Seeder;

class BnExchangeDirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnExchangeDirection::truncate();

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 1,
            'bn_payment_method_id' => 1,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 4,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Приват 24 (UAH)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 2,
            'bn_payment_method_id' => 1,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 2,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Приват 24 (USD)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 3,
            'bn_payment_method_id' => 1,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 3,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Приват 24 (EUR)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 4,
            'bn_payment_method_id' => 2,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 1,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Сбербанк (RUB)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 5,
            'bn_payment_method_id' => 2,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 2,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Сбербанк (USD)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 6,
            'bn_payment_method_id' => 2,
            'bn_payment_method_group_id' => 4,
            'bn_currency_id' => 3,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Сбербанк (EUR)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 7,
            'bn_payment_method_id' => NULL,
            'bn_payment_method_group_id' => 1,
            'bn_currency_id' => 15,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Ethereum (ETH)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 8,
            'bn_payment_method_id' => NULL,
            'bn_payment_method_group_id' => 1,
            'bn_currency_id' => 14,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Bitcoin (BTC)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 9,
            'bn_payment_method_id' => 3,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 1,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'QIWI (RUB)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 10,
            'bn_payment_method_id' => 3,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 2,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'QIWI (USD)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 11,
            'bn_payment_method_id' => 3,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 3,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'QIWI (EUR)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 12,
            'bn_payment_method_id' => 4,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 1,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'PayPal (RUB)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 13,
            'bn_payment_method_id' => 4,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 2,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'PayPal (USD)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 14,
            'bn_payment_method_id' => 4,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 3,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'PayPal (EUR)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        /**/

        \App\Models\BankNet\BnExchangeDirection::create([
            'id' => 15,
            'bn_payment_method_id' => 5,
            'bn_payment_method_group_id' => 2,
            'bn_currency_id' => 1,
            'exchange_direction_code' => '',
            'exchange_direction_name' => 'Яндекс.Деньги (RUB)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnExchangeDirections_id_seq\"', 100, true)");
        }
    }
}
