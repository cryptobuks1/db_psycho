<?php

use Illuminate\Database\Seeder;

class QTSetsQuestionsListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::truncate();

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 1,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 1,
            'question_name' => '1.1.  Организационно-правовая форма и наименование Клиента ',
            'question_code' => 'client_name',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 2,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 2,
            'question_name' => '1.2.  УНП ',
            'question_code' => 'unp',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 3,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 3,
            'question_name' => '1.3.  ОГРН',
            'question_code' => 'ogrn',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 4,
            'qt_question_kind_id' => 11,
            'qt_set_id' => 1,
            'line_n' => 4,
            'question_name' => '1.4.	Дата учреждения',
            'question_code' => 'establishment_date',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 5,
            'qt_question_kind_id' => 9,
            'qt_set_id' => 1,
            'line_n' => 5,
            'question_name' => '1.5.	Дата последней реорганизации',
            'question_code' => 'last_reorganization',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 6,
            'qt_question_kind_id' => 8,
            'qt_set_id' => 1,
            'line_n' => 6,
            'question_name' => '1.6.	Адрес места нахождения (место регистрации)',
            'question_code' => 'registration_place',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 7,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 7,
            'question_name' => '1.7.	Адрес фактического места нахождения единоличного исполнительного органа',
            'question_code' => 'eio_address',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 8,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 8,
            'question_name' => '1.8.	Официальный сайт Клиента в сети Интернет',
            'question_code' => 'official_site',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 9,
            'qt_question_kind_id' => 3,
            'qt_set_id' => 1,
            'line_n' => 9,
            'question_name' => '1.9.	Финансовая отчетность, пояснения к ней размещаются на официальном сайте Клиента в сети Интернет: ',
            'question_code' => 'official_site',
            'question_width' => 100,
            'question_description' => '*Указать наименование сайта, если он отличается от указанного адреса в п.1.8.',
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 10,
            'qt_question_kind_id' => 3,
            'qt_set_id' => 1,
            'line_n' => 11,
            'question_name' => '1.10.	Информация (пресс-релизы) о результатах финансовой и операционной деятельности, структуре и динамике бизнеса Клиента публикуется на официальном сайте  Клиента/Группы, в иных открытых источниках:  ',
            'question_code' => 'official_site',
            'question_width' => 100,
            'question_description' => '*Указать наименование сайта, если он отличается от указанного адреса в п.1.8.',
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 11,
            'qt_question_kind_id' => 4,
            'qt_set_id' => 2,
            'line_n' => 1,
            'question_name' => '1.11.     Сведения о счетах клиента',
            'question_code' => 'customer_account_information',
            'question_width' => 100,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 12,
            'qt_question_kind_id' => 5,
            'qt_set_id' => 4,
            'line_n' => 1,
            'question_name' => '1.12.     Сведения о счетах клиента',
            'question_code' => 'customer_account_information',
            'question_width' => 100,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 13,
            'qt_question_kind_id' => 7,
            'qt_set_id' => 3,
            'line_n' => 1,
            'question_name' => '2.1.	Совет директоров/ Наблюдательный совет (при наличии)',
            'question_code' => 'supervisory_board',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 14,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 3,
            'line_n' => 2,
            'question_name' => '2.2.	Правление или иной аналогичный коллегиальный исполнительный орган (при наличии)',
            'question_code' => 'governing_body',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 15,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 3,
            'line_n' => 3,
            'question_name' => '2.3.	Единоличный исполнительный орган (руководитель) ',
            'question_code' => 'single_executive_body',
            'question_width' => 50,
            'question_required_l' => true,
            'question_description' => 'ФИО; дата рождения; паспортные данные; адрес места регистрации',
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 16,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 3,
            'line_n' => 4,
            'question_name' => '2.4.	Главный бухгалтер (при наличии):',
            'question_code' => 'chief_accountant',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 17,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 3,
            'line_n' => 5,
            'question_name' => '2.5.	Численность персонала общая, человек ',
            'question_code' => 'total_staff',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 18,
            'qt_question_kind_id' => 6,
            'qt_set_id' => 5,
            'line_n' => 1,
            'question_name' => '3.1.	Основные акционеры / участники Клиента, владеющие 1% и более установного капитала Клиента на дату',
            'question_code' => 'major_shareholders',
            'question_width' => 100,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 19,
            'qt_question_kind_id' => 3,
            'qt_set_id' => 6,
            'line_n' => 1,
            'question_name' => 'Государству принадлежит «золотая» акция» или согласно Уставу государство имеет возможность блокировать принятие корпоративных решений;',
            'question_code' => 'major_shareholders',
            'question_width' => 100,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 20,
            'qt_question_kind_id' => 6,
            'qt_set_id' => 7,
            'line_n' => 1,
            'question_name' => '3.2.	Фактические собственники Клиента (Бенефициары) с долей 20% и более с указанием доли каждого Бенефициара',
            'question_code' => 'fact_major_shareholders',
            'question_width' => 100,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 21,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 1,
            'line_n' => 10,
            'question_name' => 'Указать дополнительный сайт',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 22,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 8,
            'line_n' => 1,
            'question_name' => 'Наименование',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 23,
            'qt_question_kind_id' => 2,
            'qt_set_id' => 8,
            'line_n' => 2,
            'question_name' => 'Да/Нет(Список)',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 24,
            'qt_question_kind_id' => 3,
            'qt_set_id' => 8,
            'line_n' => 3,
            'question_name' => 'Да/Нет(Переключатель)',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 25,
            'qt_question_kind_id' => 7,
            'qt_set_id' => 8,
            'line_n' => 4,
            'question_name' => 'Выбор Контрагента',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 26,
            'qt_question_kind_id' => 8,
            'qt_set_id' => 8,
            'line_n' => 5,
            'question_name' => 'Выбор Страны',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 27,
            'qt_question_kind_id' => 9,
            'qt_set_id' => 8,
            'line_n' => 6,
            'question_name' => 'Выбор даты',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 28,
            'qt_question_kind_id' => 10,
            'qt_set_id' => 8,
            'line_n' => 7,
            'question_name' => 'Выбор времени',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 29,
            'qt_question_kind_id' => 11,
            'qt_set_id' => 8,
            'line_n' => 9,
            'question_name' => 'Выбор даты и времени',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 30,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 8,
            'line_n' => 10,
            'question_name' => 'Поле для отработки сценария 1',
            'question_code' => 'add_site',
            'question_width' => 50,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 31,
            'qt_question_kind_id' => 1,
            'qt_set_id' => 8,
            'line_n' => 10,
            'question_name' => 'Поле для отработки сценария 2',
            'question_code' => 'add_site',
            'question_width' => 100,
            'question_required_l' => false,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 32,
            'qt_question_kind_id' => 12,
            'qt_set_id' => 1,
            'line_n' => 12,
            'question_name' => 'Тип предмета лизинга',
            'question_code' => 'leasing_object_type',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 33,
            'qt_question_kind_id' => 13,
            'qt_set_id' => 1,
            'line_n' => 13,
            'question_name' => 'Марка предмета лизинга',
            'question_code' => 'leasing_object_brand',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTSetsQuestionsList::create([
            'id' => 34,
            'qt_question_kind_id' => 14,
            'qt_set_id' => 1,
            'line_n' => 14,
            'question_name' => 'Модель предмета лизинга',
            'question_code' => 'leasing_object_model',
            'question_width' => 50,
            'question_required_l' => true,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTSetsQuestionsList_id_seq\"', 100, true)");
        }
    }
}
