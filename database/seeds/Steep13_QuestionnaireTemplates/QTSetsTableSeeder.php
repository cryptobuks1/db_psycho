<?php

use Illuminate\Database\Seeder;

class QTSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTSet::truncate();

        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>1,
            'db_area_id' => 6,
            'qt_block_id' => 1,
            'line_n' => 1,
            'question_set_name' => 'Set 1',
            'question_set_code' => 'set1',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>2,
            'db_area_id' => 6,
            'qt_block_id' => 1,
            'line_n' => 1,
            'question_set_name' => 'Set 2',
            'question_set_code' => 'set2',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>3,
            'db_area_id' => 6,
            'qt_block_id' =>2,
            'line_n' => 2,
            'question_set_name' => 'Set 3',
            'question_set_code' => 'set3',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>4,
            'db_area_id' => 6,
            'qt_block_id' =>1,
            'line_n' => 2,
            'question_set_name' => 'Set 4',
            'question_set_code' => 'set4',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>5,
            'db_area_id' => 6,
            'qt_block_id' =>3,
            'line_n' => 1,
            'question_set_name' => 'Set 5',
            'question_set_code' => 'set5',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>6,
            'db_area_id' => 6,
            'qt_block_id' =>3,
            'line_n' => 2,
            'question_set_name' => 'Set 6',
            'question_set_code' => 'set6',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>7,
            'db_area_id' => 6,
            'qt_block_id' =>3,
            'line_n' => 3,
            'question_set_name' => 'Set 7',
            'question_set_code' => 'set7',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSet::create([
            'id'=>8,
            'db_area_id' => 6,
            'qt_block_id' =>4,
            'line_n' => 1,
            'question_set_name' => 'Set 8',
            'question_set_code' => 'set8',
            'question_set_description' => null,
            'question_set_remark' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTSets_id_seq\"', 100, true)");
        }
    }
}
