<?php

use Illuminate\Database\Seeder;

class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankAccount::truncate();
        \App\Models\BankAccount::create( [
            'id'=>1,
            'bank_account_n'=>'0079201000000200069',
            'bank_account_name'=>'FIOBCZPPXXX FIO',
            'bank_id'=>1,
            'currency_id'=>2,
            'bank_account_type_id'=>5,
            'table_n'=>7,
            'row_id'=>42,
            'bank_account_code'=>1,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\BankAccount::create( [
            'id'=>2,
            'bank_account_n'=>'4070281001000000789',
            'bank_account_name'=>'КАЛИНИНГРАДСКИЙ ОАО БАНКРОССИЙСКИЙКРЕДИТ',
            'bank_id'=>3,
            'currency_id'=>3,
            'bank_account_type_id'=>2,
            'table_n'=>7,
            'row_id'=>43,
            'bank_account_code'=>2,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\BankAccount::create( [
            'id'=>3,
            'bank_account_n'=>'4070281001000000789',
            'bank_account_name'=>'КАЛИНИНГРАДСКИЙ ОАО БАНКРОССИЙСКИЙКРЕДИТ',
            'bank_id'=>3,
            'currency_id'=>3,
            'bank_account_type_id'=>3,
            'table_n'=>13,
            'row_id'=>1,
            'bank_account_code'=>3,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\BankAccount::create( [
            'id'=>4,
            'bank_account_n'=>'0079201000000200069',
            'bank_account_name'=>'FIOBCZPPXXX FIO',
            'bank_id'=>1,
            'currency_id'=>2,
            'bank_account_type_id'=>2,
            'table_n'=>13,
            'row_id'=>2,
            'bank_account_code'=>4,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\BankAccount::create( [
            'id'=>5,
            'bank_account_n'=>'1234567890987654321',
            'bank_account_name'=>'АО "АЛЬФА БАНК"',
            'bank_id'=>2,
            'currency_id'=>3,
            'bank_account_type_id'=>4,
            'table_n'=>7,
            'row_id'=>44,
            'bank_account_code'=>5,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\Models\BankAccount::create( [
            'id'=>6,
            'bank_account_n'=>'1234567890987654321',
            'bank_account_name'=>'АО "АЛЬФА БАНК"',
            'bank_id'=>2,
            'currency_id'=>3,
            'bank_account_type_id'=>1,
            'table_n'=>13,
            'row_id'=>3,
            'bank_account_code'=>NULL,
            'uid_1c_code'=>NULL,
            'bank_account_remark'=>NULL,
            'actual_l'=>1,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );
    }
}
