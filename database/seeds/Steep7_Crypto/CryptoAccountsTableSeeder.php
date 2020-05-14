<?php

use Illuminate\Database\Seeder;

class CryptoAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CryptoAccount::truncate();
        \App\Models\CryptoAccount::create( [
            'id'=>1,
            'c_account_name'=>'123456789',
            'table_n'=>7,
            'row_id'=>42,
            'table_n_service'=>44,
            'row_id_service'=>1,
            'c_account_login'=>'123456',
            'c_account_pass'=>'123456',
            'c_account_remark'=>'123456',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>2,
            'c_account_name'=>'987654321',
            'table_n'=>7,
            'row_id'=>43,
            'table_n_service'=>44,
            'row_id_service'=>1,
            'c_account_login'=>'654321',
            'c_account_pass'=>'654321',
            'c_account_remark'=>'654321',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>3,
            'c_account_name'=>'00000000000000',
            'table_n'=>13,
            'row_id'=>1,
            'table_n_service'=>44,
            'row_id_service'=>1,
            'c_account_login'=>'000000000000',
            'c_account_pass'=>'000000000000',
            'c_account_remark'=>'0000000',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>4,
            'c_account_name'=>'1111111111111111',
            'table_n'=>13,
            'row_id'=>2,
            'table_n_service'=>44,
            'row_id_service'=>3,
            'c_account_login'=>'111111111111',
            'c_account_pass'=>'1111111111111',
            'c_account_remark'=>'11111111111111',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>5,
            'c_account_name'=>'aaaaaaaaa',
            'table_n'=>13,
            'row_id'=>1,
            'table_n_service'=>45,
            'row_id_service'=>1,
            'c_account_login'=>'aaaaaaaaa',
            'c_account_pass'=>'aaaaaaaaa',
            'c_account_remark'=>'aaaaaaa',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>6,
            'c_account_name'=>'ssssssssss',
            'table_n'=>13,
            'row_id'=>2,
            'table_n_service'=>45,
            'row_id_service'=>1,
            'c_account_login'=>'qwerty',
            'c_account_pass'=>'qwerty',
            'c_account_remark'=>'qwerty',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>7,
            'c_account_name'=>'2345678',
            'table_n'=>7,
            'row_id'=>42,
            'table_n_service'=>45,
            'row_id_service'=>1,
            'c_account_login'=>'zzzzzzz',
            'c_account_pass'=>'zzzzzzzzz',
            'c_account_remark'=>'3456788',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );

        \App\Models\CryptoAccount::create( [
            'id'=>8,
            'c_account_name'=>'asasasasas',
            'table_n'=>7,
            'row_id'=>43,
            'table_n_service'=>45,
            'row_id_service'=>2,
            'c_account_login'=>'mmmmmmmmmmm',
            'c_account_pass'=>'mmmmmmmmmmm',
            'c_account_remark'=>'asassasasas',
            'actual_l'=>1,
            'deleted_l'=>NULL,

        ] );
    }
}
