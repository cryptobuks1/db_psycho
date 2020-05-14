<?php

use Illuminate\Database\Seeder;

class QTQuestionTablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTQuestionTable::truncate();
        \App\Models\QuestionnaireTemplates\QTQuestionTable::create([
            'id'=>1,
            'db_area_id'=>6,
            'qt_question_kind_id'=>4,
            'default_lines_quantity'=>0,
            'allow_appending'=>1,
            'view_table_in_set_l'=>1,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionTable::create([
            'id'=>2,
            'db_area_id'=>6,
            'qt_question_kind_id'=>5,
            'default_lines_quantity'=>0,
            'allow_appending'=>1,
            'view_table_in_set_l'=>0,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTable::create([
            'id'=>3,
            'db_area_id'=>6,
            'qt_question_kind_id'=>6,
            'default_lines_quantity'=>0,
            'allow_appending'=>1,
            'view_table_in_set_l'=>0,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTQuestionTables_id_seq\"', 100, true)");
        }
    }
}
