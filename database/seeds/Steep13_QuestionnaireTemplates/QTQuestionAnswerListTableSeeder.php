<?php

use Illuminate\Database\Seeder;

class QTQuestionAnswerListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   \App\Models\QuestionnaireTemplates\QTQuestionAnswerList::truncate();
        \App\Models\QuestionnaireTemplates\QTQuestionAnswerList::create([
            'id'=>1,
            'qt_question_kind_id'=>3,
            'question_answer_value'=>'Да',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionAnswerList::create([
            'id'=>2,
            'qt_question_kind_id'=>3,
            'question_answer_value'=>'Нет',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionAnswerList::create([
            'id'=>3,
            'qt_question_kind_id'=>2,
            'question_answer_value'=>'Да',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionAnswerList::create([
            'id'=>4,
            'qt_question_kind_id'=>2,
            'question_answer_value'=>'Нет',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTQuestionAnswerList_id_seq\"', 100, true)");
        }
    }
}
