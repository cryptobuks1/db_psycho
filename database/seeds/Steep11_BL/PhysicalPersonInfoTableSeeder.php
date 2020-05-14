<?php

use Illuminate\Database\Seeder;

class PhysicalPersonInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PhysicalPersonInfo::truncate();

        /*Марки предметов лизинга Справочники.блМаркиПредметовЛизинга'*/
        \App\Models\PhysicalPersonInfo::create([
            'id' => 1,
            "physical_person_id" => 1,
            "info_type_id" => 1,
            "info_kind_id" => 1,
            "country_id" => 192,
            "region_id" => 1,
            "city_name" => "Москва",
            "e_mail" => "some@mail.com",
            "phone_number" => "7-484-108-78-44",
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"PhysicalPersonInfo_id_seq\"', 10, true)");
        }
    }
}
