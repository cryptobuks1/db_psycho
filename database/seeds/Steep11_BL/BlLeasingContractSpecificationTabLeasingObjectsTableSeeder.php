<?php

use Illuminate\Database\Seeder;

class BlLeasingContractSpecificationTabLeasingObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlLeasingContractSpecificationTabLeasingObject::truncate();

        \App\Models\BL\BlLeasingContractSpecificationTabLeasingObject::create([
            'id' => 1,
            'bl_leasing_object_model_id' => 5,
            'bl_leasing_object_type_id' => 2,
            'rate_VAT_id' => 7,
            'contractor_id' => 7,
            'bl_leasing_contract_specification_id' => 1,
            'bl_leasing_object_brand_id' => 2,
            'line_n' => 1,
            'bl_leasing_object_price' => 2000000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 2000000.00,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlLeasingContractSpecificationTabLeasingObject::create([
            'id' => 2,
            "bl_leasing_object_model_id" => 1,
            "bl_leasing_object_type_id" => 2,
            "rate_VAT_id" => 1,
            "contractor_id" => 1,
            "bl_leasing_contract_specification_id" => 2,
            "bl_leasing_object_brand_id" => 2,
            "line_n" => 1,
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blLeasingContractSpecificationTabLeasingObjects_id_seq\"', 10, true)");
        }
    }
}
