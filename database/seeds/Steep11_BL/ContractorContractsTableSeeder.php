<?php

use Illuminate\Database\Seeder;

class ContractorContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\BL\ContractorContract::truncate();

        \App\Models\BL\ContractorContract::create([
            'id' => 1,
            "table_n" => 86,
            "contractor_id" => 1,
            "company_id" => 5,
            "db_area_id" => 6,
            "contractor_contract_name" => "0000001 от 15.01.2020",
            "row_id" => 1,
            "contractor_contract_date" => "2020-01-15",
            "contractor_contract_number" => "0000001",
            "contractor_contract_expiration_date" => "2021-02-01",
            "uid_1c_code" => "06f847bb-3eb6-11ea-a042-708bcda427ce",
            "deleted_l" => false,
            'created_by' => 'seeds',
            'updated_by' => 'seeds',


        ]);

        \App\Models\BL\ContractorContract::create([
            'id' => 2,
            "table_n" => 1,
            "contractor_id" => 1,
            "company_id" => 1,
            "db_area_id" => 6,
            "uid_1c_code" => "sdsdvsdvsdsdv",
            "contractor_contract_date" => "2018-02-21 18:59:24",
            "contractor_contract_name" => "Договор № 0000777 от 02.05.2019",
            "row_id" => 1,
            "contractor_contract_number" => "22222",
            "contractor_contract_expiration_date" => "2020-03-20 18:59:24",
        ]);

        \App\Models\BL\ContractorContract::create([
            'id' => 3,
            "table_n" => 1,
            "contractor_id" => 2,
            "company_id" => 1,
            "db_area_id" => 6,
            "uid_1c_code" => "sdsdvsdvsdsdv",
            "contractor_contract_date" => "2018-02-21 18:59:24",
            "contractor_contract_name" => "Договор № 0000888 от 02.05.2019",
            "row_id" => 1,
            "contractor_contract_number" => "22222",
            "contractor_contract_expiration_date" => "2020-03-20 18:59:24",
        ]);
        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"ContractorContracts_id_seq\"', 10, true)");
        }
    }
}
