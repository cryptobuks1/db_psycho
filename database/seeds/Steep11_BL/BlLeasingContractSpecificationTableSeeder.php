<?php

use Illuminate\Database\Seeder;

class BlLeasingContractSpecificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingContractSpecification::truncate();

        \App\Models\BL\BlLeasingContractSpecification::create([
            'id' => 1,
            "contractor_id" => 1,
            "contractor_contract_id" => 1,
            "db_area_id" => 6,
            "company_id" => null,
            "bl_leasing_contract_specification_date" => '2020-01-15',
            "uid_1c_code" => '06f847bd-3eb6-11ea-a042-708bcda427ce',
            "deleted_l" => false,
            'created_by' => 'seeds',
            'updated_by' => 'seeds',
        ]);
//
//        \App\Models\BL\BlLeasingContractSpecification::create([
//            'id' => 2,
//            "contractor_id" => 1,
//            "contractor_contract_id" => 1,
//            "db_area_id" => 6,
//            "company_id" => 1,
//            "bl_leasing_contract_specification_date" => null,
//        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingContractSpecifications_id_seq\"', 100, true)");
        }
    }
}
