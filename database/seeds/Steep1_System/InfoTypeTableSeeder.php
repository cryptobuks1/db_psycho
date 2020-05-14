<?php

use Illuminate\Database\Seeder;

class InfoTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\InfoType::truncate();

        \App\Models\InfoType::create([
            "info_type_code" => "Skype",
            "info_type_name" => "Skype",
        ]);
        \App\Models\InfoType::create([
             "info_type_code" => "АдресЭлектроннойПочты",
             "info_type_name" => "АдресЭлектроннойПочты",
        ]);
        \App\Models\InfoType::create([
            "info_type_code" => "Факс",
            "info_type_name" => "Факс",
        ]);
        \App\Models\InfoType::create([
            "info_type_code" => "Телефон",
            "info_type_name" => "Телефон",
        ]);
        \App\Models\InfoType::create([
            "info_type_code" => "Адрес",
            "info_type_name" => "Адрес",
        ]);
        \App\Models\InfoType::create([
            "info_type_code" => "Другое",
            "info_type_name" => "Другое",
        ]);
    }
}
