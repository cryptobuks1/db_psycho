<?php

use Illuminate\Database\Seeder;

class CryptoPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CryptoPlatform::truncate();
        \App\Models\CryptoPlatform::create( [
            'id'=>1,
            'c_platform_code'=>'1256',
            'c_platform_name'=>'24option',
            'c_platform_url'=>'lp.24option.com',
            'c_platform_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>'10013',
            'created_at'=>NULL,
            'updated_at'=>'2019-01-14 11:04:31'
        ] );



        \App\Models\CryptoPlatform::create( [
            'id'=>2,
            'c_platform_code'=>'6533',
            'c_platform_name'=>'eToro',
            'c_platform_url'=>'content.etoro.com',
            'c_platform_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );
    }
}
