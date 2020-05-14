<?php

use Illuminate\Database\Seeder;

class CryptoTokenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CryptoToken::truncate();
        \App\Models\CryptoToken::create( [
            'id'=>1,
            'c_token_name'=>'token1',
            'c_token_code'=>'token1',
            'c_token_symbol'=>'token1',
            'image_id'=>1,
            'c_token_remark'=>NULL,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoToken::create( [
            'id'=>2,
            'c_token_name'=>'token2',
            'c_token_code'=>'token2',
            'c_token_symbol'=>'token2',
            'image_id'=>1,
            'c_token_remark'=>NULL,
            'deleted_l'=>NULL,

        ] );
    }
}
