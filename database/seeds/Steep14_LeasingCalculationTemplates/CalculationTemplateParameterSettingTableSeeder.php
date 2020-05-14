<?php

use Illuminate\Database\Seeder;

class CalculationTemplateParameterSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CalculationTemplateParameterSetting::truncate();

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 1,
            'extension_one_additional_detail_id' => 17,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 1,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => "Розничный лизинг - Стандарт",
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 2,
            'extension_one_additional_detail_id' => 29,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 2,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => false,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 3,
            'extension_one_additional_detail_id' => 18,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 3,
            'number_more'                        => 10,
            'number_less'                        => 99,
            'default_value'                      => 20,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 4,
            'extension_one_additional_detail_id' => 35,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 4,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => false,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 5,
            'extension_one_additional_detail_id' => 20,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 5,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => 36,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 6,
            'extension_one_additional_detail_id' => 7,
            'calculation_template_id'            => 1,
            'db_area_id'                         => 6,
            'line_n'                             => 6,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 7,
            'extension_one_additional_detail_id' => 17,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 1,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => "Розничный лизинг - Экспресс",
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 8,
            'extension_one_additional_detail_id' => 29,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 2,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => false,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 9,
            'extension_one_additional_detail_id' => 18,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 3,
            'number_more'                        => 25,
            'number_less'                        => 40,
            'default_value'                      => 30,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 10,
            'extension_one_additional_detail_id' => 35,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 4,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => false,
            'required_l'                         => false,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 11,
            'extension_one_additional_detail_id' => 20,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 5,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => 24,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        \App\Models\CalculationTemplateParameterSetting::create([
            'id'                                 => 12,
            'extension_one_additional_detail_id' => 7,
            'calculation_template_id'            => 2,
            'db_area_id'                         => 6,
            'line_n'                             => 6,
            'number_more'                        => null,
            'number_less'                        => null,
            'default_value'                      => null,
            'deleted_l'                          => false,
            'actual_l'                           => true,
            'edit_l'                             => true,
            'required_l'                         => true,
            'created_by'                         => 'seeds',
            'updated_by'                         => 'seeds',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"CalculationTemplateParameterSettings_id_seq\"', 10, true)");
        }
    }
}
