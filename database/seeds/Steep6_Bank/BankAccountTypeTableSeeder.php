<?php

use Illuminate\Database\Seeder;

class BankAccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankAccountType::truncate();
        \App\Models\BankAccountType::create( [
            'id'=>1,
            'bank_account_type_code'=>'РасчетныйCчет',
            'bank_account_type_name'=>'Расчетный Cчет',
            'bank_account_type_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        \App\Models\BankAccountType::create( [
            'id'=>2,
            'bank_account_type_code'=>'СсудныйCчет',
            'bank_account_type_name'=>'Ссудный Cчет',
            'bank_account_type_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        \App\Models\BankAccountType::create( [
            'id'=>3,
            'bank_account_type_code'=>'ВалютныйCчет',
            'bank_account_type_name'=>'Валютный Cчет',
            'bank_account_type_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        \App\Models\BankAccountType::create( [
            'id'=>4,
            'bank_account_type_code'=>'ТекущийCчет',
            'bank_account_type_name'=>'Текущий Cчет',
            'bank_account_type_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

        \App\Models\BankAccountType::create( [
            'id'=>5,
            'bank_account_type_code'=>'ДепозитныйCчет',
            'bank_account_type_name'=>'Депозитный Cчет',
            'bank_account_type_remark'=>NULL,
            'deleted_l'=>NULL,
            'created_by'=>NULL,
            'updated_by'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );
    }
}
