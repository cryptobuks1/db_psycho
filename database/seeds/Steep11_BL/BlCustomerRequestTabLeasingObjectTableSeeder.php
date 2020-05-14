<?php

use Illuminate\Database\Seeder;

class BlCustomerRequestTabLeasingObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlCustomerRequestTabLeasingObject::truncate();

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 1,
            'bl_customer_request_id' => 1,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_id' => 5,
            'bl_leasing_object_group_id' => 1,
            'bl_leasing_object_price' => 2000000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 2000000.00,
            'bl_leasing_calculation_main_document_id' => 1,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 7,
            'supplier_name' => 'Audi',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 2,
            'bl_customer_request_id' => 2,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_id' => 4,
            'bl_leasing_object_group_id' => 2,
            'bl_leasing_object_price' => 3500000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 3500000.00,
            'bl_leasing_calculation_main_document_id' => 2,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 7,
            'supplier_name' => 'Audi',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 3,
            'bl_customer_request_id' => 3,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 1,
            'bl_leasing_object_brand_id' => 1,
            'bl_leasing_object_model_id' => 3,
            'bl_leasing_object_group_id' => 3,
            'bl_leasing_object_price' => 3500000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 3500000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 5,
            'supplier_name' => 'ГЛОБАЛ ТРАК СЕЙЛС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 4,
            'bl_customer_request_id' => 3,
            'line_n' => 2,
            'bl_leasing_object_type_id' => 4,
            'bl_leasing_object_brand_id' => 8,
            'bl_leasing_object_model_id' => 19,
            'bl_leasing_object_group_id' => 3,
            'bl_leasing_object_price' => 2700000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 2700000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 5,
            'supplier_name' => 'ГЛОБАЛ ТРАК СЕЙЛС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 5,
            'bl_customer_request_id' => 3,
            'line_n' => 3,
            'bl_leasing_object_type_id' => 5,
            'bl_leasing_object_brand_id' => 9,
            'bl_leasing_object_model_id' => 18,
            'bl_leasing_object_group_id' => 4,
            'bl_leasing_object_price' => 12500000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 12500000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 5,
            'supplier_name' => 'ГЛОБАЛ ТРАК СЕЙЛС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 6,
            'bl_customer_request_id' => 4,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_id' => 5,
            'bl_leasing_object_model_id' => 11,
            'bl_leasing_object_group_id' => 5,
            'bl_leasing_object_price' => 1449000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 1449000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 11,
            'supplier_name' => 'ООО АВТОБУМ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 7,
            'bl_customer_request_id' => 5,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_id' => 6,
            'bl_leasing_object_model_id' => 16,
            'bl_leasing_object_group_id' => 6,
            'bl_leasing_object_price' => 2670000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 2670000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 4,
            'supplier_name' => 'ООО АВТО-ТОРГ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        \App\Models\BL\BlCustomerRequestTabLeasingObject::create([
            'id' => 8,
            'bl_customer_request_id' => 6,
            'line_n' => 1,
            'bl_leasing_object_type_id' => 2,
            'bl_leasing_object_brand_id' => 2,
            'bl_leasing_object_model_id' => 2,
            'bl_leasing_object_group_id' => 7,
            'bl_leasing_object_price' => 2420000.00,
            'bl_leasing_object_quantity' => 1,
            'bl_leasing_object_sum' => 2420000.00,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id' => 1,
            'rate_VAT_id' => 7,
            'supplier_contractor_id' => 7,
            'supplier_name' => 'Audi',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-10-01 15:23:26',
            'updated_at' => '2020-10-01 15:23:26',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blCustomerRequestTabLeasingObjects_id_seq\"', 100, true)");
        }

    }
}
