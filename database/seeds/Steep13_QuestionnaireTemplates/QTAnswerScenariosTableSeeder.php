<?php

use Illuminate\Database\Seeder;

class QTAnswerScenariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTAnswerScenario::truncate();
        \App\Models\QuestionnaireTemplates\QTAnswerScenario::create([
            'id' => 1,
            'qt_question_answer_id' => 1,
            'qt_sets_questions_list_id' => 9,
            'table_n' => 160,
            'row_id' => 21,
            'qt_scenario_id' => 1,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTAnswerScenario::create([
            'id' => 2,
            'qt_question_answer_id' => 2,
            'qt_sets_questions_list_id' => 9,
            'table_n' => 160,
            'row_id' => 21,
            'qt_scenario_id' => 2,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTAnswerScenario::create([
            'id' => 3,
            'qt_question_answer_id' => 1,
            'qt_sets_questions_list_id' => 10,
            'table_n' => 155,
            'row_id' => 2,
            'qt_scenario_id' => 1,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTAnswerScenario::create([
            'id' => 4,
            'qt_question_answer_id' => 2,
            'qt_sets_questions_list_id' => 10,
            'table_n' => 155,
            'row_id' => 2,
            'qt_scenario_id' => 2,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTAnswerScenarios_id_seq\"', 100, true)");
        }
    }
}
