<?php

use Illuminate\Database\Seeder;

class ConsumerAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\ConsumerAccount::truncate();

        \App\Models\ConsumerAccount::create([
            "consumer_id" => 1,
            "consumer_account_code" => "consumer_account_code1",
            "consumer_account_name" => "consumer_accountname1",
            "actual_l" => "0",
            "deleted_l" => "0",
            "created_by" => 10000,
            "updated_by" => 10000,
        ]);

        \App\Models\ConsumerAccount::create([
            "consumer_id" => 2,
            "consumer_account_code" => "consumer_account_code2",
            "consumer_account_name" => "consumer_accountname2",
            "actual_l" => "0",
            "deleted_l" => "0",
            "created_by" => 10000,
            "updated_by" => 10000,
        ]);

        \App\Models\ConsumerAccount::create([
            "consumer_id" => 3,
            "consumer_account_code" => "consumer_account_code3",
            "consumer_account_name" => "consumer_accountname3",
            "actual_l" => "0",
            "deleted_l" => "0",
            "created_by" => 10000,
            "updated_by" => 10000,
        ]);

        \App\Models\ConsumerAccount::create([
            "consumer_id" => 4,
            "consumer_account_code" => "consumer_account_code4",
            "consumer_account_name" => "consumer_accountname4",
            "actual_l" => "0",
            "deleted_l" => "0",
            "created_by" => 10000,
            "updated_by" => 10000,
        ]);
    }


}
