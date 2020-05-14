<?php

use Illuminate\Database\Seeder;

class CalculationParameterAnswerListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CalculationParameterAnswerList::truncate();

        \App\Models\CalculationParameterAnswerList::create([
            'id'                                 => 1,
            'extension_one_additional_detail_id' => 17,
            'table_n'                            => null,
            'row_id'                             => null,
            'calculation_parameter_value'        => "Розничный лизинг - Стандарт",
            'deleted_l'                          => false,
            'active_l'                           => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationParameterAnswerList::create([
            'id'                                 => 2,
            'extension_one_additional_detail_id' => 17,
            'table_n'                            => null,
            'row_id'                             => null,
            'calculation_parameter_value'        => "Розничный лизинг - Экспресс",
            'deleted_l'                          => false,
            'active_l'                           => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"CalculationParameterTypes_id_seq\"', 50, true)");
        }
    }
}
