<?php

use Illuminate\Database\Seeder;

class PartnerRegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PartnerRegion::truncate();

        \App\Models\PartnerRegion::create([
            'id' => 1,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Ульяновская область',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 2,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Саратовская область',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 3,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Архангельская область',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 4,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Москва',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 5,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Санкт-Петербург',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 6,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Краснодарский край',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 7,
            'db_area_id' => 6,
            'partner_id' => 2,
            'partner_regions_name' => 'Хабаровский край',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 8,
            'db_area_id' => 6,
            'partner_id' => 3,
            'partner_regions_name' => 'Москва',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        \App\Models\PartnerRegion::create([
            'id' => 9,
            'db_area_id' => 6,
            'partner_id' => 3,
            'partner_regions_name' => 'Хабаровские подразделения',
            'uid_1c_code' => null,
            'actual_l' => true,
            'deleted_l' => false,
            'created_at' => '2019-12-17 10:48:02',
            'created_by' => '2019-12-17 10:48:02',
            'updated_at' => '2019-12-17 10:48:02',
            'updated_by' => '2019-12-17 10:48:02',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"PartnerRegions_id_seq\"', 20, true)");
        }
    }
}
