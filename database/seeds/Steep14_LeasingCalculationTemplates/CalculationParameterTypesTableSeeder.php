<?php

use Illuminate\Database\Seeder;

class CalculationParameterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CalculationParameterType::truncate();

        \App\Models\CalculationParameterType::create([
            'id'                              => 1,
            'calculation_parameter_type_code' => "IntegerWithSpaces",
            'calculation_parameter_type_name' => "Целое число с разделителем",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 2,
            'calculation_parameter_type_code' => "Integer",
            'calculation_parameter_type_name' => "Целое число",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 3,
            'calculation_parameter_type_code' => "FloatWithSpaces",
            'calculation_parameter_type_name' => "Действительное число с разделителем",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 4,
            'calculation_parameter_type_code' => "Float",
            'calculation_parameter_type_name' => "Действительное число",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 5,
            'calculation_parameter_type_code' => "String",
            'calculation_parameter_type_name' => "Строка",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 6,
            'calculation_parameter_type_code' => "Date",
            'calculation_parameter_type_name' => "Дата",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 7,
            'calculation_parameter_type_code' => "Time",
            'calculation_parameter_type_name' => "Время",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 8,
            'calculation_parameter_type_code' => "DateTime",
            'calculation_parameter_type_name' => "Дата время",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);

        \App\Models\CalculationParameterType::create([
            'id'                              => 9,
            'calculation_parameter_type_code' => "Boolean",
            'calculation_parameter_type_name' => "Да/нет",
            'reference_l'                     => false,
            'deleted_l'                       => false,
            'active_l'                        => true,
            'created_by'                      => 'seeds',
            'updated_by'                      => 'seeds',
        ]);


        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"CalculationParameterTypes_id_seq\"', 50, true)");
        }
    }
}
