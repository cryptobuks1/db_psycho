<?php

use Illuminate\Database\Seeder;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Partner::truncate();


        \App\Models\Partner::create([
            'id'            => 1,
            'db_area_id'    => 6,
            'use_regions'   => false,
            'contractor_id' => 11,
            'partner_name'  => 'АВТОБУМ',
            'uid_1c_code'   => null,
            'actual_l'      => true,
            'deleted_l'     => false,
            'created_at'    => '2019-11-08 10:48:02',
            'created_by'    => '2019-11-08 10:48:02',
            'updated_at'    => '2019-11-08 10:48:02',
            'updated_by'    => '2019-11-08 10:48:02',
        ]);


        \App\Models\Partner::create([
            'id'            => 2,
            'db_area_id'    => 6,
            'use_regions'   => true,
            'contractor_id' => 4,
            'partner_name'  => 'АВТОТОРГ',
            'uid_1c_code'   => null,
            'actual_l'      => true,
            'deleted_l'     => false,
            'created_at'    => '2019-11-08 10:48:02',
            'created_by'    => '2019-11-08 10:48:02',
            'updated_at'    => '2019-11-08 10:48:02',
            'updated_by'    => '2019-11-08 10:48:02',
        ]);


        \App\Models\Partner::create([
            'id'            => 3,
            'db_area_id'    => 6,
            'use_regions'   => true,
            'contractor_id' => 7,
            'partner_name'  => 'AUDI',
            'uid_1c_code'   => null,
            'actual_l'      => true,
            'deleted_l'     => false,
            'created_at'    => '2019-11-08 10:48:02',
            'created_by'    => '2019-11-08 10:48:02',
            'updated_at'    => '2019-11-08 10:48:02',
            'updated_by'    => '2019-11-08 10:48:02',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"Partners_id_seq\"', 10, true)");
        }
    }
}
