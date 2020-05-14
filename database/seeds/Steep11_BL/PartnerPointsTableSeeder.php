<?php

use Illuminate\Database\Seeder;

class PartnerPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PartnerPoint::truncate();

        \App\Models\PartnerPoint::create([
            'id' => 1,
            'db_area_id' => 6,
            'partner_id' => 3,
            'partner_regions_id' => 8,
            'partner_point_name' => 'Ауди Центр Таганка',
            'partner_point_address' => '109029 Москва, Михайловский пр., 3',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 2,
            'db_area_id' => 6,
            'partner_id' => 3,
            'partner_regions_id' => 8,
            'partner_point_name' => 'Audi City Moscow',
            'partner_point_address' => 'Россия, Москва, Никольская 10',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 3,
            'db_area_id' => 6,
            'partner_id' => 3,
            'partner_regions_id' => 9,
            'partner_point_name' => 'АЦ Хабаровск',
            'partner_point_address' => '680023 Хабаровск, ул. Морозова Павла Леонтьевича, д. 65',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 4,
            'db_area_id' => 6,
            'partner_id' => 1,
            'partner_regions_id' => null,
            'partner_point_name' => 'АВТОБУМ ЦЕНТРАЛЬНЫЙ',
            'partner_point_address' => '123456 Москва, ул. Московская, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 5,
            'db_area_id' => 6,
            'partner_id' => 1,
            'partner_regions_id' => null,
            'partner_point_name' => 'АВТО РАРИТЕТ',
            'partner_point_address' => '654321 Москва, ул. Дальницкая, д. 7',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 6,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 1,
            'partner_point_name' => 'АТ Ульяновский',
            'partner_point_address' => '543261 Ульяновск, ул. Ульяновская, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 7,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 2,
            'partner_point_name' => 'АТ Саратовский',
            'partner_point_address' => '432651 Саратов, ул. Саратовская, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 8,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 3,
            'partner_point_name' => 'АТ Архангельский',
            'partner_point_address' => '326541 Архангельск, ул. Архангельская, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 9,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 4,
            'partner_point_name' => 'Авто Торг Центральный',
            'partner_point_address' => '132654 Москва, ул. Центральная, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 10,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 4,
            'partner_point_name' => 'Авто Торг Северный',
            'partner_point_address' => '132654 Москва, ул. Северная, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 11,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 4,
            'partner_point_name' => 'Авто Торг Восточный',
            'partner_point_address' => '132654 Москва, ул. Восточная, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 12,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 4,
            'partner_point_name' => 'Авто Торг Южный',
            'partner_point_address' => '326544 Москва, ул. Южная, д. 1',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 13,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 5,
            'partner_point_name' => 'АТ Питер',
            'partner_point_address' => '265434 Санкт-Петербург, ул. Центроальная, д. 7',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerPoint::create([
            'id' => 14,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_id' => 7,
            'partner_point_name' => 'АТ Хабаровск',
            'partner_point_address' => '265439 Хабаровск, ул. Центроальная, д. 77',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"PartnerPoints_id_seq\"', 20, true)");
        }
    }
}
