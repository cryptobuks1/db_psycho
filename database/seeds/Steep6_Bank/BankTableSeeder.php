<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bank::truncate();

        \App\Models\Bank::create( [
            'id'=>1,
            'bank_name'=>'FIO',
            'bank_name_en'=>'FIO',
            'registry_number'=>'********',
            'bank_swift_code'=>'FIOBCZPPXXX',
            'bank_nation_code'=>'33333333',
            'bank_corr_account'=>'CZ7920100000000060000669',
            'code_reason_number'=>'??????',
            'country_id'=>60,
            'city_name'=>'Прага',
            'city_name_en'=>'Praha',
            'bank_remark'=>'Заметка для банка FIO',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>'10013',
            'created_at'=>NULL,
            'updated_at'=>'2019-01-10 12:12:52'
        ]);

        \App\Models\Bank::create( [
            'id'=>2,
            'bank_name'=>'АО "АЛЬФА БАНК"',
            'bank_name_en'=>'ALFA BANK',
            'registry_number'=>'*********',
            'bank_swift_code'=>'ALFARUMMXXX',
            'bank_nation_code'=>'044525593',
            'bank_corr_account'=>'301018102000000000000593',
            'code_reason_number'=>'???????',
            'country_id'=>192,
            'city_name'=>'Москва',
            'city_name_en'=>'Moscow',
            'bank_remark'=>'Заметка для банка Альфа',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>'10013',
            'created_at'=>NULL,
            'updated_at'=>'2019-01-10 11:45:18'
        ]);
    }
}
