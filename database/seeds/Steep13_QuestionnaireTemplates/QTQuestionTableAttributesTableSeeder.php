<?php

use Illuminate\Database\Seeder;

class QTQuestionTableAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::truncate();
        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 1,
            'qt_question_table_id' => 1,
            'qt_question_kind_id' => 1,
            'line_n' => 1,
            'question_name' => '№ п/п',
            'question_code' => 'number',
            'question_width' => 10,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 2,
            'qt_question_table_id' => 1,
            'qt_question_kind_id' => 1,
            'line_n' => 2,
            'question_name' => 'Банк/ филиал Банка, его местонахождение',
            'question_code' => 'bank_name',
            'question_width' => 30,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 3,
            'qt_question_table_id' => 1,
            'qt_question_kind_id' => 1,
            'line_n' => 3,
            'question_name' => '№ расчетного счета',
            'question_code' => 'account_number',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 4,
            'qt_question_table_id' => 1,
            'qt_question_kind_id' => 1,
            'line_n' => 4,
            'question_name' => 'Дата открытия счета',
            'question_code' => 'account_number_issue_date',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 5,
            'qt_question_table_id' => 1,
            'qt_question_kind_id' => 1,
            'line_n' => 5,
            'question_name' => 'Ежемесячный кредитовый оборот по счету (в среднем за последние 12 месяцев), млн.руб.',
            'question_code' => 'monthly_loan_turnover',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 6,
            'qt_question_table_id' => 2,
            'qt_question_kind_id' => 1,
            'line_n' => 1,
            'question_name' => '№ п/п',
            'question_code' => 'number',
            'question_width' => 10,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 7,
            'qt_question_table_id' => 2,
            'qt_question_kind_id' => 1,
            'line_n' => 2,
            'question_name' => 'Банк, его местонахождение2',
            'question_code' => 'bank_name',
            'question_width' => 30,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 8,
            'qt_question_table_id' => 2,
            'qt_question_kind_id' => 1,
            'line_n' => 3,
            'question_name' => 'Сумма картотеки',
            'question_code' => 'card_file_amount',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 9,
            'qt_question_table_id' => 2,
            'qt_question_kind_id' => 1,
            'line_n' => 4,
            'question_name' => 'Дата возникновения картотеки',
            'question_code' => 'filing_date',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 10,
            'qt_question_table_id' => 3,
            'qt_question_kind_id' => 1,
            'line_n' => 1,
            'question_name' => 'Наименование акционера/участника',
            'question_code' => 'shareholder_name',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 11,
            'qt_question_table_id' => 3,
            'qt_question_kind_id' => 1,
            'line_n' => 2,
            'question_name' => 'УНП',
            'question_code' => 'unp',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 12,
            'qt_question_table_id' => 3,
            'qt_question_kind_id' => 1,
            'line_n' => 3,
            'question_name' => 'Доля в уставном капитале Клиента, %',
            'question_code' => 'authorized_capital_share',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTQuestionTableAttribute::create([
            'id' => 13,
            'qt_question_table_id' => 3,
            'qt_question_kind_id' => 1,
            'line_n' => 4,
            'question_name' => 'Место нахождения (страна, город)',
            'question_code' => 'location',
            'question_width' => 20,
            'question_required_l' => 0,
            'caption_code' => null,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTQuestionTableAttributes_id_seq\"', 100, true)");
        }
    }
}
