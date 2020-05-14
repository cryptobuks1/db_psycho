<?php

use Illuminate\Database\Seeder;

class ConsumerAccessRowsNewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ConsumerAccessRowNew::truncate();

        \App\Models\ConsumerAccessRowNew::create([
            "id" => 1,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 1,
            "company_id" => 0,
            "consumer_id" => 11,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 2,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 2,
            "company_id" => 0,
            "consumer_id" => 12,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 3,
            "db_area_id" => 6,
            "access_role_id" => 7,
            "contractor_contract_id" => 0,
            "contractor_id" => 0,
            "company_id" => null,
            "consumer_id" => null,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 4,
            "db_area_id" => 6,
            "access_role_id" => 6,
            "contractor_contract_id" => 0,
            "contractor_id" => null,
            "company_id" => null,
            "consumer_id" => null,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 5,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 1,
            "company_id" => 0,
            "consumer_id" => 8,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 6,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 1,
            "company_id" => 0,
            "consumer_id" => 12,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 7,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 1,
            "company_id" => 0,
            "consumer_id" => 14,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        \App\Models\ConsumerAccessRowNew::create([
            "id" => 8,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 1,
            "company_id" => 0,
            "consumer_id" => 15,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        \App\Models\ConsumerAccessRowNew::create([
            "id" => 9,
            "db_area_id" => 6,
            "access_role_id" => null,
            "contractor_contract_id" => 0,
            "contractor_id" => 2,
            "company_id" => 0,
            "consumer_id" => 15,
            "actual_l" => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_ConsumerAccessRowsNew_id_seq\"', 10, true)");
        }

    }
}