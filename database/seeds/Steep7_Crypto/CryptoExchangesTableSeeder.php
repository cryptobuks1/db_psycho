<?php

use Illuminate\Database\Seeder;

class CryptoExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CryptoExchange::truncate();
        \App\Models\CryptoExchange::create( [
            'id'=>1,
            'c_exchange_name'=>'Binance',
            'c_exchange_code'=>'Binance',
            'country_id'=>1,
            'images_id'=>1,
            'c_exchange_url'=>'www.binance.com',
            'c_exchange_remark'=>NULL,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoExchange::create( [
            'id'=>2,
            'c_exchange_name'=>'OKEx',
            'c_exchange_code'=>'OKEx',
            'country_id'=>2,
            'images_id'=>2,
            'c_exchange_url'=>'www.okex.com',
            'c_exchange_remark'=>NULL,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoExchange::create( [
            'id'=>3,
            'c_exchange_name'=>'ZB.COM',
            'c_exchange_code'=>'ZB.COM',
            'country_id'=>3,
            'images_id'=>3,
            'c_exchange_url'=>'www.zb.com',
            'c_exchange_remark'=>NULL,
            'deleted_l'=>NULL,

        ] );
    }
}
