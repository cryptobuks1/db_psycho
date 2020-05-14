<?php

use Illuminate\Database\Seeder;

class QTQuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTQuestionType::truncate();
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 1,
            'table_n' => null,
            'question_type_name' => 'Text',
            'question_type_code' => 'text',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 2,
            'table_n' => null,
            'question_type_name' => 'Select',
            'question_type_code' => 'select',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 3,
            'table_n' => null,
            'question_type_name' => 'Checkbox',
            'question_type_code' => 'checkbox',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 4,
            'table_n' => null,
            'question_type_name' => 'Radio',
            'question_type_code' => 'radio',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 5,
            'table_n' => null,
            'question_type_name' => 'Table',
            'question_type_code' => 'table',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 6,
            'table_n' => null,
            'question_type_name' => 'Title',
            'question_type_code' => 'title',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 7,
            'table_n' => 13,
            'question_type_name' => 'Contractors Select',
            'question_type_code' => 'contractors_select',
            'reference_l' => true,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 8,
            'table_n' => 15,
            'question_type_name' => ' Countries Select',
            'question_type_code' => 'countries_select',
            'reference_l' => true,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 9,
            'table_n' => null,
            'question_type_name' => 'Date',
            'question_type_code' => 'date',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 10,
            'table_n' => null,
            'question_type_name' => 'Time',
            'question_type_code' => 'time',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 11,
            'table_n' => null,
            'question_type_name' => 'Datetime',
            'question_type_code' => 'datetime',
            'reference_l' => false,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 12,
            'table_n' => 60,
            'question_type_name' => 'Тип предмета лизинга',
            'question_type_code' => 'leasing_object_type',
            'reference_l' => true,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 13,
            'table_n' => 62,
            'question_type_name' => 'Марка предмета лизинга',
            'question_type_code' => 'leasing_object_brand',
            'reference_l' => true,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionType::create([
            'id' => 14,
            'table_n' => 61,
            'question_type_name' => 'Модель предмета лизинга',
            'question_type_code' => 'leasing_object_model',
            'reference_l' => true,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTQuestionTypes_id_seq\"', 100, true)");
        }
    }
}
