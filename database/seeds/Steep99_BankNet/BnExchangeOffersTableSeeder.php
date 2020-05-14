<?php

use Illuminate\Database\Seeder;

class BnExchangeOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnExchangeOffer::truncate();

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 1,
            "bn_exchanger_id" => 1, // BestObmen
            "bn_currency_id_input" => 1, // RUB
            "payment_method_id_input" => 2, // sberbank
            "bn_currency_id_output" => 4, // UAH
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 10000,
            "max_exchange_treshold_n" => 100000,
            "transaction_security_percent_n" => 65,
            "calculated_rate_n" => 0.36,
            "status_code" => "active",
            "reserve_n" => 250000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 2,
            "bn_exchanger_id" => 1, // BestObmen
            "bn_currency_id_input" => 1, // RUB
            "payment_method_id_input" => 2, // sberbank
            "bn_currency_id_output" => 2, // USD
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 20000,
            "max_exchange_treshold_n" => 100000,
            "transaction_security_percent_n" => 100,
            "calculated_rate_n" => 0.014,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 3,
            "bn_exchanger_id" => 2, // Join
            "bn_currency_id_input" => 1, // RUB
            "payment_method_id_input" => 2, // sberbank
            "bn_currency_id_output" => 2, // USD
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 20000,
            "max_exchange_treshold_n" => 100000,
            "transaction_security_percent_n" => 100,
            "calculated_rate_n" => 0.0145,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 4,
            "bn_exchanger_id" => 3, // GoodPrice
            "bn_currency_id_input" => 1, // RUB
            "payment_method_id_input" => 2, // sberbank
            "bn_currency_id_output" => 2, // USD
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 10000,
            "max_exchange_treshold_n" => 100000,
            "transaction_security_percent_n" => 100,
            "calculated_rate_n" => 0.0149,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 5,
            "bn_exchanger_id" => 2, // Join
            "bn_currency_id_input" => 2, // USD
            "payment_method_id_input" => 2, // sberbank
            "bn_currency_id_output" => 4, // UAH
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 20000,
            "max_exchange_treshold_n" => 100000,
            "transaction_security_percent_n" => 100,
            "calculated_rate_n" => 26.34,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 6,
            "bn_exchanger_id" => 2, // Join
            "bn_currency_id_input" => 14, // BTC
            "payment_method_id_input" => null, //
            "bn_currency_id_output" => 2, // USD
            "payment_method_id_output" => 1, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 0.00154,
            "max_exchange_treshold_n" => 1.2,
            "transaction_security_percent_n" => 95,
            "calculated_rate_n" => 5277.8734,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchangeOffer::create([
            "id" => 7,
            "bn_exchanger_id" => 4, // Go
            "bn_currency_id_input" => 2, // USD
            "payment_method_id_input" => 3, //
            "bn_currency_id_output" => 14, // BTC
            "payment_method_id_output" => null, // privat24
            "irrevocable_exchange_treshold_n" => 100,
            "min_exchange_treshold_n" => 500,
            "max_exchange_treshold_n" => 10000000,
            "transaction_security_percent_n" => 91,
            "calculated_rate_n" => 0.00014838677,
            "status_code" => "active",
            "reserve_n" => 20000,
            "telegram_link" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

//        if(config("database.default") == "pgsql"){
//
//            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnExchangeOffers_id_seq\"', 100, true)");
//        }

    }
}
