<?php

use Illuminate\Database\Seeder;

class ContractorInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ContractorInfo::truncate();

        \App\Models\ContractorInfo::create([
            'id' => 1,
            'info_kind_id' => 9,
            'contractor_id' => 1,
            'line_n' => 1,
            'region_id' => null,
            'info_type_id' => 5,
            'country_id' => null,
            'representation' => "Москва г, пл.Мира, дом № 22",
            'city_name' => null,
            'email' => null,
            'url_name' => null,
            'phone_number' => null,
            'phone_number_without_codes' => null,
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',

        ]);

        \App\Models\ContractorInfo::create([
            'id' => 2,
            'info_kind_id' => 9,
            'contractor_id' => 2,
            'line_n' => 1,
            'region_id' => null,
            'info_type_id' => 5,
            'country_id' => null,
            'representation' => "Москва г, Пушкинская, дом № 5",
            'city_name' => null,
            'email' => null,
            'url_name' => null,
            'phone_number' => null,
            'phone_number_without_codes' => null,
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ContractorInfo::create([
            'id' => 3,
            'info_kind_id' => 14,
            'contractor_id' => 3,
            'line_n' => 1,
            'region_id' => null,
            'info_type_id' => 2,
            'country_id' => null,
            'representation' => "test@gmail.com",
            'city_name' => null,
            'email' => "test@gmail.com",
            'url_name' => "test.com",
            'phone_number' => null,
            'phone_number_without_codes' => null,
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ContractorInfo::create([
            'id' => 4,
            'info_kind_id' => 10,
            'contractor_id' => 1,
            'line_n' => 2,
            'region_id' => null,
            'info_type_id' => 5,
            'country_id' => null,
            'representation' => "Москва г, Пушкинская, дом № 99",
            'city_name' => null,
            'email' => null,
            'url_name' => null,
            'phone_number' => null,
            'phone_number_without_codes' => null,
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        \App\Models\ContractorInfo::create([
            'id' => 5,
            'info_kind_id' => 12,
            'contractor_id' => 1,
            'line_n' => 3,
            'region_id' => null,
            'info_type_id' => 4,
            'country_id' => null,
            'representation' => "+7 (903) 1234567",
            'city_name' => null,
            'email' => null,
            'url_name' => null,
            'phone_number' => "79031234567",
            'phone_number_without_codes' => "1234567",
            'actual_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);



        if (config("database.default") == "pgsql") {
            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"ContractorInfo_id_seq\"', 2000, true)");
        }


    }
}
