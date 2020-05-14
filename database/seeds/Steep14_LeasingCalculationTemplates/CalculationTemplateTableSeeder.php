<?php

use Illuminate\Database\Seeder;

class CalculationTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CalculationTemplate::truncate();

        \App\Models\CalculationTemplate::create([
            'id'                        => 1,
            'calculation_template_name' => "Розничный лизинг - Стандарт",
            'calculation_template_code' => "TestTemplate_1",
            'db_area_id'                => 6,
            'deleted_l'                 => false,
            'actual_l'                  => true,
            'created_by'                => 'seeds',
            'updated_by'                => 'seeds',
        ]);

        \App\Models\CalculationTemplate::create([
            'id'                        => 2,
            'calculation_template_name' => "Розничный лизинг - Экспресс",
            'calculation_template_code' => "TestTemplate_2",
            'db_area_id'                => 6,
            'deleted_l'                 => false,
            'actual_l'                  => true,
            'created_by'                => 'seeds',
            'updated_by'                => 'seeds',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"CalculationTemplates_id_seq\"', 10, true)");
        }
    }
}
