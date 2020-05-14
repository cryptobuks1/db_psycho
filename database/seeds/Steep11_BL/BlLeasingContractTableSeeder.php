<?php

use Illuminate\Database\Seeder;

class BlLeasingContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\BL\BlLeasingContract::truncate();

        \App\Models\BL\BlLeasingContract::create([
            'id' => 1,
            "physical_person_id" => 1,
            "company_id" => 5,
            "db_area_id" => 6,
            "contractor_contract_id" => 1,
            'bl_sale_point_id' => 1,
            'uid_1c_code' => '06f847bc-3eb6-11ea-a042-708bcda427ce',
            'deleted_l' => false,
            'created_by' => 'seeds',
            'updated_by' => 'seeds',
            "bl_status_id" => 9,
            'd2_leasing_contract_status' => "Действующий",
            'd4_payment_with_VAT' => '122 046',
            'd5_payment_deadline' => "15.02.2020 0:00:00",
            'd6_payment_status' => "Просрочен!",
            'd7_payment_number' => "2/13",
            'd8_payment_balance' => '2 165 752,8',
            "contractor_contract_name"=> '0000001 от 15.01.2020',
            'bl_customer_request_id' => 1,
        ]);

//        \App\Models\BL\BlLeasingContract::create([
//            'id'=>2,
//            "physical_person_id"=>1,
//            "company_id"=>2,
//            "db_area_id"=>6,
//            "bl_sale_point_id"=>1,
//            "contractor_contract_id"=>1,
//            "contractor_contract_name"=>'Договор № 0000332 от 01.12.2019',
//            "bl_status_id"=>1,
//            'd2_leasing_contract_status' =>"Активен",
//            'd4_payment_with_VAT' =>50000,
//            'd5_payment_deadline' =>"2019-04-01 13:58:00",
//            'd6_payment_status' =>"Просрочен!",
//            'd7_payment_number' =>"6/36",
//            'd8_payment_balance' =>652100.00,
//            'bl_customer_request_id' => 2
//        ]);
//
//        \App\Models\BL\BlLeasingContract::create([
//            'id'=>3,
//            "physical_person_id"=>1,
//            "company_id"=>2,
//            "db_area_id"=>6,
//            "bl_sale_point_id"=>1,
//            "contractor_contract_id"=>1,
//            "contractor_contract_name"=>'Договор № 0000333 от 01.12.2019',
//            "bl_status_id"=>1,
//            'd2_leasing_contract_status' =>"Активен",
//            'd4_payment_with_VAT' =>50000,
//            'd5_payment_deadline' =>"2019-04-01 13:58:00",
//            'd6_payment_status' =>"Просрочен!",
//            'd7_payment_number' =>"6/36",
//            'd8_payment_balance' =>652100.00,
//            'bl_customer_request_id' => 3
//        ]);
//
//        \App\Models\BL\BlLeasingContract::create([
//            'id'=>4,
//            "physical_person_id"=>1,
//            "company_id"=>2,
//            "db_area_id"=>6,
//            "bl_sale_point_id"=>1,
//            "contractor_contract_id"=>1,
//            "contractor_contract_name"=>'Договор № 0000334 от 01.12.2019',
//            "bl_status_id"=>1,
//            'd2_leasing_contract_status' =>"Активен",
//            'd4_payment_with_VAT' =>50000,
//            'd5_payment_deadline' =>"2019-04-01 13:58:00",
//            'd6_payment_status' =>"Просрочен!",
//            'd7_payment_number' =>"6/36",
//            'd8_payment_balance' =>652100.00,
//            'bl_customer_request_id' => 4
//        ]);
//
//        \App\Models\BL\BlLeasingContract::create([
//            'id'=>5,
//            "physical_person_id"=>1,
//            "company_id"=>2,
//            "db_area_id"=>6,
//            "bl_sale_point_id"=>1,
//            "contractor_contract_id"=>1,
//            "contractor_contract_name"=>'Договор № 0000335 от 01.12.2019',
//            "bl_status_id"=>1,
//            'd2_leasing_contract_status' =>"Активен",
//            'd4_payment_with_VAT' =>50000,
//            'd5_payment_deadline' =>"2019-04-01 13:58:00",
//            'd6_payment_status' =>"Просрочен!",
//            'd7_payment_number' =>"6/36",
//            'd8_payment_balance' =>652100.00,
//            'bl_customer_request_id' => 5
//        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingContracts_id_seq\"', 10, true)");
        }
    }
}
