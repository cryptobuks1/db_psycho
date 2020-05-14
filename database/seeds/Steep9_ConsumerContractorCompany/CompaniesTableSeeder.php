<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::truncate();

        \App\Models\Company::create([
            "id" => 1,
            "db_area_id" => 7,
            "country_id" => "192",
            "uid_1c_code" => "0a3c8c49-d8eb-11e7-9324-00155d140c02",
            "individual_l" => 0,
            /*"entrepreneur_l" => "",*/
            "company_full_name" => "Общество с ограниченной ответственностью «РБ ЛИЗИНГ»",
            "company_short_name" => "РБ ЛИЗИНГ",
            "taxpayer_number" => "7709202955",
            "code_reason_number" => "770801001",
            "registry_number" => "1027700131007",
            "social_security_number" => "7720001914",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "1901-01-01 00:00:00",
            "actual_l" => "0",
        ]);

        \App\Models\Company::create([
            "id" => 5,
            "db_area_id" => 6,
            "country_id" => "192",
            "uid_1c_code" => "0a3c8c49-d8eb-11e7-9324-00155d140c02",
            "individual_l" => 0,
            /*"entrepreneur_l" => "",*/
            "company_full_name" => "Общество с ограниченной ответственностью «ПРИМЕР ЛИЗИНГ»",
            "company_short_name" => "ООО «ПРИМЕР ЛИЗИНГ»",
            "taxpayer_number" => "1236547898",
            "code_reason_number" => "123456789",
            "registry_number" => "123456789",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "1901-01-01 00:00:00",
            "actual_l" => "1",
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"Companies_id_seq\"', 10, true)");
        }
    }
}
