<?php

use Illuminate\Database\Seeder;

class AccessTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessType::truncate();

        \App\Models\AccessType::create( [
            'id'=>1,
            'access_type_code'=> "Company",
            'access_type_name'=> "CompanyContractors",
            'table_n'=> "0",
            'action_type_remark'=>'0',
            'use_for_entity_l'=>'1',
            'use_for_list_l'=>'1',
        ] );
    }
}
