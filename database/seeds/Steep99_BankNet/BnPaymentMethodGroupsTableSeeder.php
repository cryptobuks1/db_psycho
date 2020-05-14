<?php

use Illuminate\Database\Seeder;

class BnPaymentMethodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankNet\BnPaymentMethodGroup::truncate();

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 1,
            "payment_method_group_name" => "Криптовалюта",
            "position" => 1,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 2,
            "payment_method_group_name" => "Электронные деньги",
            "position" => 2,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 3,
            "payment_method_group_name" => "Коды криптобирж",
            "position" => 3,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 4,
            "payment_method_group_name" => "Интернет-банкинг",
            "position" => 4,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 5,
            "payment_method_group_name" => "Денежные переводы",
            "position" => 5,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

        \App\Models\BankNet\BnPaymentMethodGroup::create([
            "id" => 6,
            "payment_method_group_name" => "Наличные деньги",
            "position" => 6,
            "description" => "",
            'created_by' => 'seed',
            'updated_by'=> 'seed',
        ]);

//        if(config("database.default") == "pgsql"){
//
//            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"bnPaymentMethodGroups_id_seq\"', 100, true)");
//        }
    }
}
