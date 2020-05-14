<?php

use Illuminate\Database\Seeder;

class BlInsurancePolicyContractTabLeasingContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlInsurancePolicyContractTabLeasingContract::truncate();

        /*Сиды по Договорам страхования табличная часть договора лизинга*/
        \App\Models\BL\BlInsurancePolicyContractTabLeasingContract::create([
            'id' => 1,
            'contractor_contract_id' => 1,
            'contractor_id' => 1,
            'line_n' => 1,
            'bl_insurance_policy_contract_id' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        /*Сиды по Договорам страхования табличная часть договора лизинга*/
        \App\Models\BL\BlInsurancePolicyContractTabLeasingContract::create([
            'id' => 2,
            'contractor_contract_id' => 3,
            'contractor_id' => 2,
            'line_n' => 7,
            'bl_insurance_policy_contract_id' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blInsurancePolicyContractTabLeasingContracts_id_seq\"', 10, true)");
        }
    }
}
