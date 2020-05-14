<?php

use Illuminate\Database\Seeder;

class PaymentInvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\BL\PaymentInvoice::truncate();

        \App\Models\BL\PaymentInvoice::create([
            "id" => 1,
            "db_area_id" => 6,
            "company_id" => 1,
            "contractor_id" => 1,
            "contractor_contract_id" => 1,
            "stored_file_id" => 4,
            "uid_1c_code" => "invoice_seed",
            "doc_number" => 51489,
            "doc_date" => "01-07-2019",
            "doc_sum" => 1000,
            "actual_l" => true,
            "deleted_l" => false,
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"PaymentInvoices_id_seq\"', 5, true)");
        }
    }
}
