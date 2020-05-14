<?php

use Illuminate\Database\Seeder;

class BnPaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnPaymentMethod::truncate();

        \App\Models\BankNet\BnPaymentMethod::create([
            "id" => 1,
            "payment_method_code" => "privat24",
            "payment_method_name" => "Приват24",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethod::create([
            "id" => 2,
            "payment_method_code" => "sberbank",
            "payment_method_name" => "Сбербанк",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethod::create([
            "id" => 3,
            "payment_method_code" => "qiwi",
            "payment_method_name" => "QIWI",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethod::create([
            "id" => 4,
            "payment_method_code" => "paypal",
            "payment_method_name" => "PayPal",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethod::create([
            "id" => 5,
            "payment_method_code" => "yandexMoney",
            "payment_method_name" => "Яндекс.Деньги",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnPaymentMethods_id_seq\"', 100, true)");
        }
    }
}
