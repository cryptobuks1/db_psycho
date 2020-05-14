<?php

use Illuminate\Database\Seeder;

class QTQuestionKindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTQuestionKind::truncate();
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 1,
            'db_area_id' => 6,
            'qt_question_type_id' => 1,
            'question_kind_name' => 'Наименование',
            'question_kind_code' => 'name',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 2,
            'db_area_id' => 6,
            'qt_question_type_id' => 2,
            'question_kind_name' => 'Да/Нет(Список)',
            'question_kind_code' => 'yes_no_select',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 3,
            'db_area_id' => 6,
            'qt_question_type_id' => 4,
            'question_kind_name' => 'Да/Нет(Переключатель)',
            'question_kind_code' => 'yes_no_radio',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 4,
            'db_area_id' => 6,
            'qt_question_type_id' => 5,
            'question_kind_name' => 'Сведения о счетах клиента',
            'question_kind_code' => 'customer_account_information',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 5,
            'db_area_id' => 6,
            'qt_question_type_id' => 5,
            'question_kind_name' => 'Сведения о счетах клиента2',
            'question_kind_code' => 'customer_account_information2',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 6,
            'db_area_id' => 6,
            'qt_question_type_id' => 5,
            'question_kind_name' => 'Основные акционеры ',
            'question_kind_code' => 'major_shareholders',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 7,
            'db_area_id' => 6,
            'qt_question_type_id' => 7,
            'question_kind_name' => 'Контрагенты',
            'question_kind_code' => 'contractors_select',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 8,
            'db_area_id' => 6,
            'qt_question_type_id' => 8,
            'question_kind_name' => 'Страны',
            'question_kind_code' => 'country_select',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 9,
            'db_area_id' => 6,
            'qt_question_type_id' => 9,
            'question_kind_name' => 'Дата',
            'question_kind_code' => 'date',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 10,
            'db_area_id' => 6,
            'qt_question_type_id' => 10,
            'question_kind_name' => 'Время',
            'question_kind_code' => 'time',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 11,
            'db_area_id' => 6,
            'qt_question_type_id' => 11,
            'question_kind_name' => 'Дата и Время',
            'question_kind_code' => 'datetime',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 12,
            'db_area_id' => 6,
            'qt_question_type_id' => 12,
            'question_kind_name' => 'Тип предмета лизинга',
            'question_kind_code' => 'leasing_object_type',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 13,
            'db_area_id' => 6,
            'qt_question_type_id' => 13,
            'question_kind_name' => 'Марка предмета лизинга',
            'question_kind_code' => 'leasing_object_brand',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionKind::create([
            'id' => 14,
            'db_area_id' => 6,
            'qt_question_type_id' => 14,
            'question_kind_name' => 'Модель предмета лизинга',
            'question_kind_code' => 'leasing_object_model',
            'caption_code' => '',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTQuestionKinds_id_seq\"', 100, true)");
        }
    }
}
