<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currency::truncate();
        \App\Models\Currency::create( [
            'id'=>1,
            'currency_name'=>'Dollar',
            'currency_code'=>'Dollar',
            'currency_code_n'=>1,
            'currency_symbol'=>'$',
            'country_id'=>1,
            'c_token_id'=>1,
            'image_id'=>1,
            'currency_remark'=>'',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\Currency::create( [
            'id'=>2,
            'currency_name'=>'Euro',
            'currency_code'=>'Euro',
            'currency_code_n'=>2,
            'currency_symbol'=>'€',
            'country_id'=>2,
            'c_token_id'=>1,
            'image_id'=>2,
            'currency_remark'=>'',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\Currency::create( [
            'id'=>3,
            'currency_name'=>'Ruble',
            'currency_code'=>'Ruble',
            'currency_code_n'=>3,
            'currency_symbol'=>'₽',
            'country_id'=>3,
            'c_token_id'=>1,
            'image_id'=>1,
            'currency_remark'=>'',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\Currency::create( [
            'id'=>4,
            'currency_name'=>'Hryvnia',
            'currency_code'=>'Hryvnia',
            'currency_code_n'=>4,
            'currency_symbol'=>'₴',
            'country_id'=>7,
            'c_token_id'=>1,
            'image_id'=>1,
            'currency_remark'=>'',
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );


    }
}
