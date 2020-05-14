<?php

use Illuminate\Database\Seeder;

class DbAreaByAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DbAreaByAccount::truncate();

        \App\Models\DbAreaByAccount::create([
            'db_area_by_consumer_account_id'  => 1,
            'db_area_id' => 1,
            'consumer_account_id' => 1,
            'actual_l' => 0,
            'deleted_l' => 0,
            'created_by' => 10000,
            'updated_by' => 10000,
        ]);


        \App\Models\DbAreaByAccount::create([
            'db_area_by_consumer_account_id'  => 2,
            'db_area_id' => 2,
            'consumer_account_id' => 2,
            'actual_l' => 0,
            'deleted_l' => 0,
            'created_by' => 10000,
            'updated_by' => 10000,
        ]);

        \App\Models\DbAreaByAccount::create([
            'db_area_by_consumer_account_id'  => 3,
            'db_area_id' => 3,
            'consumer_account_id' => 3,
            'actual_l' => 0,
            'deleted_l' => 0,
            'created_by' => 10000,
            'updated_by' => 10000,
        ]);

        \App\Models\DbAreaByAccount::create([
            'db_area_by_consumer_account_id'  => 3,
            'db_area_id' => 3,
            'consumer_account_id' => 4,
            'actual_l' => 0,
            'deleted_l' => 0,
            'created_by' => 10000,
            'updated_by' => 10000,
        ]);
    }
}
