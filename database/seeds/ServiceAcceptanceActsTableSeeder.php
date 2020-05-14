<?php

use Illuminate\Database\Seeder;

class ServiceAcceptanceActsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\ServiceAcceptanceAct::truncate();

        \App\Models\BL\ServiceAcceptanceAct::create([
            "id" => 1,
            "db_area_id" => 6,
            "company_id" => 1,
            "contractor_id" => 1,
            "contractor_contract_id" => 1,
//            "stored_file_id" => 3,
            "uid_1c_code" => "service_acceptance_act_seed",
            "doc_number" => 45972,
            "doc_date" => "05-07-2019",
            "doc_sum" => 2000,
            "actual_l" => true,
            "deleted_l" => false,
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"ServiceAcceptanceActs_id_seq\"', 5, true)");
        }
    }
}
