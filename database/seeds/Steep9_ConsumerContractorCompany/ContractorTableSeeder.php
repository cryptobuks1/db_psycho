<?php

use Illuminate\Database\Seeder;

class ContractorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contractor::truncate();

        \App\Models\Contractor::create([
            "id" => 1,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "de8bf960-2700-11ea-b96a-708bcda427ce",
            "individual_l" => 1,
            "contractor_full_name" => "Иванов Иван Иванович",
            "contractor_short_name" => "Иванов И.И.",
            "taxpayer_number" => "123456789047",
            "code_reason_number" => "",
            "register_number" => "",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => null,
            "actual_l" => "1",
        ]);


        \App\Models\Contractor::create([
            "id" => 2,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "44e5bc70-2713-11ea-b96a-708bcda427ce",
            "individual_l" => 1,
            "contractor_full_name" => "Петров Петр Петрович",
            "contractor_short_name" => "Петров П.П.",
            "taxpayer_number" => "210987654313",
            "code_reason_number" => "",
            "register_number" => "",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => null,
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 3,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "2cdb777f-3223-11ea-956b-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "Общество с ограниченной ответственностью \"Ромашка\"",
            "contractor_short_name" => "ООО \"Ромашка\"",
            "taxpayer_number" => "1264567891",
            "code_reason_number" => "123456789",
            "register_number" => "1234567890123",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 4,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "db5501af-3227-11ea-956b-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"АВТО-ТОРГ\"",
            "contractor_short_name" => "ООО АВТО-ТОРГ",
            "taxpayer_number" => "6686027702",
            "code_reason_number" => "667801001",
            "register_number" => "1136686021537",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 5,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "7b6a9abf-3228-11ea-956b-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"ГЛОБАЛ ТРАК СЕЙЛС\"",
            "contractor_short_name" => "ГЛОБАЛ ТРАК СЕЙЛС",
            "taxpayer_number" => "3250053353",
            "code_reason_number" => "773545001",
            "register_number" => "1043244001107",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 6,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "12aefc31-32d5-11ea-abd4-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"ФЕНИКС\"",
            "contractor_short_name" => "ООО ФЕНИКС",
            "taxpayer_number" => "3533250056",
            "code_reason_number" => "500177354",
            "register_number" => "1071043244001",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 7,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "ff1802c0-27bc-11ea-b96a-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"Audi\"",
            "contractor_short_name" => "Audi",
            "taxpayer_number" => "3253530050",
            "code_reason_number" => "177500354",
            "register_number" => "4321071044001",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 8,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "d950ada0-35d9-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"СТРАХОВЩИК\"",
            "contractor_short_name" => "ООО СТРАХОВЩИК",
            "taxpayer_number" => "2535300536",
            "code_reason_number" => "775003514",
            "register_number" => "3210710444001",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 9,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "4130a0b0-35da-11ea-b9b9-708bcda427ce",
            "individual_l" => 1,
            "contractor_full_name" => "ИП Васильев Василий Васильевич",
            "contractor_short_name" => "ИП Василий В.В.",
            "taxpayer_number" => "231231346517",
            "code_reason_number" => "750035174",
            "register_number" => "2107104440031",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 10,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "a07423d0-35da-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"АВТО-РАРИТЕТ\"",
            "contractor_short_name" => "ООО АВТО-РАРИТЕТ",
            "taxpayer_number" => "3333548737",
            "code_reason_number" => "500351774",
            "register_number" => "1071055555321",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 11,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "cf973f80-35da-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"АВТОБУМ\"",
            "contractor_short_name" => "ООО АВТОБУМ",
            "taxpayer_number" => "3333548737",
            "code_reason_number" => "500351774",
            "register_number" => "1071055555321",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 12,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "fe9ddd10-35db-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"ПОСТАВЩИК\"",
            "contractor_short_name" => "ООО ПОСТАВЩИК",
            "taxpayer_number" => "5300532534",
            "code_reason_number" => "351775004",
            "register_number" => "5710444003211",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 13,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "ab8e3690-35dd-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "ООО \"СТРОЙДОМИНВЕСТ\"",
            "contractor_short_name" => "ООО СТРОЙДОМИНВЕСТ",
            "taxpayer_number" => "4005325353",
            "code_reason_number" => "517750034",
            "register_number" => "7104440032151",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 14,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "e139af40-35dd-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "Ауди Центр Таганка",
            "contractor_short_name" => "Ауди Центр Таганка",
            "taxpayer_number" => "6798798781",
            "code_reason_number" => "177500359",
            "register_number" => "3210710440041",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        \App\Models\Contractor::create([
            "id" => 15,
            "country_id" => 192,
            "db_area_id" => 6,
            "uid_1c_code" => "38504d20-35de-11ea-b9b9-708bcda427ce",
            "individual_l" => 0,
            "contractor_full_name" => "АЦ Хабаровск",
            "contractor_short_name" => "АЦ Хабаровск",
            "taxpayer_number" => "8523147965",
            "code_reason_number" => "177500354",
            "register_number" => "2107104400431",
            "social_security_number" => "",
            "entrepreneur_certificate" => "",
            "entrepreneur_certificate_date" => "2019-04-05 18:59:24",
            "actual_l" => "1",
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"Contractors_id_seq\"', 1000, true)");
        }
    }
}
