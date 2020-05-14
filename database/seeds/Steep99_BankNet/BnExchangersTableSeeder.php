<?php

use Illuminate\Database\Seeder;

class BnExchangersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnExchanger::truncate();

        \App\Models\BankNet\BnExchanger::create([
            "id" => 1,
            "exchanger_name" => "BestObmen",
            "kyc_sent_l" => true,
            "anketa_sent_l" => true,
            "profile_accepted_l" => true,
            "confirmed_l" => true,
            "exchanger_rating_n" => 7.5,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchanger::create([
            "id" => 2,
            "exchanger_name" => "Join",
            "kyc_sent_l" => true,
            "anketa_sent_l" => true,
            "profile_accepted_l" => true,
            "confirmed_l" => true,
            "exchanger_rating_n" => 5.5,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchanger::create([
            "id" => 3,
            "exchanger_name" => "GoodPrice",
            "kyc_sent_l" => true,
            "anketa_sent_l" => true,
            "profile_accepted_l" => true,
            "confirmed_l" => true,
            "exchanger_rating_n" => 9.8,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchanger::create([
            "id" => 4,
            "exchanger_name" => "Go",
            "kyc_sent_l" => true,
            "anketa_sent_l" => true,
            "profile_accepted_l" => true,
            "confirmed_l" => true,
            "exchanger_rating_n" => 9.9,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnExchanger::create([
            "id" => 5,
            "exchanger_name" => "Come",
            "kyc_sent_l" => true,
            "anketa_sent_l" => true,
            "profile_accepted_l" => true,
            "confirmed_l" => true,
            "exchanger_rating_n" => 3.2,
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

//        if(config("database.default") == "pgsql"){
//
//            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnExchangers_id_seq\"', 100, true)");
//        }
    }
}
