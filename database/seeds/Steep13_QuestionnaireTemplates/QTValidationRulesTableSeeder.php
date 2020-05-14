<?php

use Illuminate\Database\Seeder;

class QTValidationRulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTValidationRule::truncate();

        \App\Models\QuestionnaireTemplates\QTValidationRule::create([
            'id' => 1,
            'qt_validation_id'=>1,
            'validation_rule_name'=>'Длина больше 5',
            'validation_value'=>'5',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTValidationRule::create([
            'id' => 2,
            'qt_validation_id'=>1,
            'validation_rule_name'=>'Длина больше 7',
            'validation_value'=>'7',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTValidationRule::create([
            'id' => 3,
            'qt_validation_id'=>4,
            'validation_rule_name'=>'Значение больше 5',
            'validation_value'=>'5',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTValidationRule::create([
            'id' => 4,
            'qt_validation_id'=>4,
            'validation_rule_name'=>'Значение больше 7',
            'validation_value'=>'7',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTValidations_id_seq\"', 100, true)");
        }
    }
}
