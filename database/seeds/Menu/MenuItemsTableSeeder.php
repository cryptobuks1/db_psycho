<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MenuItem::truncate();


        /**/
        \App\Models\MenuItem::create([
            'id' => 1,
            'menu_item_code' => 'Menu_Group',
            'menu_item_name' => 'Меню',
            'menu_item_parent_id' => NULL,
            'group_l' => 1,
            'line_n' => 1,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 2,
            'menu_item_code' => 'Rbl_LeftMenu_Group',
            'menu_item_name' => 'Левое меню',
            'menu_item_parent_id' => 1,
            'group_l' => 1,
            'line_n' => 1,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 7,
            'menu_item_code' => 'Rbl_Administration_Group',
            'menu_item_name' => 'Администрирование',
            'menu_item_parent_id' => 2,
            'group_l' => 1,
            'line_n' => 9,
            'caption_code' => 'Administration',
            'image_id' => 32,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 8,
            'menu_item_code' => 'Rbl_Administrators',
            'menu_item_name' => 'Пользователи',
            'menu_item_parent_id' => 7,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Users',
            'image_id' => 4,
            'fe_route_id' => 105,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 9,
            'menu_item_code' => 'Rbl_DataExchange',
            'menu_item_name' => 'Обмен данными',
            'menu_item_parent_id' => 7,
            'group_l' => 1,
            'line_n' => 2,
            'caption_code' => 'DataExchange',
            'image_id' => 9,
            'fe_route_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 10,
            'menu_item_code' => 'Rbl_ExternalDatabase_Group',
            'menu_item_name' => 'Настройки Внешних БД',
            'menu_item_parent_id' => 7,
            'group_l' => 1,
            'line_n' => 3,
            'caption_code' => 'ExternalDatabaseSettings',
            'image_id' => 40,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 11,
            'menu_item_code' => 'Rbl_DatabaseServers',
            'menu_item_name' => 'Сервера БД',
            'menu_item_parent_id' => 10,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'DatabaseServers',
            'image_id' => 39,
            'fe_route_id' => 58,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 12,
            'menu_item_code' => 'Rbl_Databases',
            'menu_item_name' => 'Базы данных',
            'menu_item_parent_id' => 10,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'Databases',
            'image_id' => 39,
            'fe_route_id' => 80,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 13,
            'menu_item_code' => 'Rbl_DbTypes',
            'menu_item_name' => 'Типы баз данных',
            'menu_item_parent_id' => 10,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'DbTypes',
            'image_id' => 39,
            'fe_route_id' => 85,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 14,
            'menu_item_code' => 'Rbl_DatabaseAreas',
            'menu_item_name' => 'Области БД',
            'menu_item_parent_id' => 10,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'DatabaseAreas',
            'image_id' => 39,
            'fe_route_id' => 42,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 15,
            'menu_item_code' => 'Rbl_QueryTypes',
            'menu_item_name' => 'Типы Запросов',
            'menu_item_parent_id' => 7,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'QueryTypes',
            'image_id' => 16,
            'fe_route_id' => 103,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:04',
            'updated_at' => '2019-04-11 17:00:04',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 16,
            'menu_item_code' => 'Rbl_SystemParameters_Group',
            'menu_item_name' => 'Системные параметры',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 5,
            'caption_code' => 'SystemParameters',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 17,
            'menu_item_code' => 'Rbl_TopMenu_Group',
            'menu_item_name' => 'Верхнее меню',
            'menu_item_parent_id' => 1,
            'group_l' => 1,
            'line_n' => 2,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 19,
            'menu_item_code' => 'Rbl_Requests',
            'menu_item_name' => 'Заявки на лизинг 6 шагов',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => "LeasingRequests6Steps",
            'image_id' => 41,
            'fe_route_id' => 38,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:01',
            'updated_at' => '2019-04-11 17:00:01',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 24,
            'menu_item_code' => 'Rbl_Development_Group',
            'menu_item_name' => 'Разработка',
            'menu_item_parent_id' => 2,
            'group_l' => 1,
            'line_n' => 10,
            'caption_code' => 'Development',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:05',
            'updated_at' => '2019-04-11 17:00:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 25,
            'menu_item_code' => 'Partners',
            'menu_item_name' => 'Партнеры',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Partners',
            'image_id' => NULL,
            'fe_route_id' => 166,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:05',
            'updated_at' => '2019-04-11 17:00:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 26,
            'menu_item_code' => 'PartnerRegions',
            'menu_item_name' => 'Регионы партнера',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'PartnerRegions',
            'image_id' => NULL,
            'fe_route_id' => 185,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:05',
            'updated_at' => '2019-04-11 17:00:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 27,
            'menu_item_code' => 'PartnerPoints',
            'menu_item_name' => 'Точки партнера',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'PartnerPoints',
            'image_id' => NULL,
            'fe_route_id' => 187,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 15:52:05',
            'updated_at' => '2019-04-23 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 28,
            'menu_item_code' => 'UserInterfaces',
            'menu_item_name' => 'Интерфейсы пользователей',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'UserInterfaces',
            'image_id' => NULL,
            'fe_route_id' => 193,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 29,
            'menu_item_code' => 'AccessAxes',
            'menu_item_name' => 'Оси прав доступа',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 5,
            'caption_code' => 'AccessAxes',
            'image_id' => NULL,
            'fe_route_id' => 195,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 30,
            'menu_item_code' => 'AccessRowParameters',
            'menu_item_name' => 'Параметры доступа на уровне записи',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'RecordAccessSettings',
            'image_id' => NULL,
            'fe_route_id' => 197,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 31,
            'menu_item_code' => 'QuestionnaireTemplates',
            'menu_item_name' => 'Шаблоны анкет',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'QuestionnaireTemplates',
            'image_id' => NULL,
            'fe_route_id' => 210,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);

        /**/
        \App\Models\MenuItem::create([
            'id' => 32,
            'menu_item_code' => 'ActionLogs',
            'menu_item_name' => 'Логи действий (Саша А.) ',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 8,
            'caption_code' => 'ActionLogs',
            'image_id' => NULL,
            'fe_route_id' => 109,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 33,
            'menu_item_code' => 'Admin_Directories',
            'menu_item_name' => 'Админ справочники',
            'menu_item_parent_id' => 2,
            'group_l' => 1,
            'line_n' => 11,
            'caption_code' => 'AdminDirectories',
            'image_id' => NULL,
            'fe_route_id' => 107,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-24 15:52:05',
            'updated_at' => '2019-04-24 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 34,
            'menu_item_code' => 'Rbl_ReportLeasingContractBalance',
            'menu_item_name' => 'Акты взаиморасчетов по договорам лизинга (Альберт)',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 9,
            'caption_code' => 'ReportLeasingContractBalance',
            'image_id' => NULL,
            'fe_route_id' => 99,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 15:52:05',
            'updated_at' => '2019-06-04 15:52:05',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 35,
            'menu_item_code' => 'JournalDocuments',
            'menu_item_name' => 'Журнал документов',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 10,
            'caption_code' => 'JournalDocuments',
            'image_id' => NULL,
            'fe_route_id' => 209,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:06',
            'updated_at' => '2019-06-07 15:52:06',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 36,
            'menu_item_code' => 'Rbl_BlContractorRequestTypes',
            'menu_item_name' => 'Типы запросов контрагентов (Минияр)',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 11,
            'caption_code' => 'ContractorRequestTypes',
            'image_id' => NULL,
            'fe_route_id' => 103,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 37,
            'menu_item_code' => 'Rbl_Files',
            'menu_item_name' => 'Присоед. Файлы',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 12,
            'caption_code' => 'AttachedFiles',
            'image_id' => NULL,
            'fe_route_id' => 114,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 38,
            'menu_item_code' => 'Rbl_SettlementReconciliationActs_Dev',
            'menu_item_name' => 'Акты сверки взаиморасчетов',
            'menu_item_parent_id' => 39,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'ReconciliationRecords',
            'image_id' => NULL,
            'fe_route_id' => 115,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 39,
            'menu_item_code' => 'Rbl_Documents',
            'menu_item_name' => 'Документы',
            'menu_item_parent_id' => 24,
            'group_l' => 1,
            'line_n' => 13,
            'caption_code' => 'Documents',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 40,
            'menu_item_code' => 'Rbl_Invoices_Dev',
            'menu_item_name' => 'Счет-фактура',
            'menu_item_parent_id' => 39,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Invoices',
            'image_id' => NULL,
            'fe_route_id' => 118,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 41,
            'menu_item_code' => 'Rbl_ServiceAcceptanceActs_Dev',
            'menu_item_name' => 'Акт выполненых работ',
            'menu_item_parent_id' => 39,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'AcceptanceActs',
            'image_id' => NULL,
            'fe_route_id' => 117,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 42,
            'menu_item_code' => 'Admin_Directories_Dev',
            'menu_item_name' => 'Админ справочники',
            'menu_item_parent_id' => 24,
            'group_l' => 1,
            'line_n' => 13,
            'caption_code' => 'AdminDirectories',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 43,
            'menu_item_code' => 'Language_Settings',
            'menu_item_name' => 'Настройки языка',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 1,
            'caption_code' => 'LanguageSettings',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 44,
            'menu_item_code' => 'Language_Settings_Languages',
            'menu_item_name' => '',
            'menu_item_parent_id' => 43,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Language',
            'image_id' => NULL,
            'fe_route_id' => 56,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 45,
            'menu_item_code' => 'Language_Settings_Caption',
            'menu_item_name' => '',
            'menu_item_parent_id' => 43,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Caption',
            'image_id' => NULL,
            'fe_route_id' => 76,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 46,
            'menu_item_code' => 'Language_Settings_TranslationCaptions',
            'menu_item_name' => '',
            'menu_item_parent_id' => 43,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'TranslationCaptions',
            'image_id' => NULL,
            'fe_route_id' => 78,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 47,
            'menu_item_code' => 'Countries_And_Regions',
            'menu_item_name' => 'Страны и регионы',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 2,
            'caption_code' => 'CountryAndRegion',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 48,
            'menu_item_code' => 'Countries',
            'menu_item_name' => '',
            'menu_item_parent_id' => 47,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Countries',
            'image_id' => NULL,
            'fe_route_id' => 44,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 49,
            'menu_item_code' => 'Regions',
            'menu_item_name' => '',
            'menu_item_parent_id' => 47,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Regions',
            'image_id' => NULL,
            'fe_route_id' => 82,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:52:07',
            'updated_at' => '2019-06-07 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 50,
            'menu_item_code' => 'Finances',
            'menu_item_name' => 'Финансы',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 3,
            'caption_code' => 'Finances',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 51,
            'menu_item_code' => 'Currencies',
            'menu_item_name' => 'Валюты',
            'menu_item_parent_id' => 50,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Currencies',
            'image_id' => NULL,
            'fe_route_id' => 70,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 52,
            'menu_item_code' => 'Banks',
            'menu_item_name' => 'Банки',
            'menu_item_parent_id' => 50,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Banks',
            'image_id' => NULL,
            'fe_route_id' => 60,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 53,
            'menu_item_code' => 'Bank_Accounts',
            'menu_item_name' => 'Банковские счета',
            'menu_item_parent_id' => 50,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'BankAccounts',
            'image_id' => NULL,
            'fe_route_id' => 22,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 54,
            'menu_item_code' => 'Bank_Account_Types',
            'menu_item_name' => 'Типы банковских счетов',
            'menu_item_parent_id' => 50,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'BankAccountTypes',
            'image_id' => NULL,
            'fe_route_id' => 62,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 55,
            'menu_item_code' => 'System_Images',
            'menu_item_name' => 'Системные картинки',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 4,
            'caption_code' => 'SystemImages',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 56,
            'menu_item_code' => 'Images',
            'menu_item_name' => 'Картинки',
            'menu_item_parent_id' => 55,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Images',
            'image_id' => NULL,
            'fe_route_id' => 66,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 57,
            'menu_item_code' => 'Image_Categories',
            'menu_item_name' => 'Категории картинок',
            'menu_item_parent_id' => 55,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'ImageCategories',
            'image_id' => NULL,
            'fe_route_id' => 68,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 58,
            'menu_item_code' => 'File_Types',
            'menu_item_name' => 'Типы файлов',
            'menu_item_parent_id' => 55,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'FileTypes',
            'image_id' => NULL,
            'fe_route_id' => 50,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 59,
            'menu_item_code' => 'Rbl_Invoices',
            'menu_item_name' => 'Счет-фактура',
            'menu_item_parent_id' => 22,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Invoices',
            'image_id' => NULL,
            'fe_route_id' => 118,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 60,
            'menu_item_code' => 'Rbl_ServiceAcceptanceActs',
            'menu_item_name' => 'Акт выполненых работ',
            'menu_item_parent_id' => 22,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'AcceptanceActs',
            'image_id' => NULL,
            'fe_route_id' => 117,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 62,
            'menu_item_code' => 'Rbl_SystemParameters',
            'menu_item_name' => 'Системные параметры',
            'menu_item_parent_id' => 16,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'SystemParameters',
            'image_id' => 37,
            'fe_route_id' => 122,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 63,
            'menu_item_code' => 'Rbl_SystemParameters',
            'menu_item_name' => 'Значения системных параметров',
            'menu_item_parent_id' => 16,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'SystemParametersValues',
            'image_id' => 37,
            'fe_route_id' => 124,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 64,
            'menu_item_code' => 'System_Tables',
            'menu_item_name' => 'Системные таблицы',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 5,
            'caption_code' => 'SystemTables',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 65,
            'menu_item_code' => 'Models',
            'menu_item_name' => 'Модели',
            'menu_item_parent_id' => 64,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Models',
            'image_id' => NULL,
            'fe_route_id' => 126,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 66,
            'menu_item_code' => 'Controllers',
            'menu_item_name' => 'Контроллеры',
            'menu_item_parent_id' => 64,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Controllers',
            'image_id' => NULL,
            'fe_route_id' => 128,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 67,
            'menu_item_code' => 'Menu',
            'menu_item_name' => 'Меню ',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 6,
            'caption_code' => 'Menu',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 68,
            'menu_item_code' => 'MenuItems',
            'menu_item_name' => 'Меню и его группы/пункты',
            'menu_item_parent_id' => 67,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'MenuItems',
            'image_id' => NULL,
            'fe_route_id' => 130,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 69,
            'menu_item_code' => 'MenuItemAccessRoles',
            'menu_item_name' => 'Доступы к пунктам меню по ролям',
            'menu_item_parent_id' => 67,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'MenuItemAccessRoles',
            'image_id' => NULL,
            'fe_route_id' => 133,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 70,
            'menu_item_code' => 'Rbl_PaymentInvoices',
            'menu_item_name' => 'Счета на оплату',
            'menu_item_parent_id' => 22,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'LeasingPaymentAccounts',
            'image_id' => NULL,
            'fe_route_id' => 135,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 71,
            'menu_item_code' => 'Routes',
            'menu_item_name' => 'Роуты',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 7,
            'caption_code' => 'Routes',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 72,
            'menu_item_code' => 'BeRoutes',
            'menu_item_name' => 'BeRoutes',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'BeRoutes',
            'image_id' => NULL,
            'fe_route_id' => 137,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 73,
            'menu_item_code' => 'FeComponents',
            'menu_item_name' => 'FeComponents',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'FeComponents',
            'image_id' => NULL,
            'fe_route_id' => 139,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 74,
            'menu_item_code' => 'FeUrls',
            'menu_item_name' => 'FeUrls',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'FeUrls',
            'image_id' => NULL,
            'fe_route_id' => 141,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 75,
            'menu_item_code' => 'FeRoutes',
            'menu_item_name' => 'FeRoutes',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'FeRoutes',
            'image_id' => NULL,
            'fe_route_id' => 143,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 76,
            'menu_item_code' => 'FeRouteUrls',
            'menu_item_name' => 'FeRouteUrls',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 5,
            'caption_code' => 'FeRouteUrls',
            'image_id' => NULL,
            'fe_route_id' => 145,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 77,
            'menu_item_code' => 'FeRouteSteps',
            'menu_item_name' => 'FeRouteSteps',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'FeRouteSteps',
            'image_id' => NULL,
            'fe_route_id' => 147,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 78,
            'menu_item_code' => 'FeRouteObjects',
            'menu_item_name' => 'FeRouteObjects',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 7,
            'caption_code' => 'FeRouteObjects',
            'image_id' => NULL,
            'fe_route_id' => 149,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 79,
            'menu_item_code' => 'FeRouteStepObjects',
            'menu_item_name' => 'FeRouteStepObjects',
            'menu_item_parent_id' => 71,
            'group_l' => 0,
            'line_n' => 8,
            'caption_code' => 'FeRouteStepObjects',
            'image_id' => NULL,
            'fe_route_id' => 151,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 80,
            'menu_item_code' => 'Rbl_DataExchangeLogGroupBy',
            'menu_item_name' => 'Обмен итоги',
            'menu_item_parent_id' => 9,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'ExchangeTotal',
            'image_id' => NULL,
            'fe_route_id' => 153,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 81,
            'menu_item_code' => 'Rbl_DataExchangeLog',
            'menu_item_name' => 'Обмен логи',
            'menu_item_parent_id' => 9,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'ExchangeLog',
            'image_id' => NULL,
            'fe_route_id' => 154,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 82,
            'menu_item_code' => 'Rbl_PreliminaryOffers',
            'menu_item_name' => 'Коммерческие предложения',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'PreliminaryOffers',
            'image_id' => 38,
            'fe_route_id' => 88,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 83,
            'menu_item_code' => 'Rbl_Requests',
            'menu_item_name' => 'Заявки на лизинг',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Requests',
            'image_id' => 41,
            'fe_route_id' => 90,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 84,
            'menu_item_code' => 'Rbl_LeasingContracts',
            'menu_item_name' => 'Договоры лизинга',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'Contracts',
            'image_id' => 33,
            'fe_route_id' => 97,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 85,
            'menu_item_code' => 'Rbl_MutualSettlements_Group',
            'menu_item_name' => 'Взаиморасчеты',
            'menu_item_parent_id' => 2,
            'group_l' => 1,
            'line_n' => 4,
            'caption_code' => 'MutualSettlements',
            'image_id' => 36,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 86,
            'menu_item_code' => 'Rbl_PaymentInvoices',
            'menu_item_name' => 'Счет на оплату лизинговых платежей',
            'menu_item_parent_id' => 85,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'LeasingPaymentAccount',
            'image_id' => NULL,
            'fe_route_id' => 135,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 87,
            'menu_item_code' => 'Rbl_Invoices',
            'menu_item_name' => 'Счет-фактура',
            'menu_item_parent_id' => 85,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'Invoice',
            'image_id' => NULL,
            'fe_route_id' => 118,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 88,
            'menu_item_code' => 'Rbl_ServiceAcceptanceActs',
            'menu_item_name' => 'Акт выполненых работ',
            'menu_item_parent_id' => 85,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'AcceptanceAct',
            'image_id' => NULL,
            'fe_route_id' => 117,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 89,
            'menu_item_code' => 'Rbl_InsurancePolicies',
            'menu_item_name' => 'Страхование',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 5,
            'caption_code' => 'Insurance',
            'image_id' => 35,
            'fe_route_id' => 100,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 90,
            'menu_item_code' => 'Rbl_Queries',
            'menu_item_name' => 'Запросы',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'Queries',
            'image_id' => 14,
            'fe_route_id' => 98,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 91,
            'menu_item_code' => 'Rbl_Help',
            'menu_item_name' => 'Справка',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 7,
            'caption_code' => 'Help',
            'image_id' => 34,
            'fe_route_id' => 107,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 92,
            'menu_item_code' => 'Rbl_Contacts',
            'menu_item_name' => 'Контакты',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 8,
            'caption_code' => 'Contacts',
            'image_id' => NULL,
            'fe_route_id' => 5,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 15:52:07',
            'updated_at' => '2019-08-29 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 93,
            'menu_item_code' => 'Rbl_Client',
            'menu_item_name' => 'Клиенты',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'Contractors',
            'image_id' => 6,
            'fe_route_id' => 93,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 94,
            'menu_item_code' => 'QuestionnaireTemplates_Group',
            'menu_item_name' => 'Настройка шаблонов анкет',
            'menu_item_parent_id' => 24,
            'group_l' => 1,
            'line_n' => 12,
            'caption_code' => 'QuestionnaireTemplatesSettings',
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 95,
            'menu_item_code' => 'QTPages',
            'menu_item_name' => 'Страницы шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'QTPages',
            'image_id' => NULL,
            'fe_route_id' => 201,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 96,
            'menu_item_code' => 'QTBlocks',
            'menu_item_name' => 'Блоки шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'QTBlocks',
            'image_id' => NULL,
            'fe_route_id' => 203,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 97,
            'menu_item_code' => 'QTSets',
            'menu_item_name' => 'Наборы шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'QTSets',
            'image_id' => NULL,
            'fe_route_id' => 205,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 98,
            'menu_item_code' => 'QTQuestionKinds',
            'menu_item_name' => 'Виды вопросов шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'QTQuestionKinds',
            'image_id' => NULL,
            'fe_route_id' => 207,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 17:00:00',
            'updated_at' => '2019-04-11 17:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 99,
            'menu_item_code' => 'Rbl_PreliminaryOffers',
            'menu_item_name' => 'Коммерческие предложения',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 13,
            'caption_code' => 'PreliminaryOffers',
            'image_id' => 38,
            'fe_route_id' => 214,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 15:52:07',
            'updated_at' => '2019-08-02 15:52:07',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 100,
            'menu_item_code' => 'CalculationTemplates',
            'menu_item_name' => 'Шаблоны расчетов',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 15,
            'caption_code' => 'CalculationTemplates',
            'image_id' => NULL,
            'fe_route_id' => 215,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 101,
            'menu_item_code' => 'OneAdditionalDetails',
            'menu_item_name' => 'Параметры из 1С',
            'menu_item_parent_id' => 24,
            'group_l' => 0,
            'line_n' => 14,
            'caption_code' => 'OneAdditionalDetails',
            'image_id' => NULL,
            'fe_route_id' => 218,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 102,
            'menu_item_code' => 'QTQuestions',
            'menu_item_name' => 'Вопросы шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 5,
            'caption_code' => 'QTQuestions',
            'image_id' => NULL,
            'fe_route_id' => 231,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 103,
            'menu_item_code' => 'DemoCreateCustomerRequests',
            'menu_item_name' => 'Оформление заявки на лизинг',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => "LeasingApplicationForm",
            'image_id' => NULL,
            'fe_route_id' => 112,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 104,
            'menu_item_code' => 'AccessSettings',
            'menu_item_name' => 'Настройки доступов',
            'menu_item_parent_id' => 33,
            'group_l' => 1,
            'line_n' => 8,
            'caption_code' => "AccessSettings",
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 105,
            'menu_item_code' => 'AccessRoles',
            'menu_item_name' => 'Роли доступов',
            'menu_item_parent_id' => 104,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'AccessRoles',
            'image_id' => NULL,
            'fe_route_id' => 225,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 106,
            'menu_item_code' => 'QTQuestionTypes',
            'menu_item_name' => 'Типы вопросов шаблонов',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 7,
            'caption_code' => 'QTQuestionTypes',
            'image_id' => NULL,
            'fe_route_id' => 229,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 107,
            'menu_item_code' => 'QTValidations',
            'menu_item_name' => 'Валидации',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 8,
            'caption_code' => 'QTValidations',
            'image_id' => NULL,
            'fe_route_id' => 244,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\MenuItem::create([
            'id' => 108,
            'menu_item_code' => 'QTValidationRules',
            'menu_item_name' => 'Правила валидаций',
            'menu_item_parent_id' => 94,
            'group_l' => 0,
            'line_n' => 9,
            'caption_code' => 'QTValidationRules',
            'image_id' => NULL,
            'fe_route_id' => 246,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 109,
            'menu_item_code' => 'UserLogin',
            'menu_item_name' => 'Вход под пользователем',
            'menu_item_parent_id' => 7,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'UserLogin',
            'image_id' => 4,
            'fe_route_id' => 250,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 110,
            'menu_item_code' => 'SettingCalculations_Group',
            'menu_item_name' => 'Настрока расчетов',
            'menu_item_parent_id' => 7,
            'group_l' => 1,
            'line_n' => 5,
            'caption_code' => 'SettingCalculations',
            'image_id' => 40,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 111,
            'menu_item_code' => 'CalculationTemplates',
            'menu_item_name' => 'Шаблоны расчетов',
            'menu_item_parent_id' => 110,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'CalculationTemplates',
            'image_id' => NULL,
            'fe_route_id' => 215,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 112,
            'menu_item_code' => 'OneAdditionalDetails',
            'menu_item_name' => 'Дополнительные реквизиты/Параметры расчета',
            'menu_item_parent_id' => 110,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'OneAdditionalDetails',
            'image_id' => NULL,
            'fe_route_id' => 218,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 113,
            'menu_item_code' => 'ActionLogs',
            'menu_item_name' => 'Логи действий',
            'menu_item_parent_id' => 7,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'ActionLogs',
            'image_id' => NULL,
            'fe_route_id' => 109,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 120,
            'menu_item_code' => 'Menu_Client_Left',
            'menu_item_name' => 'Меню клиента левое ',
            'menu_item_parent_id' => 1,
            'group_l' => 1,
            'line_n' => 3,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 121,
            'menu_item_code' => 'Client_LeasingCalculations',
            'menu_item_name' => 'Коммерческие предложения',
            'menu_item_parent_id' => 120,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'PreliminaryOffers',
            'image_id' => 38,
            'fe_route_id' => 224,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 123,
            'menu_item_code' => 'QuestionnaireSteps',
            'menu_item_name' => 'Заявки на лизинг с анкетой',
            'menu_item_parent_id' => 2,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'QuestionnaireRequests',
            'image_id' => 41,
            'fe_route_id' => 228,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 132,
            'menu_item_code' => 'BankNet',
            'menu_item_name' => 'BankNet',
            'menu_item_parent_id' => 24,
            'group_l' => 1,
            'line_n' => 1,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 133,
            'menu_item_code' => 'BankNet_Currencies',
            'menu_item_name' => 'Валюты (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'BnCurrencies',
            'image_id' => NULL,
            'fe_route_id' => 232,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 134,
            'menu_item_code' => 'BankNet_PaymentMethodGroups',
            'menu_item_name' => 'Группы направлений ввода/вывода (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => 'BnPaymentMethodGroups',
            'image_id' => NULL,
            'fe_route_id' => 236,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 135,
            'menu_item_code' => 'BankNet_PaymentMethods',
            'menu_item_name' => 'Методы/способы оплат (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'BnPaymentMethods',
            'image_id' => NULL,
            'fe_route_id' => 234,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 136,
            'menu_item_code' => 'BankNet_Exchangers',
            'menu_item_name' => 'Обменники (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 4,
            'caption_code' => 'BnExchangers',
            'image_id' => NULL,
            'fe_route_id' => 238,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 137,
            'menu_item_code' => 'BankNet_ExchangeDirections',
            'menu_item_name' => 'Направления обмена (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 5,
            'caption_code' => 'BnExchangeDirections',
            'image_id' => NULL,
            'fe_route_id' => 240,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 138,
            'menu_item_code' => 'BankNet_ExchangeOffers',
            'menu_item_name' => 'Объявления обмена (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 6,
            'caption_code' => 'BnExchangeOffers',
            'image_id' => NULL,
            'fe_route_id' => 242,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 139,
            'menu_item_code' => 'BankNet_FAQ',
            'menu_item_name' => 'FAQ (BankNet)',
            'menu_item_parent_id' => 132,
            'group_l' => 0,
            'line_n' => 7,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => 107,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 145,
            'menu_item_code' => 'BankNet_Top_Menu',
            'menu_item_name' => 'BankNetTopMenu',
            'menu_item_parent_id' => 24,
            'group_l' => 1,
            'line_n' => 1,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => NULL,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 146,
            'menu_item_code' => 'BankNet_ExchangeOffers',
            'menu_item_name' => 'BankNet_ExchangeOffers',
            'menu_item_parent_id' => 145,
            'group_l' => 0,
            'line_n' => 1,
            'caption_code' => 'Exchangers',
            'image_id' => NULL,
            'fe_route_id' => 249,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 147,
            'menu_item_code' => 'BankNet_FAQ',
            'menu_item_name' => 'FAQ',
            'menu_item_parent_id' => 145,
            'group_l' => 0,
            'line_n' => 2,
            'caption_code' => NULL,
            'image_id' => NULL,
            'fe_route_id' => 107,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\MenuItem::create([
            'id' => 148,
            'menu_item_code' => 'BankNet_Contacts',
            'menu_item_name' => 'BankNet_Contacts',
            'menu_item_parent_id' => 145,
            'group_l' => 0,
            'line_n' => 3,
            'caption_code' => 'Contacts',
            'image_id' => NULL,
            'fe_route_id' => 248,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"MenuItems_id_seq\"', 2000, true)");
        }

    }
}
