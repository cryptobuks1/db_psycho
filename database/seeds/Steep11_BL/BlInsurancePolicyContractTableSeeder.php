<?php

use Illuminate\Database\Seeder;

class BlInsurancePolicyContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlInsurancePolicyContract::truncate();

        /*Сиды по Договорам страхования*/
        \App\Models\BL\BlInsurancePolicyContract::create([
            'id' => 1,
            'db_area_id' => 6,
            'contractor_id_insurance_company' => 5,
            'contractor_contract_id' => 1,
            'table_n_insurant' => 7,
            'row_id_insurant' => 5,
            'bl_insurance_policy_contract_insurance_premium' => 124000.00,
            'bl_insurance_policy_contract_franchise_amount' => 30000.00,
            'd1_payment_term_next_installment' => '2019-06-20 00:00:00',
            'd2_leasing_contract_status' => 'Активен',
            'd3_leasing_object' => 'Volkswagen Transporter VIN SB5556ANM1454',
            'd9_insurant' => 'Страхователь',
            'd10_insurance_company' => 'Страховая компания',
            'd11_leasing_contract_name' => 'Договор № 0000777 от 07.07.2019',
            'uid_1c_code' => 'f32d0811-1b1b-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\BL\BlInsurancePolicyContract::create([
            'id' => 2,
            'db_area_id' => 6,
            'contractor_id_insurance_company' => 4,
            'contractor_contract_id' => 2,
            'table_n_insurant' => 13,
            'row_id_insurant' => 1,
            'bl_insurance_policy_contract_insurance_premium' => 36000.00,
            'bl_insurance_policy_contract_franchise_amount' => 0,
            'd1_payment_term_next_installment' => '2019-07-01 00:00:00',
            'd2_leasing_contract_status' => 'Активен',
            'd3_leasing_object' => 'Peugeot Partner VU VIN SB5556ANM1456',
            'd9_insurant' => 'Страхователь',
            'd10_insurance_company' => 'Страховая компания',
            'd11_leasing_contract_name' => 'Договор № 0000123 от 01.02.2019',
            'uid_1c_code' => 't32d0811-1b1b-11e9-810d-005056986dc1',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blInsurancePolicyContracts_id_seq\"', 10, true)");
        }
    }
}
