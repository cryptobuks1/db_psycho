<?php

use Illuminate\Database\Seeder;

class AccessRowParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessRowParameter::truncate();

        /**/
        \App\Models\AccessRowParameter::create([
            'id' => 1,
            'table_field_name' => 'lessee_contractor_id',
            'parameter_code' => 'lessee_contractor',
            'parameter_name' => 'Лизингополучатель контрагент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
            'table_n' => 81,
        ]);

        /**/
        \App\Models\AccessRowParameter::create([
            'id' => 2,
            'table_field_name' => 'id',
            'parameter_code' => 'contractor',
            'parameter_name' => 'Контрагент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
            'table_n' => 13,
        ]);


//        /**/
//        \App\Models\AccessRowParameter::create([
//            'id' => 2,
//            'table_n' => 143,
//            'table_field_name' => 'id',
//            'parameter_code' => 'partner_partners',
//            'parameter_name' => 'partner_partners',
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\AccessRowParameter::create([
//            'id' => 3,
//            'table_n' => 147,
//            'table_field_name' => 'id',
//            'parameter_code' => 'partner_regions',
//            'parameter_name' => 'partner_regions',
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\AccessRowParameter::create([
//            'id' => 4,
//            'table_n' => 146,
//            'table_field_name' => 'id',
//            'parameter_code' => 'partner_partner_points',
//            'parameter_name' => 'partner_partner_points',
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
    }
}
