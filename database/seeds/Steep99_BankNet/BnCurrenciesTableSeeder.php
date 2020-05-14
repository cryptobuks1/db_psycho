<?php

use Illuminate\Database\Seeder;

class BnCurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnCurrency::truncate();

        \App\Models\BankNet\BnCurrency::create([
            "id" => 1,
            "currency_name" => "Rubbles",
            "currency_code" => "RUB",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 2,
            "currency_name" => "Dollars",
            "currency_code" => "USD",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 3,
            "currency_name" => "Euro",
            "currency_code" => "EUR",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 4,
            "currency_name" => "UA Hryvnia",
            "currency_code" => "UAH",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 5,
            "currency_name" => "Belarusian ruble",
            "currency_code" => "BYN",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 6,
            "currency_name" => "Tenge",
            "currency_code" => "KZT",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 7,
            "currency_name" => "Pound sterling",
            "currency_code" => "GBP",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 8,
            "currency_name" => "Chinese yuan",
            "currency_code" => "CNY",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 9,
            "currency_name" => "Turkish lira",
            "currency_code" => "TRY",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 10,
            "currency_name" => "Polish zloty",
            "currency_code" => "PLN",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 11,
            "currency_name" => "Thai baht",
            "currency_code" => "THB",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 12,
            "currency_name" => "Indian rupee",
            "currency_code" => "INR",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 13,
            "currency_name" => "Nigerian Naira",
            "currency_code" => "NGN",
            "currency_code_n" => null,
            "currency_type_n" => 1,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 14,
            "currency_name" => "Bitcoin",
            "currency_code" => "BTC",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 15,
            "currency_name" => "Ethereum",
            "currency_code" => "ETH",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 16,
            "currency_name" => "XRP",
            "currency_code" => "XRP",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 17,
            "currency_name" => "Bitcoin Cash",
            "currency_code" => "BCH",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 18,
            "currency_name" => "Tether",
            "currency_code" => "USDT",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 19,
            "currency_name" => "Litecoin",
            "currency_code" => "LTC",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnCurrency::create([
            "id" => 20,
            "currency_name" => "EOS",
            "currency_code" => "EOS",
            "currency_code_n" => null,
            "currency_type_n" => 2,  // 1 - "fiat", 2 - "crypto"
            "currency_symbol" => "",
            "currency_remark" => "",
            "deleted_l" => false,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnCurrencies_id_seq\"', 100, true)");
        }
    }
}
