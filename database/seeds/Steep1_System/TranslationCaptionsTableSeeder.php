<?php

use Illuminate\Database\Seeder;

class TranslationCaptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TranslationCaption::truncate();


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 5,
            'language_id' => 1,
            'caption_id' => 5,
            'caption_translation' => 'Admin Panel',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 13:03:33',
            'updated_at' => '2018-07-24 13:03:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 7,
            'language_id' => 1,
            'caption_id' => 7,
            'caption_translation' => 'Welcome to Admin Panel',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 8:46:04',
            'updated_at' => '2018-07-24 8:46:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 8,
            'language_id' => 2,
            'caption_id' => 7,
            'caption_translation' => 'Добро пожаловать в админку',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 8:46:04',
            'updated_at' => '2018-07-24 8:46:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 9,
            'language_id' => 1,
            'caption_id' => 9,
            'caption_translation' => 'User Profile',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 13:03:33',
            'updated_at' => '2018-07-24 13:03:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 10,
            'language_id' => 2,
            'caption_id' => 9,
            'caption_translation' => 'Профиль пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 13:03:33',
            'updated_at' => '2018-07-24 13:03:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 11,
            'language_id' => 1,
            'caption_id' => 11,
            'caption_translation' => 'Administration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 14:56:53',
            'updated_at' => '2018-07-31 14:56:53',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 12,
            'language_id' => 2,
            'caption_id' => 11,
            'caption_translation' => 'Администрирование',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 14:41:29',
            'updated_at' => '2018-07-31 14:41:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 13,
            'language_id' => 1,
            'caption_id' => 13,
            'caption_translation' => 'DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 14:41:29',
            'updated_at' => '2018-07-31 14:41:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 14,
            'language_id' => 2,
            'caption_id' => 13,
            'caption_translation' => 'БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 14:41:29',
            'updated_at' => '2018-07-31 14:41:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 15,
            'language_id' => 1,
            'caption_id' => 15,
            'caption_translation' => 'Country and Region',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 14:41:29',
            'updated_at' => '2018-07-31 14:41:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 16,
            'language_id' => 2,
            'caption_id' => 15,
            'caption_translation' => 'Страна и регион',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 19,
            'language_id' => 1,
            'caption_id' => 19,
            'caption_translation' => 'Organizations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 20,
            'language_id' => 2,
            'caption_id' => 19,
            'caption_translation' => 'Организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 21,
            'language_id' => 1,
            'caption_id' => 21,
            'caption_translation' => 'Reports',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 22,
            'language_id' => 2,
            'caption_id' => 21,
            'caption_translation' => 'Отчеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 23,
            'language_id' => 1,
            'caption_id' => 23,
            'caption_translation' => 'Organizations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 24,
            'language_id' => 2,
            'caption_id' => 23,
            'caption_translation' => 'Организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 25,
            'language_id' => 1,
            'caption_id' => 25,
            'caption_translation' => 'Counterparties',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 26,
            'language_id' => 2,
            'caption_id' => 25,
            'caption_translation' => 'Контрагенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 27,
            'language_id' => 1,
            'caption_id' => 27,
            'caption_translation' => 'Block - DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 28,
            'language_id' => 2,
            'caption_id' => 27,
            'caption_translation' => 'БЛОК - БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 29,
            'language_id' => 1,
            'caption_id' => 29,
            'caption_translation' => 'Server',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 30,
            'language_id' => 2,
            'caption_id' => 29,
            'caption_translation' => 'Сервер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 31,
            'language_id' => 1,
            'caption_id' => 31,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 32,
            'language_id' => 2,
            'caption_id' => 31,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 33,
            'language_id' => 1,
            'caption_id' => 33,
            'caption_translation' => 'ADD NEW SERVER',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 34,
            'language_id' => 2,
            'caption_id' => 33,
            'caption_translation' => 'ДОБАВИТ НОВЫЙ СЕРВЕР',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 35,
            'language_id' => 1,
            'caption_id' => 35,
            'caption_translation' => 'DELETE SERVER',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 36,
            'language_id' => 2,
            'caption_id' => 35,
            'caption_translation' => 'УДАЛЕНИЕ СЕРВЕРА',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 37,
            'language_id' => 1,
            'caption_id' => 37,
            'caption_translation' => 'Select the server to delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 38,
            'language_id' => 2,
            'caption_id' => 37,
            'caption_translation' => 'Выберите сервер для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 39,
            'language_id' => 1,
            'caption_id' => 39,
            'caption_translation' => 'LIST SERVERS',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 40,
            'language_id' => 2,
            'caption_id' => 39,
            'caption_translation' => 'Список Серверов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 41,
            'language_id' => 1,
            'caption_id' => 41,
            'caption_translation' => 'Server name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 42,
            'language_id' => 2,
            'caption_id' => 41,
            'caption_translation' => 'Имя сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 43,
            'language_id' => 1,
            'caption_id' => 43,
            'caption_translation' => 'Server IP',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 44,
            'language_id' => 2,
            'caption_id' => 43,
            'caption_translation' => 'IP сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 45,
            'language_id' => 1,
            'caption_id' => 45,
            'caption_translation' => 'Server URL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 46,
            'language_id' => 2,
            'caption_id' => 45,
            'caption_translation' => 'URL сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 6:36:37',
            'updated_at' => '2018-07-23 6:36:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 47,
            'language_id' => 1,
            'caption_id' => 47,
            'caption_translation' => 'modify date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 48,
            'language_id' => 2,
            'caption_id' => 47,
            'caption_translation' => 'дата изменения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 49,
            'language_id' => 1,
            'caption_id' => 49,
            'caption_translation' => 'Database',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 50,
            'language_id' => 2,
            'caption_id' => 49,
            'caption_translation' => 'База данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 51,
            'language_id' => 1,
            'caption_id' => 51,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'g',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 52,
            'language_id' => 2,
            'caption_id' => 51,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 53,
            'language_id' => 1,
            'caption_id' => 53,
            'caption_translation' => 'ADD NEW DATA BASE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 54,
            'language_id' => 2,
            'caption_id' => 53,
            'caption_translation' => 'ДОБАВИТЬ НОВУЮ БАЗУ ДАННЫХ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 55,
            'language_id' => 1,
            'caption_id' => 55,
            'caption_translation' => 'Select the server for the database',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 56,
            'language_id' => 2,
            'caption_id' => 55,
            'caption_translation' => 'Выберите сервер для базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 57,
            'language_id' => 1,
            'caption_id' => 57,
            'caption_translation' => 'DELETE DATA BASE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 58,
            'language_id' => 2,
            'caption_id' => 57,
            'caption_translation' => 'УДАЛЕНИЕ БАЗ ДАННЫХ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 59,
            'language_id' => 1,
            'caption_id' => 59,
            'caption_translation' => 'Databases list ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 60,
            'language_id' => 2,
            'caption_id' => 59,
            'caption_translation' => 'Список баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 61,
            'language_id' => 1,
            'caption_id' => 61,
            'caption_translation' => 'db name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 62,
            'language_id' => 2,
            'caption_id' => 61,
            'caption_translation' => 'имя бд',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 63,
            'language_id' => 1,
            'caption_id' => 63,
            'caption_translation' => 'server ip',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 64,
            'language_id' => 2,
            'caption_id' => 63,
            'caption_translation' => 'ip сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 65,
            'language_id' => 1,
            'caption_id' => 65,
            'caption_translation' => 'server name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 66,
            'language_id' => 2,
            'caption_id' => 65,
            'caption_translation' => 'имя сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 67,
            'language_id' => 1,
            'caption_id' => 67,
            'caption_translation' => 'server url',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 68,
            'language_id' => 2,
            'caption_id' => 67,
            'caption_translation' => 'url сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 69,
            'language_id' => 1,
            'caption_id' => 69,
            'caption_translation' => 'Area DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 70,
            'language_id' => 2,
            'caption_id' => 69,
            'caption_translation' => 'Область БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 71,
            'language_id' => 1,
            'caption_id' => 71,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 72,
            'language_id' => 2,
            'caption_id' => 71,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 73,
            'language_id' => 1,
            'caption_id' => 73,
            'caption_translation' => 'ADD NEW AREA DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 74,
            'language_id' => 2,
            'caption_id' => 73,
            'caption_translation' => 'ДОБАВИТЬ НОВУЮ ОБЛАСТЬ БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 75,
            'language_id' => 1,
            'caption_id' => 75,
            'caption_translation' => 'Select data base',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 76,
            'language_id' => 2,
            'caption_id' => 75,
            'caption_translation' => 'Выберите базу данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 77,
            'language_id' => 1,
            'caption_id' => 77,
            'caption_translation' => 'DELETE AREA DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 78,
            'language_id' => 2,
            'caption_id' => 77,
            'caption_translation' => 'УДАЛЕНИЕ ОБЛАСТИ БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 79,
            'language_id' => 1,
            'caption_id' => 79,
            'caption_translation' => 'Select the database area to delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 80,
            'language_id' => 2,
            'caption_id' => 79,
            'caption_translation' => 'Выберите область БД для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 81,
            'language_id' => 1,
            'caption_id' => 81,
            'caption_translation' => 'DATA BASE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 82,
            'language_id' => 2,
            'caption_id' => 81,
            'caption_translation' => 'БАЗЫ ДАННЫХ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 83,
            'language_id' => 1,
            'caption_id' => 83,
            'caption_translation' => 'db name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 84,
            'language_id' => 2,
            'caption_id' => 83,
            'caption_translation' => 'имя бд',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 85,
            'language_id' => 1,
            'caption_id' => 85,
            'caption_translation' => 'server name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 86,
            'language_id' => 2,
            'caption_id' => 85,
            'caption_translation' => 'имя сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 87,
            'language_id' => 1,
            'caption_id' => 87,
            'caption_translation' => 'server ip',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 88,
            'language_id' => 2,
            'caption_id' => 87,
            'caption_translation' => 'ip сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 89,
            'language_id' => 1,
            'caption_id' => 89,
            'caption_translation' => 'BLOCK - REPORTS',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 90,
            'language_id' => 2,
            'caption_id' => 89,
            'caption_translation' => 'БЛОК - ОТЧЕТЫ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 91,
            'language_id' => 1,
            'caption_id' => 91,
            'caption_translation' => 'CREATE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 92,
            'language_id' => 2,
            'caption_id' => 91,
            'caption_translation' => 'СОЗДАТЬ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 93,
            'language_id' => 1,
            'caption_id' => 93,
            'caption_translation' => 'Report',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 94,
            'language_id' => 2,
            'caption_id' => 93,
            'caption_translation' => 'Отчет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 95,
            'language_id' => 1,
            'caption_id' => 95,
            'caption_translation' => 'Type Report',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 96,
            'language_id' => 2,
            'caption_id' => 95,
            'caption_translation' => 'Вид отчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 97,
            'language_id' => 1,
            'caption_id' => 97,
            'caption_translation' => 'Language',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 98,
            'language_id' => 2,
            'caption_id' => 97,
            'caption_translation' => 'Язык',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 99,
            'language_id' => 1,
            'caption_id' => 99,
            'caption_translation' => 'Organization',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 100,
            'language_id' => 2,
            'caption_id' => 99,
            'caption_translation' => 'Организация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 101,
            'language_id' => 1,
            'caption_id' => 101,
            'caption_translation' => 'Type file report',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 102,
            'language_id' => 2,
            'caption_id' => 101,
            'caption_translation' => 'Формат отчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 103,
            'language_id' => 1,
            'caption_id' => 103,
            'caption_translation' => 'Period report',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 104,
            'language_id' => 2,
            'caption_id' => 103,
            'caption_translation' => 'Период отчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 105,
            'language_id' => 1,
            'caption_id' => 105,
            'caption_translation' => 'Status',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 106,
            'language_id' => 2,
            'caption_id' => 105,
            'caption_translation' => 'Статус',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 107,
            'language_id' => 1,
            'caption_id' => 107,
            'caption_translation' => 'Date Create',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 108,
            'language_id' => 2,
            'caption_id' => 107,
            'caption_translation' => 'Дата формирование',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 109,
            'language_id' => 1,
            'caption_id' => 109,
            'caption_translation' => 'Select organization',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 110,
            'language_id' => 2,
            'caption_id' => 109,
            'caption_translation' => 'Выберите организацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 111,
            'language_id' => 1,
            'caption_id' => 111,
            'caption_translation' => 'Start date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 112,
            'language_id' => 2,
            'caption_id' => 111,
            'caption_translation' => 'Начало периода',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 113,
            'language_id' => 1,
            'caption_id' => 113,
            'caption_translation' => 'End date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 114,
            'language_id' => 2,
            'caption_id' => 113,
            'caption_translation' => 'Конец периода',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 115,
            'language_id' => 1,
            'caption_id' => 115,
            'caption_translation' => 'Select lng',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 116,
            'language_id' => 2,
            'caption_id' => 115,
            'caption_translation' => 'Выберите язык',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 117,
            'language_id' => 1,
            'caption_id' => 117,
            'caption_translation' => 'Send Request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 118,
            'language_id' => 2,
            'caption_id' => 117,
            'caption_translation' => 'Отправить запрос',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 119,
            'language_id' => 1,
            'caption_id' => 119,
            'caption_translation' => 'Country and Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 120,
            'language_id' => 2,
            'caption_id' => 119,
            'caption_translation' => 'Страны и Регионы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 121,
            'language_id' => 1,
            'caption_id' => 121,
            'caption_translation' => 'Country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 122,
            'language_id' => 2,
            'caption_id' => 121,
            'caption_translation' => 'Страна',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 123,
            'language_id' => 1,
            'caption_id' => 123,
            'caption_translation' => 'Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 124,
            'language_id' => 2,
            'caption_id' => 123,
            'caption_translation' => 'Регионы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 125,
            'language_id' => 1,
            'caption_id' => 125,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 126,
            'language_id' => 2,
            'caption_id' => 125,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 127,
            'language_id' => 1,
            'caption_id' => 127,
            'caption_translation' => 'ADD NEW COUNTRY',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 128,
            'language_id' => 2,
            'caption_id' => 127,
            'caption_translation' => 'ДОБАВИТЬ НОВУЮ СТРАНУ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 129,
            'language_id' => 1,
            'caption_id' => 129,
            'caption_translation' => 'DELETE COUNTRY',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 130,
            'language_id' => 2,
            'caption_id' => 129,
            'caption_translation' => 'УДАЛИТЬ СТРАНУ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 131,
            'language_id' => 1,
            'caption_id' => 131,
            'caption_translation' => 'LIST OF COUNTRIES',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 132,
            'language_id' => 2,
            'caption_id' => 131,
            'caption_translation' => 'СПИСОК СТРАН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 133,
            'language_id' => 1,
            'caption_id' => 133,
            'caption_translation' => 'country name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 134,
            'language_id' => 2,
            'caption_id' => 133,
            'caption_translation' => 'имя страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 135,
            'language_id' => 1,
            'caption_id' => 135,
            'caption_translation' => 'country full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 136,
            'language_id' => 2,
            'caption_id' => 135,
            'caption_translation' => 'полное имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 137,
            'language_id' => 1,
            'caption_id' => 137,
            'caption_translation' => 'country code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 138,
            'language_id' => 2,
            'caption_id' => 137,
            'caption_translation' => 'код страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 139,
            'language_id' => 1,
            'caption_id' => 139,
            'caption_translation' => 'code alpha2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 140,
            'language_id' => 2,
            'caption_id' => 139,
            'caption_translation' => 'код alpha2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 141,
            'language_id' => 1,
            'caption_id' => 141,
            'caption_translation' => 'country name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 142,
            'language_id' => 2,
            'caption_id' => 141,
            'caption_translation' => 'имя страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 143,
            'language_id' => 1,
            'caption_id' => 143,
            'caption_translation' => 'country full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 144,
            'language_id' => 2,
            'caption_id' => 143,
            'caption_translation' => 'полное имя страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 145,
            'language_id' => 1,
            'caption_id' => 145,
            'caption_translation' => 'country code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 146,
            'language_id' => 2,
            'caption_id' => 145,
            'caption_translation' => 'код страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 147,
            'language_id' => 1,
            'caption_id' => 147,
            'caption_translation' => 'country code alpha2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 148,
            'language_id' => 2,
            'caption_id' => 147,
            'caption_translation' => 'код страны alpha2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 149,
            'language_id' => 1,
            'caption_id' => 149,
            'caption_translation' => 'country code alpha3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 150,
            'language_id' => 2,
            'caption_id' => 149,
            'caption_translation' => 'код страны alpha3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 151,
            'language_id' => 1,
            'caption_id' => 151,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 152,
            'language_id' => 2,
            'caption_id' => 151,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 153,
            'language_id' => 1,
            'caption_id' => 153,
            'caption_translation' => 'select delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 154,
            'language_id' => 2,
            'caption_id' => 153,
            'caption_translation' => 'Выберите страну для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 155,
            'language_id' => 1,
            'caption_id' => 155,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 156,
            'language_id' => 2,
            'caption_id' => 155,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 157,
            'language_id' => 1,
            'caption_id' => 157,
            'caption_translation' => 'ADD NEW REGION',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 158,
            'language_id' => 2,
            'caption_id' => 157,
            'caption_translation' => 'ДОБАВИТЬ НОВЫЙ РЕГИОН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 159,
            'language_id' => 1,
            'caption_id' => 159,
            'caption_translation' => 'DELETE REGION',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 160,
            'language_id' => 2,
            'caption_id' => 159,
            'caption_translation' => 'УДАЛИТЬ РЕГИОН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 161,
            'language_id' => 1,
            'caption_id' => 161,
            'caption_translation' => 'LIST OF REGIONS',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 162,
            'language_id' => 2,
            'caption_id' => 161,
            'caption_translation' => 'СПИСОК РЕГИОНОВ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 163,
            'language_id' => 1,
            'caption_id' => 163,
            'caption_translation' => 'region name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 164,
            'language_id' => 2,
            'caption_id' => 163,
            'caption_translation' => 'имя региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 165,
            'language_id' => 1,
            'caption_id' => 165,
            'caption_translation' => 'region code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 166,
            'language_id' => 2,
            'caption_id' => 165,
            'caption_translation' => 'код региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 167,
            'language_id' => 1,
            'caption_id' => 167,
            'caption_translation' => 'region code alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 168,
            'language_id' => 2,
            'caption_id' => 167,
            'caption_translation' => 'код alpha региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 169,
            'language_id' => 1,
            'caption_id' => 169,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 170,
            'language_id' => 2,
            'caption_id' => 169,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 171,
            'language_id' => 1,
            'caption_id' => 171,
            'caption_translation' => 'Select country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 172,
            'language_id' => 2,
            'caption_id' => 171,
            'caption_translation' => 'выбирайте страну',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 173,
            'language_id' => 1,
            'caption_id' => 173,
            'caption_translation' => 'region name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 174,
            'language_id' => 2,
            'caption_id' => 173,
            'caption_translation' => 'имя региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 175,
            'language_id' => 1,
            'caption_id' => 175,
            'caption_translation' => 'region code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 176,
            'language_id' => 2,
            'caption_id' => 175,
            'caption_translation' => 'код региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 177,
            'language_id' => 1,
            'caption_id' => 177,
            'caption_translation' => 'region code alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 178,
            'language_id' => 2,
            'caption_id' => 177,
            'caption_translation' => 'код региона alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 181,
            'language_id' => 1,
            'caption_id' => 181,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 182,
            'language_id' => 2,
            'caption_id' => 181,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 183,
            'language_id' => 1,
            'caption_id' => 183,
            'caption_translation' => 'Select Delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 184,
            'language_id' => 2,
            'caption_id' => 183,
            'caption_translation' => 'Выберите Регион для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 185,
            'language_id' => 1,
            'caption_id' => 185,
            'caption_translation' => 'country code alpha3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 186,
            'language_id' => 2,
            'caption_id' => 185,
            'caption_translation' => 'код страны alpha3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 187,
            'language_id' => 1,
            'caption_id' => 187,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 188,
            'language_id' => 2,
            'caption_id' => 187,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 189,
            'language_id' => 1,
            'caption_id' => 189,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 190,
            'language_id' => 2,
            'caption_id' => 189,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 191,
            'language_id' => 1,
            'caption_id' => 191,
            'caption_translation' => 'db Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 192,
            'language_id' => 2,
            'caption_id' => 191,
            'caption_translation' => 'код базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 193,
            'language_id' => 1,
            'caption_id' => 193,
            'caption_translation' => 'suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 194,
            'language_id' => 2,
            'caption_id' => 193,
            'caption_translation' => 'имя suser',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 195,
            'language_id' => 1,
            'caption_id' => 195,
            'caption_translation' => 'db Modify Date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 196,
            'language_id' => 2,
            'caption_id' => 195,
            'caption_translation' => 'бд Modify Date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 197,
            'language_id' => 1,
            'caption_id' => 197,
            'caption_translation' => 'db area code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 198,
            'language_id' => 2,
            'caption_id' => 197,
            'caption_translation' => 'код области базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 199,
            'language_id' => 1,
            'caption_id' => 199,
            'caption_translation' => 'db area pass',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 200,
            'language_id' => 2,
            'caption_id' => 199,
            'caption_translation' => 'пароль области базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 201,
            'language_id' => 1,
            'caption_id' => 201,
            'caption_translation' => 'db area suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 202,
            'language_id' => 2,
            'caption_id' => 201,
            'caption_translation' => 'имя suser области базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 203,
            'language_id' => 1,
            'caption_id' => 203,
            'caption_translation' => 'Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 204,
            'language_id' => 2,
            'caption_id' => 203,
            'caption_translation' => 'Имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 205,
            'language_id' => 1,
            'caption_id' => 205,
            'caption_translation' => 'consumer_name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 206,
            'language_id' => 2,
            'caption_id' => 205,
            'caption_translation' => 'имя пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 207,
            'language_id' => 1,
            'caption_id' => 207,
            'caption_translation' => 'Consumer login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 208,
            'language_id' => 2,
            'caption_id' => 207,
            'caption_translation' => 'Логин пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 209,
            'language_id' => 1,
            'caption_id' => 209,
            'caption_translation' => 'phone number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 210,
            'language_id' => 2,
            'caption_id' => 209,
            'caption_translation' => 'номер телефона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 213,
            'language_id' => 1,
            'caption_id' => 213,
            'caption_translation' => 'USER INFORMATION',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 214,
            'language_id' => 2,
            'caption_id' => 213,
            'caption_translation' => 'ИНФОРМАЦИЯ О ПОЛЬЗОВАТЕЛЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 215,
            'language_id' => 1,
            'caption_id' => 215,
            'caption_translation' => 'User Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 216,
            'language_id' => 2,
            'caption_id' => 215,
            'caption_translation' => 'Данные пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 217,
            'language_id' => 1,
            'caption_id' => 217,
            'caption_translation' => 'Accesses',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 218,
            'language_id' => 2,
            'caption_id' => 217,
            'caption_translation' => 'Доступы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 219,
            'language_id' => 1,
            'caption_id' => 219,
            'caption_translation' => 'Organization',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 220,
            'language_id' => 2,
            'caption_id' => 219,
            'caption_translation' => 'Организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 221,
            'language_id' => 1,
            'caption_id' => 221,
            'caption_translation' => 'Contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 222,
            'language_id' => 2,
            'caption_id' => 221,
            'caption_translation' => 'Контрагенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 223,
            'language_id' => 1,
            'caption_id' => 223,
            'caption_translation' => 'All',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 224,
            'language_id' => 2,
            'caption_id' => 223,
            'caption_translation' => 'Все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 225,
            'language_id' => 1,
            'caption_id' => 225,
            'caption_translation' => 'Add new organization',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 226,
            'language_id' => 2,
            'caption_id' => 225,
            'caption_translation' => 'Добавить новую организацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 227,
            'language_id' => 1,
            'caption_id' => 227,
            'caption_translation' => 'Delete organization',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 228,
            'language_id' => 2,
            'caption_id' => 227,
            'caption_translation' => 'Удалить организацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 229,
            'language_id' => 1,
            'caption_id' => 229,
            'caption_translation' => 'company full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 230,
            'language_id' => 2,
            'caption_id' => 229,
            'caption_translation' => 'полное имя организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 231,
            'language_id' => 1,
            'caption_id' => 231,
            'caption_translation' => 'company short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 232,
            'language_id' => 2,
            'caption_id' => 231,
            'caption_translation' => 'краткое название компании',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 233,
            'language_id' => 1,
            'caption_id' => 233,
            'caption_translation' => '1c code (uid)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 234,
            'language_id' => 2,
            'caption_id' => 233,
            'caption_translation' => '1c код (uid)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 235,
            'language_id' => 1,
            'caption_id' => 235,
            'caption_translation' => 'Select organization to delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 236,
            'language_id' => 2,
            'caption_id' => 235,
            'caption_translation' => 'Выберите ораганизазию для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 237,
            'language_id' => 1,
            'caption_id' => 237,
            'caption_translation' => 'All',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 238,
            'language_id' => 2,
            'caption_id' => 237,
            'caption_translation' => 'Все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 239,
            'language_id' => 1,
            'caption_id' => 239,
            'caption_translation' => 'Add new contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 240,
            'language_id' => 2,
            'caption_id' => 239,
            'caption_translation' => 'Добавить новый контрагент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 241,
            'language_id' => 1,
            'caption_id' => 241,
            'caption_translation' => 'Delete contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 242,
            'language_id' => 2,
            'caption_id' => 241,
            'caption_translation' => 'Удалить контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 243,
            'language_id' => 1,
            'caption_id' => 243,
            'caption_translation' => 'contractor full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 244,
            'language_id' => 2,
            'caption_id' => 243,
            'caption_translation' => 'полное имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 245,
            'language_id' => 1,
            'caption_id' => 245,
            'caption_translation' => 'contractor short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 246,
            'language_id' => 2,
            'caption_id' => 245,
            'caption_translation' => 'короткое имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 247,
            'language_id' => 1,
            'caption_id' => 247,
            'caption_translation' => '1c code (uid)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 248,
            'language_id' => 2,
            'caption_id' => 247,
            'caption_translation' => '1c код (uid )',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 249,
            'language_id' => 1,
            'caption_id' => 249,
            'caption_translation' => 'Select contractor to delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 250,
            'language_id' => 2,
            'caption_id' => 249,
            'caption_translation' => 'Выберите контрагента для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 251,
            'language_id' => 2,
            'caption_id' => 251,
            'caption_translation' => 'Язык',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 252,
            'language_id' => 1,
            'caption_id' => 251,
            'caption_translation' => 'Language',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 253,
            'language_id' => 1,
            'caption_id' => 253,
            'caption_translation' => 'ADD NEW LANGUAGE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 254,
            'language_id' => 2,
            'caption_id' => 253,
            'caption_translation' => 'ДОБАВИТЬ НОВЫЙ ЯЗЫК',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 255,
            'language_id' => 1,
            'caption_id' => 255,
            'caption_translation' => 'DELETE LANGUAGE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 256,
            'language_id' => 2,
            'caption_id' => 255,
            'caption_translation' => 'УДАЛИТЬ ЯЗЫК',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 257,
            'language_id' => 1,
            'caption_id' => 257,
            'caption_translation' => 'ALL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 258,
            'language_id' => 2,
            'caption_id' => 257,
            'caption_translation' => 'ВСЕ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 259,
            'language_id' => 1,
            'caption_id' => 259,
            'caption_translation' => 'LANGUAGE LIST',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 260,
            'language_id' => 2,
            'caption_id' => 259,
            'caption_translation' => 'СПИСОК ЯЗЫКОВ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 261,
            'language_id' => 1,
            'caption_id' => 261,
            'caption_translation' => 'Language Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 262,
            'language_id' => 2,
            'caption_id' => 261,
            'caption_translation' => 'Код Языка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 263,
            'language_id' => 1,
            'caption_id' => 263,
            'caption_translation' => 'Language name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 264,
            'language_id' => 2,
            'caption_id' => 263,
            'caption_translation' => 'Наименование языка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 265,
            'language_id' => 2,
            'caption_id' => 265,
            'caption_translation' => 'Наименование языка на русском',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 266,
            'language_id' => 1,
            'caption_id' => 265,
            'caption_translation' => 'Language name in Russian',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 267,
            'language_id' => 1,
            'caption_id' => 267,
            'caption_translation' => 'Language display',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 268,
            'language_id' => 2,
            'caption_id' => 267,
            'caption_translation' => 'Отображение языка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 270,
            'language_id' => 1,
            'caption_id' => 271,
            'caption_translation' => 'CHANGE LANGUAGE',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 271,
            'language_id' => 2,
            'caption_id' => 271,
            'caption_translation' => 'ИЗМЕНИТЬ ЯЗЫК',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 272,
            'language_id' => 1,
            'caption_id' => 273,
            'caption_translation' => 'Select the language to delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 273,
            'language_id' => 2,
            'caption_id' => 273,
            'caption_translation' => 'Выберите язык для удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-23 7:30:56',
            'updated_at' => '2018-07-23 7:30:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 274,
            'language_id' => 1,
            'caption_id' => 275,
            'caption_translation' => 'Language Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:58:21',
            'updated_at' => '2018-08-01 8:58:21',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 275,
            'language_id' => 2,
            'caption_id' => 275,
            'caption_translation' => 'Названия Языков',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 276,
            'language_id' => 1,
            'caption_id' => 277,
            'caption_translation' => 'ID Language',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 277,
            'language_id' => 2,
            'caption_id' => 277,
            'caption_translation' => 'ID Языка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 278,
            'language_id' => 1,
            'caption_id' => 279,
            'caption_translation' => 'Translate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 279,
            'language_id' => 2,
            'caption_id' => 279,
            'caption_translation' => 'Перевод',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 280,
            'language_id' => 1,
            'caption_id' => 281,
            'caption_translation' => 'Caption Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 281,
            'language_id' => 2,
            'caption_id' => 281,
            'caption_translation' => 'Код надписи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 282,
            'language_id' => 2,
            'caption_id' => 283,
            'caption_translation' => 'Добавить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 283,
            'language_id' => 1,
            'caption_id' => 283,
            'caption_translation' => 'Add',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 284,
            'language_id' => 1,
            'caption_id' => 285,
            'caption_translation' => 'Delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 285,
            'language_id' => 2,
            'caption_id' => 285,
            'caption_translation' => 'Удалить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 286,
            'language_id' => 1,
            'caption_id' => 287,
            'caption_translation' => 'Change',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 287,
            'language_id' => 2,
            'caption_id' => 287,
            'caption_translation' => 'Изменить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-08-01 8:59:01',
            'updated_at' => '2018-08-01 8:59:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 288,
            'language_id' => 1,
            'caption_id' => 288,
            'caption_translation' => 'Select Language',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 8:25:51',
            'updated_at' => '2018-07-24 8:25:51',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 289,
            'language_id' => 2,
            'caption_id' => 288,
            'caption_translation' => 'Выберите язык',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-24 8:31:25',
            'updated_at' => '2018-07-24 8:31:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 323,
            'language_id' => 1,
            'caption_id' => 289,
            'caption_translation' => 'Caption',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 11:59:52',
            'updated_at' => '2018-07-26 11:59:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 324,
            'language_id' => 2,
            'caption_id' => 289,
            'caption_translation' => 'Надпись',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:00:17',
            'updated_at' => '2018-07-26 12:00:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 325,
            'language_id' => 1,
            'caption_id' => 290,
            'caption_translation' => 'Caption remark',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:00:40',
            'updated_at' => '2018-07-26 12:00:40',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 326,
            'language_id' => 2,
            'caption_id' => 290,
            'caption_translation' => 'Примечание к надписи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:01:07',
            'updated_at' => '2018-07-26 12:01:07',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 327,
            'language_id' => 1,
            'caption_id' => 291,
            'caption_translation' => 'Remark',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:04:12',
            'updated_at' => '2018-07-26 12:04:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 328,
            'language_id' => 2,
            'caption_id' => 291,
            'caption_translation' => 'Заметки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:04:36',
            'updated_at' => '2018-07-26 12:04:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 329,
            'language_id' => 1,
            'caption_id' => 292,
            'caption_translation' => 'Captions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:05:01',
            'updated_at' => '2018-07-26 12:05:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 330,
            'language_id' => 2,
            'caption_id' => 292,
            'caption_translation' => 'Надписи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:05:17',
            'updated_at' => '2018-07-26 12:05:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 331,
            'language_id' => 1,
            'caption_id' => 293,
            'caption_translation' => 'Database area',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:05:31',
            'updated_at' => '2018-07-26 12:05:31',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 332,
            'language_id' => 2,
            'caption_id' => 293,
            'caption_translation' => 'Область БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:05:45',
            'updated_at' => '2018-07-26 12:05:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 333,
            'language_id' => 1,
            'caption_id' => 294,
            'caption_translation' => 'Individual',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:06:09',
            'updated_at' => '2018-07-26 12:06:09',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 334,
            'language_id' => 1,
            'caption_id' => 295,
            'caption_translation' => 'Identity document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:06:25',
            'updated_at' => '2018-07-26 12:06:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 335,
            'language_id' => 1,
            'caption_id' => 296,
            'caption_translation' => 'Contractor fullname',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:06:43',
            'updated_at' => '2018-07-26 12:06:43',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 336,
            'language_id' => 1,
            'caption_id' => 297,
            'caption_translation' => 'Contractor short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:07:03',
            'updated_at' => '2018-07-26 12:07:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 337,
            'language_id' => 1,
            'caption_id' => 298,
            'caption_translation' => 'Taxpayer number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:07:28',
            'updated_at' => '2018-07-26 12:07:28',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 338,
            'language_id' => 1,
            'caption_id' => 299,
            'caption_translation' => 'Additional company code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:08:33',
            'updated_at' => '2018-07-26 12:08:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 340,
            'language_id' => 1,
            'caption_id' => 301,
            'caption_translation' => 'Social security number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:09:04',
            'updated_at' => '2018-07-26 12:09:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 341,
            'language_id' => 1,
            'caption_id' => 303,
            'caption_translation' => 'Entrepreneur certificate date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:09:18',
            'updated_at' => '2018-07-26 12:09:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 342,
            'language_id' => 1,
            'caption_id' => 302,
            'caption_translation' => 'Entrepreneur certificate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:09:53',
            'updated_at' => '2018-07-26 12:09:53',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 343,
            'language_id' => 1,
            'caption_id' => 305,
            'caption_translation' => 'Country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:10:43',
            'updated_at' => '2018-07-26 12:10:43',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 344,
            'language_id' => 1,
            'caption_id' => 306,
            'caption_translation' => 'Company fullname',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:11:08',
            'updated_at' => '2018-07-26 12:11:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 345,
            'language_id' => 1,
            'caption_id' => 307,
            'caption_translation' => 'Company short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:11:22',
            'updated_at' => '2018-07-26 12:11:22',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 346,
            'language_id' => 1,
            'caption_id' => 308,
            'caption_translation' => 'Entepreneur',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:11:34',
            'updated_at' => '2018-07-26 12:11:34',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 347,
            'language_id' => 1,
            'caption_id' => 309,
            'caption_translation' => 'Consumer Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 12:11:47',
            'updated_at' => '2018-07-26 12:11:47',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 349,
            'language_id' => 1,
            'caption_id' => 304,
            'caption_translation' => 'Company code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 350,
            'language_id' => 1,
            'caption_id' => 310,
            'caption_translation' => 'Select Consumer:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-26 13:33:16',
            'updated_at' => '2018-07-26 13:33:16',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 351,
            'language_id' => 2,
            'caption_id' => 5,
            'caption_translation' => 'Админка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 6:35:30',
            'updated_at' => '2018-07-27 6:35:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 352,
            'language_id' => 1,
            'caption_id' => 312,
            'caption_translation' => 'Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:30:30',
            'updated_at' => '2018-07-27 9:30:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 354,
            'language_id' => 1,
            'caption_id' => 314,
            'caption_translation' => 'Add kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:32:04',
            'updated_at' => '2018-07-27 9:32:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 355,
            'language_id' => 1,
            'caption_id' => 313,
            'caption_translation' => 'All',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:32:13',
            'updated_at' => '2018-07-27 9:32:13',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 356,
            'language_id' => 1,
            'caption_id' => 315,
            'caption_translation' => 'Delete kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:32:23',
            'updated_at' => '2018-07-27 9:32:23',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 357,
            'language_id' => 1,
            'caption_id' => 316,
            'caption_translation' => 'Kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:34:49',
            'updated_at' => '2018-07-27 9:34:49',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 358,
            'language_id' => 1,
            'caption_id' => 317,
            'caption_translation' => 'Kind Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:36:34',
            'updated_at' => '2018-07-27 9:36:34',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 359,
            'language_id' => 1,
            'caption_id' => 318,
            'caption_translation' => 'Kind Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:36:44',
            'updated_at' => '2018-07-27 9:36:44',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 360,
            'language_id' => 1,
            'caption_id' => 319,
            'caption_translation' => 'Suser name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:36:54',
            'updated_at' => '2018-07-27 9:36:54',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 361,
            'language_id' => 1,
            'caption_id' => 320,
            'caption_translation' => 'Type name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:40:54',
            'updated_at' => '2018-07-27 9:40:54',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 362,
            'language_id' => 1,
            'caption_id' => 321,
            'caption_translation' => 'Kind Delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:45:59',
            'updated_at' => '2018-07-27 9:45:59',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 363,
            'language_id' => 1,
            'caption_id' => 322,
            'caption_translation' => 'Add type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:48:32',
            'updated_at' => '2018-07-27 9:48:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 364,
            'language_id' => 1,
            'caption_id' => 323,
            'caption_translation' => 'Type Delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:48:55',
            'updated_at' => '2018-07-27 9:48:55',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 365,
            'language_id' => 1,
            'caption_id' => 324,
            'caption_translation' => 'Type Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:52:06',
            'updated_at' => '2018-07-27 9:52:06',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 366,
            'language_id' => 1,
            'caption_id' => 325,
            'caption_translation' => 'Type name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-27 9:52:18',
            'updated_at' => '2018-07-27 9:52:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 367,
            'language_id' => 1,
            'caption_id' => 326,
            'caption_translation' => 'Company Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-30 19:33:56',
            'updated_at' => '2018-07-30 19:33:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 368,
            'language_id' => 1,
            'caption_id' => 327,
            'caption_translation' => 'Select Company',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-30 19:34:22',
            'updated_at' => '2018-07-30 19:34:22',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 369,
            'language_id' => 2,
            'caption_id' => 294,
            'caption_translation' => 'Физическое лицо',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:16:38',
            'updated_at' => '2018-07-31 7:16:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 370,
            'language_id' => 2,
            'caption_id' => 295,
            'caption_translation' => 'Идентификационный документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:17:29',
            'updated_at' => '2018-07-31 7:17:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 371,
            'language_id' => 2,
            'caption_id' => 298,
            'caption_translation' => 'Номер налогоплательщика',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:19:08',
            'updated_at' => '2018-07-31 7:19:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 372,
            'language_id' => 2,
            'caption_id' => 299,
            'caption_translation' => 'Дополнительный код организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:19:51',
            'updated_at' => '2018-07-31 7:19:51',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 373,
            'language_id' => 2,
            'caption_id' => 296,
            'caption_translation' => 'Полное имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:20:24',
            'updated_at' => '2018-07-31 7:20:24',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 374,
            'language_id' => 2,
            'caption_id' => 297,
            'caption_translation' => 'Краткое имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:20:38',
            'updated_at' => '2018-07-31 7:20:38',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 376,
            'language_id' => 2,
            'caption_id' => 301,
            'caption_translation' => 'Код социального страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:22:18',
            'updated_at' => '2018-07-31 7:22:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 377,
            'language_id' => 2,
            'caption_id' => 302,
            'caption_translation' => 'Сертификат ИП',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:23:08',
            'updated_at' => '2018-07-31 7:23:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 378,
            'language_id' => 2,
            'caption_id' => 303,
            'caption_translation' => 'Дата сертификата ИП',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:23:33',
            'updated_at' => '2018-07-31 7:23:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 379,
            'language_id' => 2,
            'caption_id' => 304,
            'caption_translation' => 'Код организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:23:47',
            'updated_at' => '2018-07-31 7:23:47',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 380,
            'language_id' => 2,
            'caption_id' => 305,
            'caption_translation' => 'Страна',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:24:11',
            'updated_at' => '2018-07-31 7:24:11',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 381,
            'language_id' => 2,
            'caption_id' => 308,
            'caption_translation' => 'Налогоплательщик',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:24:31',
            'updated_at' => '2018-07-31 7:24:31',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 382,
            'language_id' => 2,
            'caption_id' => 309,
            'caption_translation' => 'Информация о потребителе',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:25:27',
            'updated_at' => '2018-07-31 7:25:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 383,
            'language_id' => 2,
            'caption_id' => 310,
            'caption_translation' => 'Выбор потребителя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:25:52',
            'updated_at' => '2018-07-31 7:25:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 384,
            'language_id' => 2,
            'caption_id' => 312,
            'caption_translation' => 'Тип',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:26:02',
            'updated_at' => '2018-07-31 7:26:02',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 385,
            'language_id' => 2,
            'caption_id' => 313,
            'caption_translation' => 'Все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:26:14',
            'updated_at' => '2018-07-31 7:26:14',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 386,
            'language_id' => 2,
            'caption_id' => 314,
            'caption_translation' => 'Добавить вид',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:27:04',
            'updated_at' => '2018-07-31 7:27:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 387,
            'language_id' => 2,
            'caption_id' => 315,
            'caption_translation' => 'Удалить вид',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:27:16',
            'updated_at' => '2018-07-31 7:27:16',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 388,
            'language_id' => 2,
            'caption_id' => 316,
            'caption_translation' => 'Вид',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:27:28',
            'updated_at' => '2018-07-31 7:27:28',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 389,
            'language_id' => 2,
            'caption_id' => 317,
            'caption_translation' => 'Код вида',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:27:45',
            'updated_at' => '2018-07-31 7:27:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 390,
            'language_id' => 2,
            'caption_id' => 318,
            'caption_translation' => 'Название вида',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:28:20',
            'updated_at' => '2018-07-31 7:28:20',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 391,
            'language_id' => 2,
            'caption_id' => 319,
            'caption_translation' => 'Имя пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:28:36',
            'updated_at' => '2018-07-31 7:28:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 392,
            'language_id' => 2,
            'caption_id' => 320,
            'caption_translation' => 'Информация о типе',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:28:50',
            'updated_at' => '2018-07-31 7:28:50',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 393,
            'language_id' => 2,
            'caption_id' => 321,
            'caption_translation' => 'Удалить вид',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:29:18',
            'updated_at' => '2018-07-31 7:29:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 394,
            'language_id' => 2,
            'caption_id' => 322,
            'caption_translation' => 'Добавить тип',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:29:30',
            'updated_at' => '2018-07-31 7:29:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 395,
            'language_id' => 2,
            'caption_id' => 323,
            'caption_translation' => 'Удалить тип',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:29:41',
            'updated_at' => '2018-07-31 7:29:41',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 396,
            'language_id' => 2,
            'caption_id' => 324,
            'caption_translation' => 'Код типа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:29:54',
            'updated_at' => '2018-07-31 7:29:54',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 397,
            'language_id' => 2,
            'caption_id' => 325,
            'caption_translation' => 'Название вида типа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:30:18',
            'updated_at' => '2018-07-31 7:30:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 398,
            'language_id' => 2,
            'caption_id' => 326,
            'caption_translation' => 'Информация о компании',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:30:33',
            'updated_at' => '2018-07-31 7:30:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 399,
            'language_id' => 2,
            'caption_id' => 327,
            'caption_translation' => 'Выберите компанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:30:48',
            'updated_at' => '2018-07-31 7:30:48',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 400,
            'language_id' => 2,
            'caption_id' => 306,
            'caption_translation' => 'Полное имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:31:19',
            'updated_at' => '2018-07-31 7:31:19',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 401,
            'language_id' => 2,
            'caption_id' => 307,
            'caption_translation' => 'Краткое имя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-07-31 7:31:47',
            'updated_at' => '2018-07-31 7:31:47',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 402,
            'language_id' => 1,
            'caption_id' => 328,
            'caption_translation' => 'Blog',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 11:51:36',
            'updated_at' => '2018-09-11 11:51:55',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 403,
            'language_id' => 1,
            'caption_id' => 329,
            'caption_translation' => 'Support',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 11:56:03',
            'updated_at' => '2018-09-11 11:56:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 404,
            'language_id' => 2,
            'caption_id' => 329,
            'caption_translation' => 'Поддержка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 11:56:57',
            'updated_at' => '2018-09-11 11:56:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 405,
            'language_id' => 2,
            'caption_id' => 328,
            'caption_translation' => 'Блог',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 11:57:39',
            'updated_at' => '2018-09-11 11:57:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 406,
            'language_id' => 1,
            'caption_id' => 330,
            'caption_translation' => 'Terms and conditions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 11:59:42',
            'updated_at' => '2018-09-11 11:59:42',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 407,
            'language_id' => 2,
            'caption_id' => 330,
            'caption_translation' => 'Условия и положения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:00:10',
            'updated_at' => '2018-09-11 12:00:10',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 408,
            'language_id' => 1,
            'caption_id' => 331,
            'caption_translation' => 'Privacy',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:01:26',
            'updated_at' => '2018-09-11 12:01:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 409,
            'language_id' => 2,
            'caption_id' => 331,
            'caption_translation' => 'Конфиденциальность',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:01:48',
            'updated_at' => '2018-09-11 12:01:48',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 410,
            'language_id' => 1,
            'caption_id' => 332,
            'caption_translation' => 'User Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:06:00',
            'updated_at' => '2018-09-11 12:06:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 411,
            'language_id' => 2,
            'caption_id' => 332,
            'caption_translation' => 'Информация о пользователе',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:06:25',
            'updated_at' => '2018-09-11 12:06:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 412,
            'language_id' => 1,
            'caption_id' => 333,
            'caption_translation' => 'Administration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:07:16',
            'updated_at' => '2018-09-11 12:07:16',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 413,
            'language_id' => 2,
            'caption_id' => 333,
            'caption_translation' => 'Администрирование',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-11 12:07:39',
            'updated_at' => '2018-09-11 12:07:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 414,
            'language_id' => 1,
            'caption_id' => 334,
            'caption_translation' => 'Server DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 8:37:36',
            'updated_at' => '2018-09-13 8:37:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 415,
            'language_id' => 2,
            'caption_id' => 334,
            'caption_translation' => 'Сервер БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 8:37:58',
            'updated_at' => '2018-09-13 8:37:58',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 416,
            'language_id' => 1,
            'caption_id' => 335,
            'caption_translation' => 'Actual',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 8:42:43',
            'updated_at' => '2018-09-13 8:42:43',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 417,
            'language_id' => 2,
            'caption_id' => 335,
            'caption_translation' => 'Актуальность',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 8:42:59',
            'updated_at' => '2018-09-13 8:42:59',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 418,
            'language_id' => 2,
            'caption_id' => 400,
            'caption_translation' => 'Тип и вид информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 419,
            'language_id' => 1,
            'caption_id' => 400,
            'caption_translation' => 'Information Kind and Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 420,
            'language_id' => 2,
            'caption_id' => 401,
            'caption_translation' => 'Информация о контрагенте и компании',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 421,
            'language_id' => 1,
            'caption_id' => 401,
            'caption_translation' => 'Contractor and company information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 422,
            'language_id' => 2,
            'caption_id' => 402,
            'caption_translation' => 'Тип доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 423,
            'language_id' => 1,
            'caption_id' => 402,
            'caption_translation' => 'Access Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 424,
            'language_id' => 2,
            'caption_id' => 403,
            'caption_translation' => 'Строка доступа пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 425,
            'language_id' => 1,
            'caption_id' => 403,
            'caption_translation' => 'Consumer Access Row',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 426,
            'language_id' => 2,
            'caption_id' => 404,
            'caption_translation' => 'Строки типов доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 427,
            'language_id' => 1,
            'caption_id' => 404,
            'caption_translation' => 'Access Type Rows',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 428,
            'language_id' => 2,
            'caption_id' => 405,
            'caption_translation' => 'Доступы к сущностям',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 429,
            'language_id' => 1,
            'caption_id' => 405,
            'caption_translation' => 'Access Entities',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 430,
            'language_id' => 2,
            'caption_id' => 406,
            'caption_translation' => 'ZZКонтрагенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 431,
            'language_id' => 1,
            'caption_id' => 406,
            'caption_translation' => 'ZZContractors',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 432,
            'language_id' => 2,
            'caption_id' => 407,
            'caption_translation' => 'ZZИнформация о контрагентах',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 433,
            'language_id' => 1,
            'caption_id' => 407,
            'caption_translation' => 'ZZContractors Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 434,
            'language_id' => 2,
            'caption_id' => 408,
            'caption_translation' => 'Причины изменения данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 435,
            'language_id' => 1,
            'caption_id' => 408,
            'caption_translation' => 'Reasons Data Change',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:50:12',
            'updated_at' => '2018-09-13 9:50:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 436,
            'language_id' => 2,
            'caption_id' => 409,
            'caption_translation' => 'Список отчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:59:17',
            'updated_at' => '2018-09-13 9:59:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 437,
            'language_id' => 1,
            'caption_id' => 409,
            'caption_translation' => 'Reports List',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:59:17',
            'updated_at' => '2018-09-13 9:59:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 438,
            'language_id' => 1,
            'caption_id' => 410,
            'caption_translation' => 'Log out',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:59:17',
            'updated_at' => '2018-09-13 9:59:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 439,
            'language_id' => 2,
            'caption_id' => 410,
            'caption_translation' => 'Выход',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-13 9:59:17',
            'updated_at' => '2018-09-13 9:59:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 443,
            'language_id' => 1,
            'caption_id' => 411,
            'caption_translation' => 'Representation',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-14 8:59:12',
            'updated_at' => '2018-09-14 8:59:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 444,
            'language_id' => 2,
            'caption_id' => 411,
            'caption_translation' => 'Представление',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-14 8:59:12',
            'updated_at' => '2018-09-14 8:59:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 445,
            'language_id' => 1,
            'caption_id' => 412,
            'caption_translation' => 'Basic Information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-14 9:10:30',
            'updated_at' => '2018-09-14 9:10:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 446,
            'language_id' => 2,
            'caption_id' => 412,
            'caption_translation' => 'Основная информация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-14 9:10:30',
            'updated_at' => '2018-09-14 9:10:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 447,
            'language_id' => 1,
            'caption_id' => 415,
            'caption_translation' => 'Basic Information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-17 8:01:38',
            'updated_at' => '2018-09-17 8:01:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 448,
            'language_id' => 2,
            'caption_id' => 415,
            'caption_translation' => 'Основная информация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-17 8:01:38',
            'updated_at' => '2018-09-17 8:01:38',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 455,
            'language_id' => 2,
            'caption_id' => 417,
            'caption_translation' => 'Вид информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:46:48',
            'updated_at' => '2018-09-20 7:46:48',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 456,
            'language_id' => 1,
            'caption_id' => 417,
            'caption_translation' => 'Kind of information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:46:48',
            'updated_at' => '2018-09-20 7:46:48',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 459,
            'language_id' => 2,
            'caption_id' => 418,
            'caption_translation' => 'Тип информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:51:25',
            'updated_at' => '2018-09-20 7:51:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 460,
            'language_id' => 1,
            'caption_id' => 418,
            'caption_translation' => 'Type of information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:51:25',
            'updated_at' => '2018-09-20 7:51:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 463,
            'language_id' => 2,
            'caption_id' => 419,
            'caption_translation' => 'Информация о контрагенте',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:58:09',
            'updated_at' => '2018-09-20 7:58:09',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 464,
            'language_id' => 1,
            'caption_id' => 419,
            'caption_translation' => 'Contractor Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-20 7:58:09',
            'updated_at' => '2018-09-20 7:58:09',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 465,
            'language_id' => 2,
            'caption_id' => 420,
            'caption_translation' => 'Пароль успешно изменен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:45:01',
            'updated_at' => '2018-09-21 8:45:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 466,
            'language_id' => 1,
            'caption_id' => 420,
            'caption_translation' => 'Password successfully changed',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:45:01',
            'updated_at' => '2018-09-21 8:45:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 468,
            'language_id' => 2,
            'caption_id' => 421,
            'caption_translation' => 'Новый пароль не должен совпадать со старым',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:54:27',
            'updated_at' => '2018-09-21 8:54:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 469,
            'language_id' => 1,
            'caption_id' => 421,
            'caption_translation' => 'New password should not match with your old password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:54:27',
            'updated_at' => '2018-09-21 8:54:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 470,
            'language_id' => 2,
            'caption_id' => 422,
            'caption_translation' => 'Старый пароль не совпадает',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:58:45',
            'updated_at' => '2018-09-21 8:58:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 471,
            'language_id' => 1,
            'caption_id' => 422,
            'caption_translation' => 'Old password not match',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 8:58:45',
            'updated_at' => '2018-09-21 8:58:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 472,
            'language_id' => 2,
            'caption_id' => 423,
            'caption_translation' => 'ОК',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:05:56',
            'updated_at' => '2018-09-21 10:05:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 473,
            'language_id' => 1,
            'caption_id' => 423,
            'caption_translation' => 'OK',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:05:56',
            'updated_at' => '2018-09-21 10:05:56',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 474,
            'language_id' => 2,
            'caption_id' => 424,
            'caption_translation' => 'Применить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:11:01',
            'updated_at' => '2018-09-21 10:11:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 476,
            'language_id' => 1,
            'caption_id' => 424,
            'caption_translation' => 'Apply',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:11:18',
            'updated_at' => '2018-09-21 10:11:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 477,
            'language_id' => 2,
            'caption_id' => 425,
            'caption_translation' => 'Назад',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:15:32',
            'updated_at' => '2018-09-21 10:15:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 478,
            'language_id' => 1,
            'caption_id' => 425,
            'caption_translation' => 'Back',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:15:32',
            'updated_at' => '2018-09-21 10:15:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 479,
            'language_id' => 2,
            'caption_id' => 426,
            'caption_translation' => 'Загруженные файлы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:52:25',
            'updated_at' => '2018-09-21 10:52:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 480,
            'language_id' => 1,
            'caption_id' => 426,
            'caption_translation' => 'Downloaded Files',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 10:52:25',
            'updated_at' => '2018-09-21 10:52:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 481,
            'language_id' => 2,
            'caption_id' => 427,
            'caption_translation' => 'Логин',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:01:32',
            'updated_at' => '2018-09-21 11:01:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 482,
            'language_id' => 1,
            'caption_id' => 427,
            'caption_translation' => 'Login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:01:32',
            'updated_at' => '2018-09-21 11:01:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 484,
            'language_id' => 2,
            'caption_id' => 428,
            'caption_translation' => 'Код',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:12:01',
            'updated_at' => '2018-09-21 11:12:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 485,
            'language_id' => 1,
            'caption_id' => 428,
            'caption_translation' => 'Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:12:01',
            'updated_at' => '2018-09-21 11:12:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 486,
            'language_id' => 2,
            'caption_id' => 429,
            'caption_translation' => 'Изменить пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:17:23',
            'updated_at' => '2018-09-21 11:17:23',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 487,
            'language_id' => 1,
            'caption_id' => 429,
            'caption_translation' => 'Change password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:17:23',
            'updated_at' => '2018-09-21 11:17:23',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 488,
            'language_id' => 2,
            'caption_id' => 430,
            'caption_translation' => 'E-mail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:26:08',
            'updated_at' => '2018-09-21 11:26:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 489,
            'language_id' => 1,
            'caption_id' => 430,
            'caption_translation' => 'E-mail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:26:08',
            'updated_at' => '2018-09-21 11:26:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 490,
            'language_id' => 2,
            'caption_id' => 431,
            'caption_translation' => 'Ел. почта 2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:32:17',
            'updated_at' => '2018-09-21 11:32:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 491,
            'language_id' => 1,
            'caption_id' => 431,
            'caption_translation' => 'E-mail 2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:32:17',
            'updated_at' => '2018-09-21 11:32:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 492,
            'language_id' => 2,
            'caption_id' => 432,
            'caption_translation' => 'Сайт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:40:37',
            'updated_at' => '2018-09-21 11:40:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 493,
            'language_id' => 1,
            'caption_id' => 432,
            'caption_translation' => 'Site',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:40:37',
            'updated_at' => '2018-09-21 11:40:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 494,
            'language_id' => 2,
            'caption_id' => 433,
            'caption_translation' => 'Персональная информация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:48:47',
            'updated_at' => '2018-09-21 11:48:47',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 495,
            'language_id' => 1,
            'caption_id' => 433,
            'caption_translation' => 'Personal information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:48:47',
            'updated_at' => '2018-09-21 11:48:47',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 497,
            'language_id' => 2,
            'caption_id' => 434,
            'caption_translation' => 'Фамилия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:53:35',
            'updated_at' => '2018-09-21 11:53:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 498,
            'language_id' => 1,
            'caption_id' => 434,
            'caption_translation' => 'Lastname',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 11:53:35',
            'updated_at' => '2018-09-21 11:53:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 499,
            'language_id' => 2,
            'caption_id' => 435,
            'caption_translation' => 'Отчество',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:14:40',
            'updated_at' => '2018-09-21 12:14:40',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 500,
            'language_id' => 1,
            'caption_id' => 435,
            'caption_translation' => 'Patronymic',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:14:40',
            'updated_at' => '2018-09-21 12:14:40',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 502,
            'language_id' => 2,
            'caption_id' => 436,
            'caption_translation' => 'Пол',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:15:08',
            'updated_at' => '2018-09-21 12:15:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 503,
            'language_id' => 1,
            'caption_id' => 436,
            'caption_translation' => 'Sex',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:15:08',
            'updated_at' => '2018-09-21 12:15:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 504,
            'language_id' => 2,
            'caption_id' => 437,
            'caption_translation' => 'Мужской',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:22:38',
            'updated_at' => '2018-09-21 12:22:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 505,
            'language_id' => 1,
            'caption_id' => 437,
            'caption_translation' => 'Male',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:22:38',
            'updated_at' => '2018-09-21 12:22:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 506,
            'language_id' => 2,
            'caption_id' => 438,
            'caption_translation' => 'Женский',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:25:42',
            'updated_at' => '2018-09-21 12:25:42',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 507,
            'language_id' => 1,
            'caption_id' => 438,
            'caption_translation' => 'Female',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:25:42',
            'updated_at' => '2018-09-21 12:25:42',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 508,
            'language_id' => 2,
            'caption_id' => 439,
            'caption_translation' => 'Дата рождения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:29:15',
            'updated_at' => '2018-09-21 12:29:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 509,
            'language_id' => 1,
            'caption_id' => 439,
            'caption_translation' => 'Birth Date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:29:15',
            'updated_at' => '2018-09-21 12:29:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 510,
            'language_id' => 2,
            'caption_id' => 440,
            'caption_translation' => 'Контактная информация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:34:29',
            'updated_at' => '2018-09-21 12:34:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 511,
            'language_id' => 1,
            'caption_id' => 440,
            'caption_translation' => 'Contact information',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-21 12:34:29',
            'updated_at' => '2018-09-21 12:34:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 512,
            'language_id' => 2,
            'caption_id' => 441,
            'caption_translation' => 'Организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:28:27',
            'updated_at' => '2018-09-25 7:28:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 513,
            'language_id' => 1,
            'caption_id' => 441,
            'caption_translation' => 'Companies',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:28:27',
            'updated_at' => '2018-09-25 7:28:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 516,
            'language_id' => 2,
            'caption_id' => 442,
            'caption_translation' => 'Контрагенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:44:52',
            'updated_at' => '2018-09-25 7:44:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 517,
            'language_id' => 1,
            'caption_id' => 442,
            'caption_translation' => 'Contractors',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:44:52',
            'updated_at' => '2018-09-25 7:44:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 520,
            'language_id' => 2,
            'caption_id' => 443,
            'caption_translation' => 'Настройка внешних БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:48:39',
            'updated_at' => '2018-09-25 7:48:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 521,
            'language_id' => 1,
            'caption_id' => 443,
            'caption_translation' => 'External database settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 7:48:39',
            'updated_at' => '2018-09-25 7:48:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 524,
            'language_id' => 2,
            'caption_id' => 444,
            'caption_translation' => 'Сервера БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:19:03',
            'updated_at' => '2018-09-25 8:19:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 525,
            'language_id' => 1,
            'caption_id' => 444,
            'caption_translation' => 'Database servers',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:19:03',
            'updated_at' => '2018-09-25 8:19:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 528,
            'language_id' => 2,
            'caption_id' => 445,
            'caption_translation' => 'Базы данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:27:30',
            'updated_at' => '2018-09-25 8:27:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 529,
            'language_id' => 1,
            'caption_id' => 445,
            'caption_translation' => 'Databases',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:27:30',
            'updated_at' => '2018-09-25 8:27:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 532,
            'language_id' => 2,
            'caption_id' => 446,
            'caption_translation' => 'Области БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:30:53',
            'updated_at' => '2018-09-25 8:30:53',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 534,
            'language_id' => 1,
            'caption_id' => 446,
            'caption_translation' => 'Database areas',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:30:53',
            'updated_at' => '2018-09-25 8:30:53',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 539,
            'language_id' => 2,
            'caption_id' => 447,
            'caption_translation' => 'Страны и регионы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:49:01',
            'updated_at' => '2018-09-25 8:49:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 540,
            'language_id' => 1,
            'caption_id' => 447,
            'caption_translation' => 'Countries&Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:49:01',
            'updated_at' => '2018-09-25 8:49:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 543,
            'language_id' => 2,
            'caption_id' => 448,
            'caption_translation' => 'Страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:55:36',
            'updated_at' => '2018-09-25 8:55:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 544,
            'language_id' => 1,
            'caption_id' => 448,
            'caption_translation' => 'Countries',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:55:36',
            'updated_at' => '2018-09-25 8:55:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 547,
            'language_id' => 2,
            'caption_id' => 449,
            'caption_translation' => 'Регионы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:58:52',
            'updated_at' => '2018-09-25 8:58:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 548,
            'language_id' => 1,
            'caption_id' => 449,
            'caption_translation' => 'Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 8:58:52',
            'updated_at' => '2018-09-25 8:58:52',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 551,
            'language_id' => 2,
            'caption_id' => 450,
            'caption_translation' => 'Языковые настройки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 9:02:11',
            'updated_at' => '2018-09-25 9:02:11',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 552,
            'language_id' => 1,
            'caption_id' => 450,
            'caption_translation' => 'Language settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 9:02:11',
            'updated_at' => '2018-09-25 9:02:11',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 555,
            'language_id' => 2,
            'caption_id' => 451,
            'caption_translation' => 'Языки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:02:33',
            'updated_at' => '2018-09-25 11:02:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 556,
            'language_id' => 1,
            'caption_id' => 451,
            'caption_translation' => 'Languages',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:02:33',
            'updated_at' => '2018-09-25 11:02:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 559,
            'language_id' => 2,
            'caption_id' => 452,
            'caption_translation' => 'Коды надписей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:05:02',
            'updated_at' => '2018-09-25 11:05:02',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 561,
            'language_id' => 1,
            'caption_id' => 452,
            'caption_translation' => 'Captions Codes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:05:02',
            'updated_at' => '2018-09-25 11:05:02',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 563,
            'language_id' => 2,
            'caption_id' => 453,
            'caption_translation' => 'Переводы надписей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:10:24',
            'updated_at' => '2018-09-25 11:10:24',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 564,
            'language_id' => 1,
            'caption_id' => 453,
            'caption_translation' => 'Caption Translations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:10:24',
            'updated_at' => '2018-09-25 11:10:24',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 567,
            'language_id' => 2,
            'caption_id' => 454,
            'caption_translation' => 'Виды контактной информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:18:34',
            'updated_at' => '2018-09-25 11:18:34',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 568,
            'language_id' => 1,
            'caption_id' => 454,
            'caption_translation' => 'Contact info kinds',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:18:34',
            'updated_at' => '2018-09-25 11:18:34',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 571,
            'language_id' => 2,
            'caption_id' => 455,
            'caption_translation' => 'Типы контактной информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:21:08',
            'updated_at' => '2018-09-25 11:21:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 572,
            'language_id' => 1,
            'caption_id' => 455,
            'caption_translation' => 'Contact info types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:21:08',
            'updated_at' => '2018-09-25 11:21:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 575,
            'language_id' => 2,
            'caption_id' => 456,
            'caption_translation' => 'Контактная информация по организациям',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:26:53',
            'updated_at' => '2018-09-25 11:26:53',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 579,
            'language_id' => 1,
            'caption_id' => 456,
            'caption_translation' => 'Companies contact info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:27:13',
            'updated_at' => '2018-09-25 11:27:13',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 582,
            'language_id' => 2,
            'caption_id' => 457,
            'caption_translation' => 'Контактная информация по контрагентам',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:36:58',
            'updated_at' => '2018-09-25 11:36:58',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 583,
            'language_id' => 1,
            'caption_id' => 457,
            'caption_translation' => 'Contractors contact info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:36:58',
            'updated_at' => '2018-09-25 11:36:58',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 586,
            'language_id' => 2,
            'caption_id' => 458,
            'caption_translation' => 'Типы доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:46:15',
            'updated_at' => '2018-09-25 11:46:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 587,
            'language_id' => 1,
            'caption_id' => 458,
            'caption_translation' => 'Access types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:46:15',
            'updated_at' => '2018-09-25 11:46:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 590,
            'language_id' => 2,
            'caption_id' => 459,
            'caption_translation' => 'Доступы пользователей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:47:46',
            'updated_at' => '2018-09-25 11:47:46',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 591,
            'language_id' => 1,
            'caption_id' => 459,
            'caption_translation' => 'Consumers accesses',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:47:46',
            'updated_at' => '2018-09-25 11:47:46',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 594,
            'language_id' => 2,
            'caption_id' => 460,
            'caption_translation' => 'Изменения в данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:59:15',
            'updated_at' => '2018-09-25 11:59:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 595,
            'language_id' => 1,
            'caption_id' => 460,
            'caption_translation' => 'Data Changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 11:59:15',
            'updated_at' => '2018-09-25 11:59:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 598,
            'language_id' => 2,
            'caption_id' => 461,
            'caption_translation' => 'Причины изменения данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:04:17',
            'updated_at' => '2018-09-25 12:04:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 599,
            'language_id' => 1,
            'caption_id' => 461,
            'caption_translation' => 'Data change reasons',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:04:17',
            'updated_at' => '2018-09-25 12:04:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 602,
            'language_id' => 2,
            'caption_id' => 462,
            'caption_translation' => 'Изменения данных Компаний',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:09:39',
            'updated_at' => '2018-09-25 12:09:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 604,
            'language_id' => 1,
            'caption_id' => 462,
            'caption_translation' => 'Companies Changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:09:39',
            'updated_at' => '2018-09-25 12:09:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 606,
            'language_id' => 2,
            'caption_id' => 463,
            'caption_translation' => 'Изменения контактной информации по компаниям',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:14:30',
            'updated_at' => '2018-09-25 12:14:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 607,
            'language_id' => 1,
            'caption_id' => 463,
            'caption_translation' => 'Companies contact info changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:14:30',
            'updated_at' => '2018-09-25 12:14:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 610,
            'language_id' => 2,
            'caption_id' => 464,
            'caption_translation' => 'Изменения Контрагентов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:26:17',
            'updated_at' => '2018-09-25 12:26:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 611,
            'language_id' => 1,
            'caption_id' => 464,
            'caption_translation' => 'Contractors Changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:26:17',
            'updated_at' => '2018-09-25 12:26:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 614,
            'language_id' => 2,
            'caption_id' => 465,
            'caption_translation' => 'Изменения контактной информации по контрагентам',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:31:15',
            'updated_at' => '2018-09-25 12:31:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 615,
            'language_id' => 1,
            'caption_id' => 465,
            'caption_translation' => 'Contractors contact info changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:31:15',
            'updated_at' => '2018-09-25 12:31:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 618,
            'language_id' => 2,
            'caption_id' => 466,
            'caption_translation' => 'Внешние отчеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 619,
            'language_id' => 1,
            'caption_id' => 466,
            'caption_translation' => 'External reports',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 620,
            'language_id' => 2,
            'caption_id' => 467,
            'caption_translation' => 'ЛК',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 621,
            'language_id' => 1,
            'caption_id' => 467,
            'caption_translation' => 'Dashboard',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 622,
            'language_id' => 1,
            'caption_id' => 468,
            'caption_translation' => 'Create a new report',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 623,
            'language_id' => 2,
            'caption_id' => 468,
            'caption_translation' => 'Создание нового отчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 624,
            'language_id' => 1,
            'caption_id' => 469,
            'caption_translation' => 'Name Contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 625,
            'language_id' => 2,
            'caption_id' => 469,
            'caption_translation' => 'Имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 626,
            'language_id' => 1,
            'caption_id' => 470,
            'caption_translation' => 'Name company',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 627,
            'language_id' => 2,
            'caption_id' => 470,
            'caption_translation' => 'Имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-09-25 12:35:57',
            'updated_at' => '2018-09-25 12:35:57',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 628,
            'language_id' => 1,
            'caption_id' => 471,
            'caption_translation' => 'ISO 639-1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 629,
            'language_id' => 2,
            'caption_id' => 471,
            'caption_translation' => 'ISO 639-1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 630,
            'language_id' => 1,
            'caption_id' => 472,
            'caption_translation' => 'ISO 639-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 631,
            'language_id' => 2,
            'caption_id' => 472,
            'caption_translation' => 'ISO 639-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 632,
            'language_id' => 1,
            'caption_id' => 473,
            'caption_translation' => 'Numeric code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 633,
            'language_id' => 2,
            'caption_id' => 473,
            'caption_translation' => 'Цифровой код',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 634,
            'language_id' => 1,
            'caption_id' => 474,
            'caption_translation' => 'Language code ISO 639-1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 635,
            'language_id' => 2,
            'caption_id' => 474,
            'caption_translation' => 'Код языка по ISO 639-1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 636,
            'language_id' => 1,
            'caption_id' => 475,
            'caption_translation' => 'Language code ISO 639-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 637,
            'language_id' => 2,
            'caption_id' => 475,
            'caption_translation' => 'Код языка по ISO 639-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 638,
            'language_id' => 1,
            'caption_id' => 476,
            'caption_translation' => 'Main',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 639,
            'language_id' => 2,
            'caption_id' => 476,
            'caption_translation' => 'Главная',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 640,
            'language_id' => 1,
            'caption_id' => 477,
            'caption_translation' => 'Translations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 641,
            'language_id' => 2,
            'caption_id' => 477,
            'caption_translation' => 'Переводы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 642,
            'language_id' => 1,
            'caption_id' => 478,
            'caption_translation' => '500 : UNEXPECTED ERROR',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 643,
            'language_id' => 2,
            'caption_id' => 478,
            'caption_translation' => 'ОШИБКА 500 : НЕПРЕДВИДЕННАЯ ОШИБКА',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 644,
            'language_id' => 1,
            'caption_id' => 479,
            'caption_translation' => '403 : FORBIDDEN',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 645,
            'language_id' => 2,
            'caption_id' => 479,
            'caption_translation' => 'ОШИБКА 403 : ДОСТУП ЗАПРЕЩЕН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 646,
            'language_id' => 1,
            'caption_id' => 480,
            'caption_translation' => '404 : PAGE NOT FOUND',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 647,
            'language_id' => 2,
            'caption_id' => 480,
            'caption_translation' => 'ОШИБКА 404 : СТРАНИЦА НЕ НАЙДЕНА',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 648,
            'language_id' => 1,
            'caption_id' => 481,
            'caption_translation' => 'The page you are looking for doesn`t exist or an other error occured.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 649,
            'language_id' => 2,
            'caption_id' => 481,
            'caption_translation' => 'Извините, страница, которую вы ищите не доступна.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 650,
            'language_id' => 1,
            'caption_id' => 482,
            'caption_translation' => 'Go head over',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 651,
            'language_id' => 2,
            'caption_id' => 482,
            'caption_translation' => 'Вернитесь на главную',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 652,
            'language_id' => 1,
            'caption_id' => 483,
            'caption_translation' => 'or',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 653,
            'language_id' => 2,
            'caption_id' => 483,
            'caption_translation' => 'или',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 654,
            'language_id' => 1,
            'caption_id' => 484,
            'caption_translation' => 'contact us',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 655,
            'language_id' => 2,
            'caption_id' => 484,
            'caption_translation' => 'сообщите о проблеме',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 656,
            'language_id' => 1,
            'caption_id' => 251,
            'caption_translation' => 'Language ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 657,
            'language_id' => 2,
            'caption_id' => 251,
            'caption_translation' => 'Язык',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 658,
            'language_id' => 1,
            'caption_id' => 486,
            'caption_translation' => 'Translation',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 659,
            'language_id' => 2,
            'caption_id' => 486,
            'caption_translation' => 'Перевод',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 660,
            'language_id' => 1,
            'caption_id' => 487,
            'caption_translation' => 'Change e-mail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 661,
            'language_id' => 2,
            'caption_id' => 487,
            'caption_translation' => 'Изменить эл. почту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 662,
            'language_id' => 1,
            'caption_id' => 488,
            'caption_translation' => 'Change login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 663,
            'language_id' => 2,
            'caption_id' => 488,
            'caption_translation' => 'Изменить логин',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 664,
            'language_id' => 1,
            'caption_id' => 489,
            'caption_translation' => 'Contractor full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 665,
            'language_id' => 2,
            'caption_id' => 489,
            'caption_translation' => 'Полное имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 666,
            'language_id' => 1,
            'caption_id' => 490,
            'caption_translation' => 'Created at',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 667,
            'language_id' => 2,
            'caption_id' => 490,
            'caption_translation' => 'Дата создания',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 670,
            'language_id' => 1,
            'caption_id' => 495,
            'caption_translation' => 'List of actions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 671,
            'language_id' => 2,
            'caption_id' => 495,
            'caption_translation' => 'Список действий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 672,
            'language_id' => 1,
            'caption_id' => 496,
            'caption_translation' => 'Create an account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 673,
            'language_id' => 2,
            'caption_id' => 496,
            'caption_translation' => 'Создать аккаунт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 674,
            'language_id' => 1,
            'caption_id' => 497,
            'caption_translation' => 'Full registration form',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 675,
            'language_id' => 2,
            'caption_id' => 497,
            'caption_translation' => 'Полная форма регистрации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 676,
            'language_id' => 1,
            'caption_id' => 516,
            'caption_translation' => 'We sent you reset password link. Please check your email and click on the link to reset.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 677,
            'language_id' => 2,
            'caption_id' => 516,
            'caption_translation' => 'Мы отправили вам ссылку на сброс пароля. Проверьте свою электронную почту и перейдите по ссылке.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 678,
            'language_id' => 1,
            'caption_id' => 498,
            'caption_translation' => 'We sent you an activation code. Please check your email and click on the link to verify.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 679,
            'language_id' => 2,
            'caption_id' => 498,
            'caption_translation' => 'Мы отправили вам код активации. Проверьте свою электронную почту и перейдите по ссылке, чтобы подтвердить его.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 680,
            'language_id' => 1,
            'caption_id' => 499,
            'caption_translation' => 'Forgotten password?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 681,
            'language_id' => 2,
            'caption_id' => 499,
            'caption_translation' => 'Забыли пароль?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 682,
            'language_id' => 1,
            'caption_id' => 500,
            'caption_translation' => 'Retrieve',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 683,
            'language_id' => 2,
            'caption_id' => 500,
            'caption_translation' => 'Восстановить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 684,
            'language_id' => 1,
            'caption_id' => 501,
            'caption_translation' => 'First time here? ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 685,
            'language_id' => 2,
            'caption_id' => 501,
            'caption_translation' => 'Впервые на сайте?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 686,
            'language_id' => 1,
            'caption_id' => 502,
            'caption_translation' => 'Have an account?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 687,
            'language_id' => 2,
            'caption_id' => 502,
            'caption_translation' => 'У Вас уже есть аккаунт?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 688,
            'language_id' => 1,
            'caption_id' => 503,
            'caption_translation' => 'Enter your e-mail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 689,
            'language_id' => 2,
            'caption_id' => 503,
            'caption_translation' => 'Введите вашу почту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 690,
            'language_id' => 1,
            'caption_id' => 504,
            'caption_translation' => 'Login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 691,
            'language_id' => 2,
            'caption_id' => 504,
            'caption_translation' => 'Войти',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 692,
            'language_id' => 1,
            'caption_id' => 505,
            'caption_translation' => 'Password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 693,
            'language_id' => 2,
            'caption_id' => 505,
            'caption_translation' => 'Пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 694,
            'language_id' => 1,
            'caption_id' => 506,
            'caption_translation' => 'Confirm Password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 695,
            'language_id' => 2,
            'caption_id' => 506,
            'caption_translation' => 'Подтвердите пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 696,
            'language_id' => 1,
            'caption_id' => 507,
            'caption_translation' => 'Create',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 697,
            'language_id' => 2,
            'caption_id' => 507,
            'caption_translation' => 'Создать',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 698,
            'language_id' => 1,
            'caption_id' => 508,
            'caption_translation' => 'Thank you for your registration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 699,
            'language_id' => 2,
            'caption_id' => 508,
            'caption_translation' => 'Спасибо за вашу регистрацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 700,
            'language_id' => 1,
            'caption_id' => 509,
            'caption_translation' => 'Follow',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 701,
            'language_id' => 2,
            'caption_id' => 509,
            'caption_translation' => 'Перейдите',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 702,
            'language_id' => 1,
            'caption_id' => 510,
            'caption_translation' => 'the link',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 703,
            'language_id' => 2,
            'caption_id' => 510,
            'caption_translation' => 'по ссылке',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 704,
            'language_id' => 1,
            'caption_id' => 511,
            'caption_translation' => 'to complete the registration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 705,
            'language_id' => 2,
            'caption_id' => 511,
            'caption_translation' => 'чтобы закончить регистрацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 706,
            'language_id' => 1,
            'caption_id' => 512,
            'caption_translation' => 'Your email is verified. You can now login.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 707,
            'language_id' => 2,
            'caption_id' => 512,
            'caption_translation' => 'Ваша почта подтверждена. Вы можете зайти.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 708,
            'language_id' => 1,
            'caption_id' => 513,
            'caption_translation' => 'Your login or email is not correct',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 709,
            'language_id' => 2,
            'caption_id' => 513,
            'caption_translation' => 'Ваши логин или эл. почта не правильные',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 710,
            'language_id' => 1,
            'caption_id' => 514,
            'caption_translation' => 'Remember the password?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 711,
            'language_id' => 2,
            'caption_id' => 514,
            'caption_translation' => 'Вспомнили пароль?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 712,
            'language_id' => 1,
            'caption_id' => 515,
            'caption_translation' => 'Send',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 713,
            'language_id' => 2,
            'caption_id' => 515,
            'caption_translation' => 'Отправить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 714,
            'language_id' => 1,
            'caption_id' => 520,
            'caption_translation' => 'Please enter the email address you used to create your account, and click on the link sent to your email.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 715,
            'language_id' => 2,
            'caption_id' => 520,
            'caption_translation' => 'Введите адрес электронной почты, который вы использовали для создания своей учетной записи, и перейдите по ссылке, отправленной вам на почту.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 716,
            'language_id' => 1,
            'caption_id' => 517,
            'caption_translation' => 'to finish change password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 717,
            'language_id' => 2,
            'caption_id' => 517,
            'caption_translation' => 'для завершения смены пароля',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 718,
            'language_id' => 1,
            'caption_id' => 518,
            'caption_translation' => 'You are not registered',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 719,
            'language_id' => 2,
            'caption_id' => 518,
            'caption_translation' => 'Вы не зарегестрированы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 720,
            'language_id' => 1,
            'caption_id' => 519,
            'caption_translation' => 'Passwords aren`t same',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 721,
            'language_id' => 2,
            'caption_id' => 519,
            'caption_translation' => 'Пароли не совпадают',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 722,
            'language_id' => 1,
            'caption_id' => 521,
            'caption_translation' => 'Please correctly fill out the fields in red to confirm your registration.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 723,
            'language_id' => 2,
            'caption_id' => 521,
            'caption_translation' => 'Чтобы подтвердить вашу регистрацию, необходимо правильно заполнить поля, отмеченные красным цветом.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-10-31 12:00:00',
            'updated_at' => '2018-10-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 724,
            'language_id' => 1,
            'caption_id' => 522,
            'caption_translation' => 'Contractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 725,
            'language_id' => 2,
            'caption_id' => 522,
            'caption_translation' => 'Контрагент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 726,
            'language_id' => 1,
            'caption_id' => 523,
            'caption_translation' => 'Contractor short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 727,
            'language_id' => 2,
            'caption_id' => 523,
            'caption_translation' => 'Краткое имя контрагента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 728,
            'language_id' => 1,
            'caption_id' => 524,
            'caption_translation' => 'Country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 729,
            'language_id' => 2,
            'caption_id' => 524,
            'caption_translation' => 'Название страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-01 12:00:00',
            'updated_at' => '2018-11-01 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 730,
            'language_id' => 1,
            'caption_id' => 525,
            'caption_translation' => 'You are registered. Check your email.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 731,
            'language_id' => 2,
            'caption_id' => 525,
            'caption_translation' => 'Вы зарегистрированы. Проверьте Вашу почту.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 732,
            'language_id' => 1,
            'caption_id' => 526,
            'caption_translation' => 'Sorry, your email cannot be identified.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 733,
            'language_id' => 2,
            'caption_id' => 526,
            'caption_translation' => 'Извините, Ваша электронная почта не может быть идентифицирована.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 734,
            'language_id' => 1,
            'caption_id' => 527,
            'caption_translation' => 'Wait a little longer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 735,
            'language_id' => 2,
            'caption_id' => 527,
            'caption_translation' => 'Подождите немного',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 736,
            'language_id' => 1,
            'caption_id' => 528,
            'caption_translation' => 'Activate new user registration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 737,
            'language_id' => 2,
            'caption_id' => 528,
            'caption_translation' => 'Активировать регистрацию нового пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 738,
            'language_id' => 1,
            'caption_id' => 529,
            'caption_translation' => 'Confirm new password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 739,
            'language_id' => 2,
            'caption_id' => 529,
            'caption_translation' => 'Подтвердите новый пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 740,
            'language_id' => 1,
            'caption_id' => 530,
            'caption_translation' => 'Confirm new email ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 741,
            'language_id' => 2,
            'caption_id' => 530,
            'caption_translation' => 'Подтвердите новую эл. почту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 742,
            'language_id' => 1,
            'caption_id' => 531,
            'caption_translation' => 'Caption Translations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 743,
            'language_id' => 2,
            'caption_id' => 531,
            'caption_translation' => 'Переводы надписей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-05 12:00:26',
            'updated_at' => '2018-11-05 12:00:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 744,
            'language_id' => 1,
            'caption_id' => 532,
            'caption_translation' => 'Email successfully changed',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 745,
            'language_id' => 2,
            'caption_id' => 532,
            'caption_translation' => 'Ел. почта успешно изменена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 746,
            'language_id' => 1,
            'caption_id' => 533,
            'caption_translation' => 'to finish change email!',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 747,
            'language_id' => 2,
            'caption_id' => 533,
            'caption_translation' => 'для завершения смены эл. почты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 748,
            'language_id' => 1,
            'caption_id' => 534,
            'caption_translation' => 'You have completed registration!',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 749,
            'language_id' => 2,
            'caption_id' => 534,
            'caption_translation' => 'Ваша регистрация подтверждена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 750,
            'language_id' => 1,
            'caption_id' => 535,
            'caption_translation' => 'Your login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 751,
            'language_id' => 2,
            'caption_id' => 535,
            'caption_translation' => 'Ваш логин',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 752,
            'language_id' => 1,
            'caption_id' => 536,
            'caption_translation' => 'Your password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 753,
            'language_id' => 2,
            'caption_id' => 536,
            'caption_translation' => 'Ваш пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 754,
            'language_id' => 1,
            'caption_id' => 537,
            'caption_translation' => 'Creation details',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 755,
            'language_id' => 2,
            'caption_id' => 537,
            'caption_translation' => 'Реквизиты создания',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-06 11:00:35',
            'updated_at' => '2018-11-06 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 756,
            'language_id' => 1,
            'caption_id' => 492,
            'caption_translation' => 'Created by',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 757,
            'language_id' => 2,
            'caption_id' => 492,
            'caption_translation' => 'Создано пользователем',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 758,
            'language_id' => 1,
            'caption_id' => 491,
            'caption_translation' => 'Updated at',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 759,
            'language_id' => 2,
            'caption_id' => 491,
            'caption_translation' => 'Последнее изменение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 760,
            'language_id' => 1,
            'caption_id' => 493,
            'caption_translation' => 'Updated by',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 761,
            'language_id' => 2,
            'caption_id' => 493,
            'caption_translation' => 'Изменено пользователем',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-07 11:00:35',
            'updated_at' => '2018-11-07 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 762,
            'language_id' => 1,
            'caption_id' => 538,
            'caption_translation' => 'Deletion mark ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 763,
            'language_id' => 2,
            'caption_id' => 538,
            'caption_translation' => 'Пометка на удаление (установить)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 764,
            'language_id' => 1,
            'caption_id' => 539,
            'caption_translation' => 'Database code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 765,
            'language_id' => 2,
            'caption_id' => 539,
            'caption_translation' => 'Код базы данных ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 766,
            'language_id' => 1,
            'caption_id' => 540,
            'caption_translation' => 'Description',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 767,
            'language_id' => 2,
            'caption_id' => 540,
            'caption_translation' => 'Описание',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-12 11:00:35',
            'updated_at' => '2018-11-12 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 768,
            'language_id' => 1,
            'caption_id' => 541,
            'caption_translation' => 'Your E-mail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 769,
            'language_id' => 2,
            'caption_id' => 541,
            'caption_translation' => 'Ваш адрес электронной почты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 770,
            'language_id' => 1,
            'caption_id' => 542,
            'caption_translation' => 'Database types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 771,
            'language_id' => 2,
            'caption_id' => 542,
            'caption_translation' => 'Типы баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 772,
            'language_id' => 1,
            'caption_id' => 543,
            'caption_translation' => 'Database type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 773,
            'language_id' => 2,
            'caption_id' => 543,
            'caption_translation' => 'Тип баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 774,
            'language_id' => 1,
            'caption_id' => 544,
            'caption_translation' => 'Database type ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 775,
            'language_id' => 2,
            'caption_id' => 544,
            'caption_translation' => 'ID типа баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 776,
            'language_id' => 1,
            'caption_id' => 545,
            'caption_translation' => 'Database type code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 777,
            'language_id' => 2,
            'caption_id' => 545,
            'caption_translation' => 'Код типа баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 778,
            'language_id' => 1,
            'caption_id' => 546,
            'caption_translation' => 'Database type name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 779,
            'language_id' => 2,
            'caption_id' => 546,
            'caption_translation' => 'Наименование типа баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 780,
            'language_id' => 1,
            'caption_id' => 547,
            'caption_translation' => 'Database type description',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 781,
            'language_id' => 2,
            'caption_id' => 547,
            'caption_translation' => 'Описание типа баз данных',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 782,
            'language_id' => 1,
            'caption_id' => 548,
            'caption_translation' => 'Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 783,
            'language_id' => 2,
            'caption_id' => 548,
            'caption_translation' => 'Код',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 784,
            'language_id' => 1,
            'caption_id' => 549,
            'caption_translation' => 'Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 785,
            'language_id' => 2,
            'caption_id' => 549,
            'caption_translation' => 'Наименование',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 786,
            'language_id' => 1,
            'caption_id' => 550,
            'caption_translation' => 'You can login to your account by email or login.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 787,
            'language_id' => 2,
            'caption_id' => 550,
            'caption_translation' => 'Вы можете войти в свою учетную запись по электронной почте или по логину.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 788,
            'language_id' => 1,
            'caption_id' => 551,
            'caption_translation' => 'Showing',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:35',
            'updated_at' => '2018-11-16 11:00:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 789,
            'language_id' => 2,
            'caption_id' => 551,
            'caption_translation' => 'Показаны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:36',
            'updated_at' => '2018-11-16 11:00:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 790,
            'language_id' => 1,
            'caption_id' => 552,
            'caption_translation' => 'of',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:37',
            'updated_at' => '2018-11-16 11:00:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 791,
            'language_id' => 2,
            'caption_id' => 552,
            'caption_translation' => 'из',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:38',
            'updated_at' => '2018-11-16 11:00:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 792,
            'language_id' => 1,
            'caption_id' => 553,
            'caption_translation' => 'on the page',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 793,
            'language_id' => 2,
            'caption_id' => 553,
            'caption_translation' => 'на странице',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 794,
            'language_id' => 1,
            'caption_id' => 554,
            'caption_translation' => 'Actions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 795,
            'language_id' => 2,
            'caption_id' => 554,
            'caption_translation' => 'Действия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 796,
            'language_id' => 1,
            'caption_id' => 555,
            'caption_translation' => 'Search',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 797,
            'language_id' => 2,
            'caption_id' => 555,
            'caption_translation' => 'Поиск',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-16 11:00:39',
            'updated_at' => '2018-11-16 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 798,
            'language_id' => 1,
            'caption_id' => 556,
            'caption_translation' => 'System details ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-19 11:00:39',
            'updated_at' => '2018-11-19 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 799,
            'language_id' => 2,
            'caption_id' => 556,
            'caption_translation' => 'Системные данные',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-19 11:00:39',
            'updated_at' => '2018-11-19 11:00:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 800,
            'language_id' => 1,
            'caption_id' => 557,
            'caption_translation' => 'Country full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 801,
            'language_id' => 2,
            'caption_id' => 557,
            'caption_translation' => 'Полное название страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 802,
            'language_id' => 1,
            'caption_id' => 558,
            'caption_translation' => 'Numeric country сode',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 803,
            'language_id' => 2,
            'caption_id' => 558,
            'caption_translation' => 'Цифровой код страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 804,
            'language_id' => 1,
            'caption_id' => 559,
            'caption_translation' => 'Country сode ISO 3166-1 Alpha-2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 805,
            'language_id' => 2,
            'caption_id' => 559,
            'caption_translation' => 'Код страны по ISO 3166-1 Alpha-2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 806,
            'language_id' => 1,
            'caption_id' => 560,
            'caption_translation' => 'Country сode ISO 3166-1 Alpha-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 807,
            'language_id' => 2,
            'caption_id' => 560,
            'caption_translation' => 'Код страны по ISO 3166-1 Alpha-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 808,
            'language_id' => 1,
            'caption_id' => 561,
            'caption_translation' => 'ISO 3166-1 Alpha-2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 809,
            'language_id' => 2,
            'caption_id' => 561,
            'caption_translation' => 'ISO 3166-1 Alpha-2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 810,
            'language_id' => 1,
            'caption_id' => 562,
            'caption_translation' => 'ISO 3166-1 Alpha-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 811,
            'language_id' => 2,
            'caption_id' => 562,
            'caption_translation' => 'ISO 3166-1 Alpha-3',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-20 12:00:00',
            'updated_at' => '2018-11-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 812,
            'language_id' => 1,
            'caption_id' => 563,
            'caption_translation' => 'Region',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 813,
            'language_id' => 2,
            'caption_id' => 563,
            'caption_translation' => 'Регион',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 814,
            'language_id' => 1,
            'caption_id' => 564,
            'caption_translation' => 'Region name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 815,
            'language_id' => 2,
            'caption_id' => 564,
            'caption_translation' => 'Наименование региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 816,
            'language_id' => 1,
            'caption_id' => 565,
            'caption_translation' => 'Region code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 817,
            'language_id' => 2,
            'caption_id' => 565,
            'caption_translation' => 'Код региона',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 818,
            'language_id' => 1,
            'caption_id' => 566,
            'caption_translation' => 'Region сode ISO-3166 Alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 819,
            'language_id' => 2,
            'caption_id' => 566,
            'caption_translation' => 'Код региона ISO-3166 Alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 820,
            'language_id' => 1,
            'caption_id' => 567,
            'caption_translation' => 'ISO-3166 Alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 821,
            'language_id' => 2,
            'caption_id' => 567,
            'caption_translation' => 'ISO-3166 Alpha',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-22 12:00:00',
            'updated_at' => '2018-11-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 822,
            'language_id' => 1,
            'caption_id' => 568,
            'caption_translation' => 'Profile',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-23 12:00:00',
            'updated_at' => '2018-11-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 823,
            'language_id' => 2,
            'caption_id' => 568,
            'caption_translation' => 'Профиль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-23 12:00:00',
            'updated_at' => '2018-11-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 824,
            'language_id' => 1,
            'caption_id' => 569,
            'caption_translation' => 'Country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-23 12:00:00',
            'updated_at' => '2018-11-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 825,
            'language_id' => 2,
            'caption_id' => 569,
            'caption_translation' => 'Страна',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-23 12:00:00',
            'updated_at' => '2018-11-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 826,
            'language_id' => 1,
            'caption_id' => 570,
            'caption_translation' => 'Company full name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 827,
            'language_id' => 2,
            'caption_id' => 570,
            'caption_translation' => 'Полное наименование организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 828,
            'language_id' => 1,
            'caption_id' => 571,
            'caption_translation' => 'Company short name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 829,
            'language_id' => 2,
            'caption_id' => 571,
            'caption_translation' => 'Краткое наименование организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 830,
            'language_id' => 1,
            'caption_id' => 572,
            'caption_translation' => 'Company',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 831,
            'language_id' => 2,
            'caption_id' => 572,
            'caption_translation' => 'Организация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 832,
            'language_id' => 1,
            'caption_id' => 573,
            'caption_translation' => 'Database areas',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 833,
            'language_id' => 2,
            'caption_id' => 573,
            'caption_translation' => 'Области БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 834,
            'language_id' => 1,
            'caption_id' => 574,
            'caption_translation' => 'Database area token',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 835,
            'language_id' => 2,
            'caption_id' => 574,
            'caption_translation' => 'Токен области БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 836,
            'language_id' => 1,
            'caption_id' => 575,
            'caption_translation' => 'Consumer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 837,
            'language_id' => 2,
            'caption_id' => 575,
            'caption_translation' => 'Пользователь',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-27 12:00:00',
            'updated_at' => '2018-11-27 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 838,
            'language_id' => 1,
            'caption_id' => 576,
            'caption_translation' => 'Database area code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 839,
            'language_id' => 2,
            'caption_id' => 576,
            'caption_translation' => 'Код области БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 840,
            'language_id' => 1,
            'caption_id' => 577,
            'caption_translation' => 'Database area name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 841,
            'language_id' => 2,
            'caption_id' => 577,
            'caption_translation' => 'Наименование области БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 842,
            'language_id' => 1,
            'caption_id' => 578,
            'caption_translation' => 'Database name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 843,
            'language_id' => 2,
            'caption_id' => 578,
            'caption_translation' => 'Наименование БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 844,
            'language_id' => 1,
            'caption_id' => 579,
            'caption_translation' => 'Consumer name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 845,
            'language_id' => 2,
            'caption_id' => 579,
            'caption_translation' => 'Имя пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 846,
            'language_id' => 1,
            'caption_id' => 580,
            'caption_translation' => 'Database partition 1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 847,
            'language_id' => 2,
            'caption_id' => 580,
            'caption_translation' => 'Раздел базы данных 1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 848,
            'language_id' => 1,
            'caption_id' => 581,
            'caption_translation' => 'Database partition 2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 849,
            'language_id' => 2,
            'caption_id' => 581,
            'caption_translation' => 'Раздел базы данных 2',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-28 12:00:00',
            'updated_at' => '2018-11-28 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 850,
            'language_id' => 1,
            'caption_id' => 582,
            'caption_translation' => 'Not assigned to DB',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-29 12:00:00',
            'updated_at' => '2018-11-29 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 851,
            'language_id' => 2,
            'caption_id' => 582,
            'caption_translation' => 'Не закреплен за БД',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-29 12:00:00',
            'updated_at' => '2018-11-29 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 852,
            'language_id' => 1,
            'caption_id' => 583,
            'caption_translation' => 'System user',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-29 12:00:00',
            'updated_at' => '2018-11-29 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 853,
            'language_id' => 2,
            'caption_id' => 583,
            'caption_translation' => 'Системный пользователь',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-29 12:00:00',
            'updated_at' => '2018-11-29 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 854,
            'language_id' => 1,
            'caption_id' => 584,
            'caption_translation' => 'Document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 855,
            'language_id' => 2,
            'caption_id' => 584,
            'caption_translation' => 'Документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 856,
            'language_id' => 1,
            'caption_id' => 585,
            'caption_translation' => 'Type of document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 857,
            'language_id' => 2,
            'caption_id' => 585,
            'caption_translation' => 'Тип документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 858,
            'language_id' => 1,
            'caption_id' => 586,
            'caption_translation' => 'Kind of document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 859,
            'language_id' => 2,
            'caption_id' => 586,
            'caption_translation' => 'Вид документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 860,
            'language_id' => 1,
            'caption_id' => 587,
            'caption_translation' => 'Required document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 861,
            'language_id' => 2,
            'caption_id' => 587,
            'caption_translation' => 'Обязательный документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-11-30 12:00:00',
            'updated_at' => '2018-11-30 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 862,
            'language_id' => 1,
            'caption_id' => 588,
            'caption_translation' => 'Attached documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 863,
            'language_id' => 2,
            'caption_id' => 588,
            'caption_translation' => 'Присоединенные документы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 864,
            'language_id' => 1,
            'caption_id' => 589,
            'caption_translation' => 'Create a new document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 865,
            'language_id' => 2,
            'caption_id' => 589,
            'caption_translation' => 'Cоздать новый документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 866,
            'language_id' => 1,
            'caption_id' => 590,
            'caption_translation' => 'Status',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 867,
            'language_id' => 2,
            'caption_id' => 590,
            'caption_translation' => 'Статус',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 868,
            'language_id' => 1,
            'caption_id' => 591,
            'caption_translation' => '№',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 869,
            'language_id' => 2,
            'caption_id' => 591,
            'caption_translation' => '#',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 870,
            'language_id' => 1,
            'caption_id' => 592,
            'caption_translation' => 'Format',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 871,
            'language_id' => 2,
            'caption_id' => 592,
            'caption_translation' => 'Формат',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 872,
            'language_id' => 1,
            'caption_id' => 593,
            'caption_translation' => 'Size',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 873,
            'language_id' => 2,
            'caption_id' => 593,
            'caption_translation' => 'Размер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 874,
            'language_id' => 1,
            'caption_id' => 594,
            'caption_translation' => 'Creating a new document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 875,
            'language_id' => 2,
            'caption_id' => 594,
            'caption_translation' => 'Создание нового документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 876,
            'language_id' => 1,
            'caption_id' => 595,
            'caption_translation' => 'Add new file',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 877,
            'language_id' => 2,
            'caption_id' => 595,
            'caption_translation' => 'Добавить новый файл',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 878,
            'language_id' => 1,
            'caption_id' => 596,
            'caption_translation' => 'Adding attached documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 879,
            'language_id' => 2,
            'caption_id' => 596,
            'caption_translation' => 'Добавление присоединенных документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 880,
            'language_id' => 1,
            'caption_id' => 597,
            'caption_translation' => 'new',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 881,
            'language_id' => 2,
            'caption_id' => 597,
            'caption_translation' => 'новый',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 882,
            'language_id' => 1,
            'caption_id' => 598,
            'caption_translation' => 'NameAttachedDocument',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 883,
            'language_id' => 2,
            'caption_id' => 598,
            'caption_translation' => 'Наименование присоединенного документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 884,
            'language_id' => 1,
            'caption_id' => 599,
            'caption_translation' => 'Edit document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 885,
            'language_id' => 2,
            'caption_id' => 599,
            'caption_translation' => 'Редактировать документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 886,
            'language_id' => 1,
            'caption_id' => 600,
            'caption_translation' => 'Editing attached documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 887,
            'language_id' => 2,
            'caption_id' => 600,
            'caption_translation' => 'Редактирование присоединенных документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 888,
            'language_id' => 1,
            'caption_id' => 601,
            'caption_translation' => 'Kinds of attached documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 889,
            'language_id' => 2,
            'caption_id' => 601,
            'caption_translation' => 'Виды присоединеных документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 890,
            'language_id' => 1,
            'caption_id' => 602,
            'caption_translation' => 'Types of attached documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 891,
            'language_id' => 2,
            'caption_id' => 602,
            'caption_translation' => 'Типы присоединеных документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 892,
            'language_id' => 1,
            'caption_id' => 603,
            'caption_translation' => 'Types of documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 893,
            'language_id' => 2,
            'caption_id' => 603,
            'caption_translation' => 'Типы документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 894,
            'language_id' => 1,
            'caption_id' => 604,
            'caption_translation' => 'Kinds of documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 895,
            'language_id' => 2,
            'caption_id' => 604,
            'caption_translation' => 'Виды документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 896,
            'language_id' => 1,
            'caption_id' => 605,
            'caption_translation' => 'Add new kind of document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 897,
            'language_id' => 2,
            'caption_id' => 605,
            'caption_translation' => 'Добавить новый вид документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 898,
            'language_id' => 1,
            'caption_id' => 606,
            'caption_translation' => 'Add new type of document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 899,
            'language_id' => 2,
            'caption_id' => 606,
            'caption_translation' => 'Добавить новый тип документа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 900,
            'language_id' => 1,
            'caption_id' => 607,
            'caption_translation' => 'Maximum number of files',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 901,
            'language_id' => 2,
            'caption_id' => 607,
            'caption_translation' => 'Максимальное количество файлов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 902,
            'language_id' => 1,
            'caption_id' => 608,
            'caption_translation' => 'HaveStandartTitles',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 903,
            'language_id' => 2,
            'caption_id' => 608,
            'caption_translation' => 'Есть стандартные наименования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 904,
            'language_id' => 1,
            'caption_id' => 609,
            'caption_translation' => 'Consumer account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 905,
            'language_id' => 2,
            'caption_id' => 609,
            'caption_translation' => 'Аккаунт пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 906,
            'language_id' => 1,
            'caption_id' => 610,
            'caption_translation' => 'Consumer accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 907,
            'language_id' => 2,
            'caption_id' => 610,
            'caption_translation' => 'Аккаунты пользователей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 908,
            'language_id' => 1,
            'caption_id' => 611,
            'caption_translation' => 'Consumer account code ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 909,
            'language_id' => 2,
            'caption_id' => 611,
            'caption_translation' => 'Код аккаунта пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 910,
            'language_id' => 1,
            'caption_id' => 612,
            'caption_translation' => 'Consumer account name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 911,
            'language_id' => 2,
            'caption_id' => 612,
            'caption_translation' => 'Наименование аккаунта пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-03 12:00:00',
            'updated_at' => '2018-12-03 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 912,
            'language_id' => 1,
            'caption_id' => 613,
            'caption_translation' => 'Database areas by account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-07 12:00:00',
            'updated_at' => '2018-12-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 913,
            'language_id' => 2,
            'caption_id' => 613,
            'caption_translation' => 'Область БД по аккаунту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-07 12:00:00',
            'updated_at' => '2018-12-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 914,
            'language_id' => 1,
            'caption_id' => 614,
            'caption_translation' => 'Database areas by accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-07 12:00:00',
            'updated_at' => '2018-12-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 915,
            'language_id' => 2,
            'caption_id' => 614,
            'caption_translation' => 'Области БД по аккаунтам',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2018-12-07 12:00:00',
            'updated_at' => '2018-12-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 916,
            'language_id' => 1,
            'caption_id' => 615,
            'caption_translation' => 'Bank name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 917,
            'language_id' => 2,
            'caption_id' => 615,
            'caption_translation' => 'Наименование банка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 918,
            'language_id' => 1,
            'caption_id' => 616,
            'caption_translation' => 'Bank name in English',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 919,
            'language_id' => 2,
            'caption_id' => 616,
            'caption_translation' => 'Наименование банка на английском',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 920,
            'language_id' => 1,
            'caption_id' => 617,
            'caption_translation' => 'Bank swift code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 921,
            'language_id' => 2,
            'caption_id' => 617,
            'caption_translation' => 'SWIFT код банка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 922,
            'language_id' => 1,
            'caption_id' => 618,
            'caption_translation' => 'Finances',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 923,
            'language_id' => 2,
            'caption_id' => 618,
            'caption_translation' => 'Финансы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 924,
            'language_id' => 1,
            'caption_id' => 619,
            'caption_translation' => 'Crypto assets',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 925,
            'language_id' => 2,
            'caption_id' => 619,
            'caption_translation' => 'Крипто активы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 926,
            'language_id' => 1,
            'caption_id' => 620,
            'caption_translation' => 'Currencies',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 927,
            'language_id' => 2,
            'caption_id' => 620,
            'caption_translation' => 'Валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 928,
            'language_id' => 1,
            'caption_id' => 621,
            'caption_translation' => 'Currency',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 929,
            'language_id' => 2,
            'caption_id' => 621,
            'caption_translation' => 'Валюта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 930,
            'language_id' => 1,
            'caption_id' => 622,
            'caption_translation' => 'Banks',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 931,
            'language_id' => 2,
            'caption_id' => 622,
            'caption_translation' => 'Банки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 932,
            'language_id' => 1,
            'caption_id' => 623,
            'caption_translation' => 'Bank',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 933,
            'language_id' => 2,
            'caption_id' => 623,
            'caption_translation' => 'Банк',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 934,
            'language_id' => 1,
            'caption_id' => 624,
            'caption_translation' => 'Bank accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 935,
            'language_id' => 2,
            'caption_id' => 624,
            'caption_translation' => 'Банковские счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 936,
            'language_id' => 1,
            'caption_id' => 625,
            'caption_translation' => 'Bank account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 937,
            'language_id' => 2,
            'caption_id' => 625,
            'caption_translation' => 'Банковский счет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 938,
            'language_id' => 1,
            'caption_id' => 626,
            'caption_translation' => 'Bank account types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 939,
            'language_id' => 2,
            'caption_id' => 626,
            'caption_translation' => 'Типы банковских счетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 940,
            'language_id' => 1,
            'caption_id' => 627,
            'caption_translation' => 'Bank account type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 941,
            'language_id' => 2,
            'caption_id' => 627,
            'caption_translation' => 'Тип банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 942,
            'language_id' => 1,
            'caption_id' => 628,
            'caption_translation' => 'Crypto tokens',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 943,
            'language_id' => 2,
            'caption_id' => 628,
            'caption_translation' => 'Крипто токены',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 944,
            'language_id' => 1,
            'caption_id' => 629,
            'caption_translation' => 'Crypto token',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 945,
            'language_id' => 2,
            'caption_id' => 629,
            'caption_translation' => 'Крипто токен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 946,
            'language_id' => 1,
            'caption_id' => 630,
            'caption_translation' => 'Crypto exchanges',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 947,
            'language_id' => 2,
            'caption_id' => 630,
            'caption_translation' => 'Крипто биржы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 948,
            'language_id' => 1,
            'caption_id' => 631,
            'caption_translation' => 'Crypto exchange',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 949,
            'language_id' => 2,
            'caption_id' => 631,
            'caption_translation' => 'Крипто биржа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 950,
            'language_id' => 1,
            'caption_id' => 632,
            'caption_translation' => 'Crypto wallets',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 951,
            'language_id' => 2,
            'caption_id' => 632,
            'caption_translation' => 'Крипто кошельки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 952,
            'language_id' => 1,
            'caption_id' => 633,
            'caption_translation' => 'Crypto wallet',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 953,
            'language_id' => 2,
            'caption_id' => 633,
            'caption_translation' => 'Крипто кошелек',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 954,
            'language_id' => 1,
            'caption_id' => 634,
            'caption_translation' => 'Crypto platforms',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 955,
            'language_id' => 2,
            'caption_id' => 634,
            'caption_translation' => 'Крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 956,
            'language_id' => 1,
            'caption_id' => 635,
            'caption_translation' => 'Crypto platform',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 957,
            'language_id' => 2,
            'caption_id' => 635,
            'caption_translation' => 'Крипто платформа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 958,
            'language_id' => 1,
            'caption_id' => 636,
            'caption_translation' => 'Crypto accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 959,
            'language_id' => 2,
            'caption_id' => 636,
            'caption_translation' => 'Крипто аккаунты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 960,
            'language_id' => 1,
            'caption_id' => 637,
            'caption_translation' => 'Crypto account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 961,
            'language_id' => 2,
            'caption_id' => 637,
            'caption_translation' => 'Крипто аккаунт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 962,
            'language_id' => 1,
            'caption_id' => 638,
            'caption_translation' => 'Bank nation code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 963,
            'language_id' => 2,
            'caption_id' => 638,
            'caption_translation' => 'Национальный код банка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 964,
            'language_id' => 1,
            'caption_id' => 639,
            'caption_translation' => 'Correspondent bank account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 965,
            'language_id' => 2,
            'caption_id' => 639,
            'caption_translation' => 'Корреспондентский счет банка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 966,
            'language_id' => 1,
            'caption_id' => 640,
            'caption_translation' => 'City',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 967,
            'language_id' => 2,
            'caption_id' => 640,
            'caption_translation' => 'Город',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 968,
            'language_id' => 1,
            'caption_id' => 641,
            'caption_translation' => 'City name in English',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 969,
            'language_id' => 2,
            'caption_id' => 641,
            'caption_translation' => 'Наименование города на английском',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-07 12:00:00',
            'updated_at' => '2019-01-07 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 970,
            'language_id' => 1,
            'caption_id' => 642,
            'caption_translation' => 'System images',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 971,
            'language_id' => 2,
            'caption_id' => 642,
            'caption_translation' => 'Системные картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 972,
            'language_id' => 1,
            'caption_id' => 643,
            'caption_translation' => 'Image categories',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 973,
            'language_id' => 2,
            'caption_id' => 643,
            'caption_translation' => 'Категории картинок',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 974,
            'language_id' => 1,
            'caption_id' => 644,
            'caption_translation' => 'Images',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 975,
            'language_id' => 2,
            'caption_id' => 644,
            'caption_translation' => 'Картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 976,
            'language_id' => 1,
            'caption_id' => 645,
            'caption_translation' => 'Image',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 977,
            'language_id' => 2,
            'caption_id' => 645,
            'caption_translation' => 'Картинка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 978,
            'language_id' => 1,
            'caption_id' => 646,
            'caption_translation' => 'Image category',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 979,
            'language_id' => 2,
            'caption_id' => 646,
            'caption_translation' => 'Категория картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-09 12:00:00',
            'updated_at' => '2019-01-09 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 980,
            'language_id' => 1,
            'caption_id' => 647,
            'caption_translation' => 'Currency name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 981,
            'language_id' => 2,
            'caption_id' => 647,
            'caption_translation' => 'Наименование валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 982,
            'language_id' => 1,
            'caption_id' => 648,
            'caption_translation' => 'Currency code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 983,
            'language_id' => 2,
            'caption_id' => 648,
            'caption_translation' => 'Буквенный код валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 984,
            'language_id' => 1,
            'caption_id' => 649,
            'caption_translation' => 'Currency code number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 985,
            'language_id' => 2,
            'caption_id' => 649,
            'caption_translation' => 'Цифровой код валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 986,
            'language_id' => 1,
            'caption_id' => 650,
            'caption_translation' => 'Currency symbol',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 987,
            'language_id' => 2,
            'caption_id' => 650,
            'caption_translation' => 'Символ валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 988,
            'language_id' => 1,
            'caption_id' => 651,
            'caption_translation' => 'Crypto platform name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 989,
            'language_id' => 2,
            'caption_id' => 651,
            'caption_translation' => 'Наименование крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 990,
            'language_id' => 1,
            'caption_id' => 652,
            'caption_translation' => 'Crypto platform URL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 991,
            'language_id' => 2,
            'caption_id' => 652,
            'caption_translation' => 'URL крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 992,
            'language_id' => 1,
            'caption_id' => 653,
            'caption_translation' => 'Crypto platform code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 993,
            'language_id' => 2,
            'caption_id' => 653,
            'caption_translation' => 'Код крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 994,
            'language_id' => 1,
            'caption_id' => 654,
            'caption_translation' => 'Сrypto exchange name ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 995,
            'language_id' => 2,
            'caption_id' => 654,
            'caption_translation' => 'Наименование крипто биржы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 996,
            'language_id' => 1,
            'caption_id' => 655,
            'caption_translation' => 'Crypto exchange code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 997,
            'language_id' => 2,
            'caption_id' => 655,
            'caption_translation' => 'Код крипто биржы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 998,
            'language_id' => 1,
            'caption_id' => 656,
            'caption_translation' => 'Crypto exchange URL',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 999,
            'language_id' => 2,
            'caption_id' => 656,
            'caption_translation' => 'URL крипто биржы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-10 12:00:00',
            'updated_at' => '2019-01-10 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1000,
            'language_id' => 1,
            'caption_id' => 657,
            'caption_translation' => 'Bank account type code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1001,
            'language_id' => 2,
            'caption_id' => 657,
            'caption_translation' => 'Код типа банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1002,
            'language_id' => 1,
            'caption_id' => 658,
            'caption_translation' => 'Bank account type name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1003,
            'language_id' => 2,
            'caption_id' => 658,
            'caption_translation' => 'Наименование типа банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1004,
            'language_id' => 1,
            'caption_id' => 659,
            'caption_translation' => 'Bank account number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1005,
            'language_id' => 2,
            'caption_id' => 659,
            'caption_translation' => 'Номер банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1006,
            'language_id' => 1,
            'caption_id' => 660,
            'caption_translation' => 'Bank account name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1007,
            'language_id' => 2,
            'caption_id' => 660,
            'caption_translation' => 'Наименование банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1008,
            'language_id' => 1,
            'caption_id' => 661,
            'caption_translation' => 'Bank account holder',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1009,
            'language_id' => 2,
            'caption_id' => 661,
            'caption_translation' => 'Владелец банковского счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-11 12:00:00',
            'updated_at' => '2019-01-11 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1010,
            'language_id' => 1,
            'caption_id' => 662,
            'caption_translation' => 'Account number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-14 12:00:00',
            'updated_at' => '2019-01-14 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1011,
            'language_id' => 2,
            'caption_id' => 662,
            'caption_translation' => 'Номер счета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-14 12:00:00',
            'updated_at' => '2019-01-14 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1012,
            'language_id' => 1,
            'caption_id' => 663,
            'caption_translation' => 'Path',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-15 12:00:00',
            'updated_at' => '2019-01-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1013,
            'language_id' => 2,
            'caption_id' => 663,
            'caption_translation' => 'Путь',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-15 12:00:00',
            'updated_at' => '2019-01-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1014,
            'language_id' => 1,
            'caption_id' => 664,
            'caption_translation' => 'Category',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-15 12:00:00',
            'updated_at' => '2019-01-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1015,
            'language_id' => 2,
            'caption_id' => 664,
            'caption_translation' => 'Категория',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-15 12:00:00',
            'updated_at' => '2019-01-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1016,
            'language_id' => 1,
            'caption_id' => 665,
            'caption_translation' => 'Image category name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1017,
            'language_id' => 2,
            'caption_id' => 665,
            'caption_translation' => 'Наименование категории картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1018,
            'language_id' => 1,
            'caption_id' => 666,
            'caption_translation' => 'Image category code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1019,
            'language_id' => 2,
            'caption_id' => 666,
            'caption_translation' => 'Код категории картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1020,
            'language_id' => 1,
            'caption_id' => 667,
            'caption_translation' => 'Image category path',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1021,
            'language_id' => 2,
            'caption_id' => 667,
            'caption_translation' => 'Путь категории картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1022,
            'language_id' => 1,
            'caption_id' => 668,
            'caption_translation' => 'Crypto account holder',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1023,
            'language_id' => 2,
            'caption_id' => 668,
            'caption_translation' => 'Владелец крипто аккаунта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1024,
            'language_id' => 1,
            'caption_id' => 669,
            'caption_translation' => 'External service',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1025,
            'language_id' => 2,
            'caption_id' => 669,
            'caption_translation' => 'Внешний сервис',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-16 12:00:00',
            'updated_at' => '2019-01-16 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1026,
            'language_id' => 1,
            'caption_id' => 670,
            'caption_translation' => 'File types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1027,
            'language_id' => 2,
            'caption_id' => 670,
            'caption_translation' => 'Типы файлов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1028,
            'language_id' => 1,
            'caption_id' => 671,
            'caption_translation' => 'File type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1029,
            'language_id' => 2,
            'caption_id' => 671,
            'caption_translation' => 'Тип файла',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1030,
            'language_id' => 1,
            'caption_id' => 672,
            'caption_translation' => 'Letter code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1031,
            'language_id' => 2,
            'caption_id' => 672,
            'caption_translation' => 'Буквенный код',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1032,
            'language_id' => 1,
            'caption_id' => 673,
            'caption_translation' => 'Symbol',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1033,
            'language_id' => 2,
            'caption_id' => 673,
            'caption_translation' => 'Символ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-17 12:00:00',
            'updated_at' => '2019-01-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1034,
            'language_id' => 1,
            'caption_id' => 674,
            'caption_translation' => 'Crypto token name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1035,
            'language_id' => 2,
            'caption_id' => 674,
            'caption_translation' => 'Наименование крипто токена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1036,
            'language_id' => 1,
            'caption_id' => 675,
            'caption_translation' => 'Crypto token code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1037,
            'language_id' => 2,
            'caption_id' => 675,
            'caption_translation' => 'Буквенный код крипто токена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1038,
            'language_id' => 1,
            'caption_id' => 676,
            'caption_translation' => 'Crypto token symbol',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1039,
            'language_id' => 2,
            'caption_id' => 676,
            'caption_translation' => 'Символ крипто токена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1040,
            'language_id' => 1,
            'caption_id' => 677,
            'caption_translation' => 'Crypto wallet name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1041,
            'language_id' => 2,
            'caption_id' => 677,
            'caption_translation' => 'Наименование крипто кошелька',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1042,
            'language_id' => 1,
            'caption_id' => 678,
            'caption_translation' => 'Crypto wallet code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1043,
            'language_id' => 2,
            'caption_id' => 678,
            'caption_translation' => 'Код крипто кошелька',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1044,
            'language_id' => 1,
            'caption_id' => 679,
            'caption_translation' => 'Crypto wallet number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1045,
            'language_id' => 2,
            'caption_id' => 679,
            'caption_translation' => 'Номер крипто кошелька',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-18 12:00:00',
            'updated_at' => '2019-01-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1046,
            'language_id' => 1,
            'caption_id' => 680,
            'caption_translation' => 'Crypto exchange accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1047,
            'language_id' => 2,
            'caption_id' => 680,
            'caption_translation' => 'Биржевые крипто аккаунты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1048,
            'language_id' => 1,
            'caption_id' => 681,
            'caption_translation' => 'Crypto account login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1049,
            'language_id' => 2,
            'caption_id' => 681,
            'caption_translation' => 'Логин доступа к крипто аккаунту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1050,
            'language_id' => 1,
            'caption_id' => 682,
            'caption_translation' => 'Crypto account password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1051,
            'language_id' => 2,
            'caption_id' => 682,
            'caption_translation' => 'Пароль доступа к крипто аккаунту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1052,
            'language_id' => 1,
            'caption_id' => 683,
            'caption_translation' => 'Crypto account name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1053,
            'language_id' => 2,
            'caption_id' => 683,
            'caption_translation' => 'Наименование крипто аккаунта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-21 12:00:00',
            'updated_at' => '2019-01-21 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1054,
            'language_id' => 1,
            'caption_id' => 684,
            'caption_translation' => 'Crypto exchange account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-22 12:00:00',
            'updated_at' => '2019-01-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1055,
            'language_id' => 2,
            'caption_id' => 684,
            'caption_translation' => 'Биржевой крипто аккаунт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-22 12:00:00',
            'updated_at' => '2019-01-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1056,
            'language_id' => 1,
            'caption_id' => 685,
            'caption_translation' => 'Holder of crypto exchange account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-22 12:00:00',
            'updated_at' => '2019-01-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1057,
            'language_id' => 2,
            'caption_id' => 685,
            'caption_translation' => 'Владелец биржевого крипто аккаунта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-22 12:00:00',
            'updated_at' => '2019-01-22 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1058,
            'language_id' => 1,
            'caption_id' => 686,
            'caption_translation' => 'Holder of crypto platform account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1059,
            'language_id' => 2,
            'caption_id' => 686,
            'caption_translation' => 'Владелец крипто аккаунта платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1060,
            'language_id' => 1,
            'caption_id' => 687,
            'caption_translation' => 'Crypto platform accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1061,
            'language_id' => 2,
            'caption_id' => 687,
            'caption_translation' => 'Аккаунты крипто платформ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1062,
            'language_id' => 1,
            'caption_id' => 688,
            'caption_translation' => 'Crypto platform account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1063,
            'language_id' => 2,
            'caption_id' => 688,
            'caption_translation' => 'Аккаунт крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1064,
            'language_id' => 1,
            'caption_id' => 689,
            'caption_translation' => 'Image name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1065,
            'language_id' => 2,
            'caption_id' => 689,
            'caption_translation' => 'Наименование картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-23 12:00:00',
            'updated_at' => '2019-01-23 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1066,
            'language_id' => 1,
            'caption_id' => 690,
            'caption_translation' => 'Image code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1067,
            'language_id' => 2,
            'caption_id' => 690,
            'caption_translation' => 'Код картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1068,
            'language_id' => 1,
            'caption_id' => 691,
            'caption_translation' => 'File type name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1069,
            'language_id' => 2,
            'caption_id' => 691,
            'caption_translation' => 'Наименование типа файла',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1070,
            'language_id' => 1,
            'caption_id' => 692,
            'caption_translation' => 'File type code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1071,
            'language_id' => 2,
            'caption_id' => 692,
            'caption_translation' => 'Код типа файла',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-24 12:00:00',
            'updated_at' => '2019-01-24 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1072,
            'language_id' => 1,
            'caption_id' => 693,
            'caption_translation' => 'Not crypto asset',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1073,
            'language_id' => 2,
            'caption_id' => 693,
            'caption_translation' => 'Не является крипто активом',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1074,
            'language_id' => 1,
            'caption_id' => 694,
            'caption_translation' => 'Holder of crypto platform`s wallet',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1075,
            'language_id' => 2,
            'caption_id' => 694,
            'caption_translation' => 'Владелец кошелька крипто платформы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1076,
            'language_id' => 1,
            'caption_id' => 695,
            'caption_translation' => 'Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1077,
            'language_id' => 2,
            'caption_id' => 695,
            'caption_translation' => 'Номер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1078,
            'language_id' => 1,
            'caption_id' => 696,
            'caption_translation' => 'Not assigned to country',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1079,
            'language_id' => 2,
            'caption_id' => 696,
            'caption_translation' => 'Не закреплена за страной',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1080,
            'language_id' => 1,
            'caption_id' => 697,
            'caption_translation' => 'Not visualized',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1081,
            'language_id' => 2,
            'caption_id' => 697,
            'caption_translation' => 'Нет визуализации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1082,
            'language_id' => 1,
            'caption_id' => 698,
            'caption_translation' => 'There are no records matching your request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1083,
            'language_id' => 2,
            'caption_id' => 698,
            'caption_translation' => 'Нет записей, соответствующих вашему запросу',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-31 12:00:00',
            'updated_at' => '2019-01-31 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1084,
            'language_id' => 1,
            'caption_id' => 699,
            'caption_translation' => 'Filter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-15 12:00:00',
            'updated_at' => '2019-03-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1085,
            'language_id' => 2,
            'caption_id' => 699,
            'caption_translation' => 'Фильтр',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-15 12:00:00',
            'updated_at' => '2019-03-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1086,
            'language_id' => 1,
            'caption_id' => 700,
            'caption_translation' => 'No image',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-15 12:00:00',
            'updated_at' => '2019-03-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1087,
            'language_id' => 2,
            'caption_id' => 700,
            'caption_translation' => 'Без картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-15 12:00:00',
            'updated_at' => '2019-03-15 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1088,
            'language_id' => 1,
            'caption_id' => 701,
            'caption_translation' => 'Properties',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-26 12:00:00',
            'updated_at' => '2019-03-26 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1089,
            'language_id' => 2,
            'caption_id' => 701,
            'caption_translation' => 'Свойства',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-03-26 12:00:00',
            'updated_at' => '2019-03-26 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1090,
            'language_id' => 1,
            'caption_id' => 702,
            'caption_translation' => 'Enter Old Password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1091,
            'language_id' => 2,
            'caption_id' => 702,
            'caption_translation' => 'Введите старый пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1092,
            'language_id' => 1,
            'caption_id' => 703,
            'caption_translation' => 'Enter New Password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1093,
            'language_id' => 2,
            'caption_id' => 703,
            'caption_translation' => 'Введите новый пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1094,
            'language_id' => 1,
            'caption_id' => 704,
            'caption_translation' => 'Repeat New Password',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1095,
            'language_id' => 2,
            'caption_id' => 704,
            'caption_translation' => 'Повторите новый пароль',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1096,
            'language_id' => 1,
            'caption_id' => 705,
            'caption_translation' => 'Cancel',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1097,
            'language_id' => 2,
            'caption_id' => 705,
            'caption_translation' => 'Отмена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1098,
            'language_id' => 1,
            'caption_id' => 706,
            'caption_translation' => 'Enter New Login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1099,
            'language_id' => 2,
            'caption_id' => 706,
            'caption_translation' => 'Введите новый логин',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1100,
            'language_id' => 1,
            'caption_id' => 707,
            'caption_translation' => 'Enter New Email',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1101,
            'language_id' => 2,
            'caption_id' => 707,
            'caption_translation' => 'Введите новую эл. почту',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 14:00:00',
            'updated_at' => '2019-04-20 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1102,
            'language_id' => 1,
            'caption_id' => 708,
            'caption_translation' => 'INN',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1103,
            'language_id' => 2,
            'caption_id' => 708,
            'caption_translation' => 'ИНН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1104,
            'language_id' => 1,
            'caption_id' => 709,
            'caption_translation' => 'OGRN',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1105,
            'language_id' => 2,
            'caption_id' => 709,
            'caption_translation' => 'ОГРН',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1106,
            'language_id' => 1,
            'caption_id' => 710,
            'caption_translation' => 'KPP',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1107,
            'language_id' => 2,
            'caption_id' => 710,
            'caption_translation' => 'КПП',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1108,
            'language_id' => 1,
            'caption_id' => 711,
            'caption_translation' => 'Notifications',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1109,
            'language_id' => 2,
            'caption_id' => 711,
            'caption_translation' => 'Уведомления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1110,
            'language_id' => 1,
            'caption_id' => 712,
            'caption_translation' => 'Value',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1111,
            'language_id' => 2,
            'caption_id' => 712,
            'caption_translation' => 'Значение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1112,
            'language_id' => 1,
            'caption_id' => 713,
            'caption_translation' => 'Legal Address',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1113,
            'language_id' => 2,
            'caption_id' => 713,
            'caption_translation' => 'Юридический адрес',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-11 14:00:00',
            'updated_at' => '2019-04-11 14:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1114,
            'language_id' => 1,
            'caption_id' => 714,
            'caption_translation' => 'Client',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1115,
            'language_id' => 2,
            'caption_id' => 714,
            'caption_translation' => 'Клиент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1116,
            'language_id' => 1,
            'caption_id' => 715,
            'caption_translation' => 'Clients',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1117,
            'language_id' => 2,
            'caption_id' => 715,
            'caption_translation' => 'Клиенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1118,
            'language_id' => 1,
            'caption_id' => 716,
            'caption_translation' => 'User Of System',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1119,
            'language_id' => 2,
            'caption_id' => 716,
            'caption_translation' => 'Пользователь системы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1120,
            'language_id' => 1,
            'caption_id' => 717,
            'caption_translation' => 'Users Of System',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1121,
            'language_id' => 2,
            'caption_id' => 717,
            'caption_translation' => 'Пользователи системы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1122,
            'language_id' => 1,
            'caption_id' => 718,
            'caption_translation' => 'Data Exchange',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1123,
            'language_id' => 2,
            'caption_id' => 718,
            'caption_translation' => 'Обмен данными',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1124,
            'language_id' => 1,
            'caption_id' => 719,
            'caption_translation' => 'Query Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1125,
            'language_id' => 2,
            'caption_id' => 719,
            'caption_translation' => 'Типы запросов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1126,
            'language_id' => 1,
            'caption_id' => 720,
            'caption_translation' => 'Query Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1127,
            'language_id' => 2,
            'caption_id' => 720,
            'caption_translation' => 'Тип запроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1128,
            'language_id' => 1,
            'caption_id' => 721,
            'caption_translation' => 'System Parameters',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1129,
            'language_id' => 2,
            'caption_id' => 721,
            'caption_translation' => 'Системные параметры',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1130,
            'language_id' => 1,
            'caption_id' => 722,
            'caption_translation' => 'Preliminary Offers',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1131,
            'language_id' => 2,
            'caption_id' => 722,
            'caption_translation' => 'Коммерческие предложения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1132,
            'language_id' => 1,
            'caption_id' => 723,
            'caption_translation' => 'Preliminary Offer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1133,
            'language_id' => 2,
            'caption_id' => 723,
            'caption_translation' => 'Коммерческое предложение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1134,
            'language_id' => 1,
            'caption_id' => 724,
            'caption_translation' => 'Leasing requests',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1135,
            'language_id' => 2,
            'caption_id' => 724,
            'caption_translation' => 'Заявки на лизинг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1136,
            'language_id' => 1,
            'caption_id' => 725,
            'caption_translation' => 'Leasing request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1137,
            'language_id' => 2,
            'caption_id' => 725,
            'caption_translation' => 'Заявка на лизинг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1138,
            'language_id' => 1,
            'caption_id' => 726,
            'caption_translation' => 'Leasing Contracts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1139,
            'language_id' => 2,
            'caption_id' => 726,
            'caption_translation' => 'Договоры лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1140,
            'language_id' => 1,
            'caption_id' => 727,
            'caption_translation' => 'Insurance Policies',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1141,
            'language_id' => 2,
            'caption_id' => 727,
            'caption_translation' => 'Страхование',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1142,
            'language_id' => 1,
            'caption_id' => 728,
            'caption_translation' => 'MutualSettlements',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1143,
            'language_id' => 2,
            'caption_id' => 728,
            'caption_translation' => 'Взаиморасчеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1144,
            'language_id' => 1,
            'caption_id' => 729,
            'caption_translation' => 'Help',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1145,
            'language_id' => 2,
            'caption_id' => 729,
            'caption_translation' => 'Справка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1146,
            'language_id' => 1,
            'caption_id' => 730,
            'caption_translation' => 'Development',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1147,
            'language_id' => 2,
            'caption_id' => 730,
            'caption_translation' => 'Разработка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1148,
            'language_id' => 1,
            'caption_id' => 731,
            'caption_translation' => 'Queries',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1149,
            'language_id' => 2,
            'caption_id' => 731,
            'caption_translation' => 'Запросы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1150,
            'language_id' => 1,
            'caption_id' => 732,
            'caption_translation' => 'Query',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1151,
            'language_id' => 2,
            'caption_id' => 732,
            'caption_translation' => 'Запрос',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-15 17:00:00',
            'updated_at' => '2019-04-15 17:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1152,
            'language_id' => 1,
            'caption_id' => 733,
            'caption_translation' => 'Date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1153,
            'language_id' => 2,
            'caption_id' => 733,
            'caption_translation' => 'Дата',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1154,
            'language_id' => 1,
            'caption_id' => 734,
            'caption_translation' => 'Lease Start Date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1155,
            'language_id' => 2,
            'caption_id' => 734,
            'caption_translation' => 'Дата начала лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1156,
            'language_id' => 1,
            'caption_id' => 735,
            'caption_translation' => 'Sum',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1157,
            'language_id' => 2,
            'caption_id' => 735,
            'caption_translation' => 'Сумма',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1158,
            'language_id' => 1,
            'caption_id' => 736,
            'caption_translation' => 'Leasing Subjects',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1159,
            'language_id' => 2,
            'caption_id' => 736,
            'caption_translation' => 'Предметы лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1160,
            'language_id' => 1,
            'caption_id' => 737,
            'caption_translation' => 'Leasing Subject',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1161,
            'language_id' => 2,
            'caption_id' => 737,
            'caption_translation' => 'Предмет лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1162,
            'language_id' => 1,
            'caption_id' => 738,
            'caption_translation' => 'Brands',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1163,
            'language_id' => 2,
            'caption_id' => 738,
            'caption_translation' => 'Марки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1164,
            'language_id' => 1,
            'caption_id' => 739,
            'caption_translation' => 'Brand / Name of leased asset',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1165,
            'language_id' => 2,
            'caption_id' => 739,
            'caption_translation' => 'Марка / Наименование предмета лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1166,
            'language_id' => 1,
            'caption_id' => 740,
            'caption_translation' => 'Models',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1167,
            'language_id' => 2,
            'caption_id' => 740,
            'caption_translation' => 'Модели',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1168,
            'language_id' => 1,
            'caption_id' => 741,
            'caption_translation' => 'Model',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1169,
            'language_id' => 2,
            'caption_id' => 741,
            'caption_translation' => 'Модель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1170,
            'language_id' => 1,
            'caption_id' => 742,
            'caption_translation' => 'Produce Year',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1171,
            'language_id' => 2,
            'caption_id' => 742,
            'caption_translation' => 'Год выпуска',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1172,
            'language_id' => 1,
            'caption_id' => 743,
            'caption_translation' => 'Vendor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1173,
            'language_id' => 2,
            'caption_id' => 743,
            'caption_translation' => 'Продавец',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1174,
            'language_id' => 1,
            'caption_id' => 744,
            'caption_translation' => 'Insurance Option',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1175,
            'language_id' => 2,
            'caption_id' => 744,
            'caption_translation' => 'Вариант страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1176,
            'language_id' => 1,
            'caption_id' => 745,
            'caption_translation' => 'Franchise',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1177,
            'language_id' => 2,
            'caption_id' => 745,
            'caption_translation' => 'Франшиза',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1178,
            'language_id' => 1,
            'caption_id' => 746,
            'caption_translation' => 'ContractParameters',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1179,
            'language_id' => 2,
            'caption_id' => 746,
            'caption_translation' => 'Параметры договора',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1180,
            'language_id' => 1,
            'caption_id' => 747,
            'caption_translation' => 'Leasing product',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1181,
            'language_id' => 2,
            'caption_id' => 747,
            'caption_translation' => 'Лизинговый продукт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1182,
            'language_id' => 1,
            'caption_id' => 748,
            'caption_translation' => 'GetStateSubsidy',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1183,
            'language_id' => 2,
            'caption_id' => 748,
            'caption_translation' => 'Приобретается с гос.субсидией',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1184,
            'language_id' => 1,
            'caption_id' => 749,
            'caption_translation' => 'Cost of leased asset',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1185,
            'language_id' => 2,
            'caption_id' => 749,
            'caption_translation' => 'Стоимость предмета лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1186,
            'language_id' => 1,
            'caption_id' => 750,
            'caption_translation' => 'Advance Payment Percent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1187,
            'language_id' => 2,
            'caption_id' => 750,
            'caption_translation' => 'Авансовый платеж процент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1188,
            'language_id' => 1,
            'caption_id' => 751,
            'caption_translation' => 'Advance Payment Sum',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1189,
            'language_id' => 2,
            'caption_id' => 751,
            'caption_translation' => 'Авансовый платеж сумма',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1190,
            'language_id' => 1,
            'caption_id' => 752,
            'caption_translation' => 'Lease Agreement Term',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1191,
            'language_id' => 2,
            'caption_id' => 752,
            'caption_translation' => 'Срок договора лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1192,
            'language_id' => 1,
            'caption_id' => 753,
            'caption_translation' => 'Fill Out Request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1193,
            'language_id' => 2,
            'caption_id' => 753,
            'caption_translation' => 'Заполнить заявку',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1194,
            'language_id' => 1,
            'caption_id' => 754,
            'caption_translation' => 'Payment Schedule',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1195,
            'language_id' => 2,
            'caption_id' => 754,
            'caption_translation' => 'График платежей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1196,
            'language_id' => 1,
            'caption_id' => 755,
            'caption_translation' => 'Advance Payment',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1197,
            'language_id' => 2,
            'caption_id' => 755,
            'caption_translation' => 'Авансовый платеж',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1198,
            'language_id' => 1,
            'caption_id' => 756,
            'caption_translation' => 'Lease Payment',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1199,
            'language_id' => 2,
            'caption_id' => 756,
            'caption_translation' => 'Лизинговый платеж',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1200,
            'language_id' => 1,
            'caption_id' => 757,
            'caption_translation' => 'Client Short Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1201,
            'language_id' => 2,
            'caption_id' => 757,
            'caption_translation' => 'Краткое имя клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1202,
            'language_id' => 1,
            'caption_id' => 758,
            'caption_translation' => 'Client Full Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1203,
            'language_id' => 2,
            'caption_id' => 758,
            'caption_translation' => 'Полное имя клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-18 12:00:00',
            'updated_at' => '2019-04-18 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1204,
            'language_id' => 1,
            'caption_id' => 759,
            'caption_translation' => 'Consumer Name Default',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 16:00:00',
            'updated_at' => '2019-04-22 16:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1205,
            'language_id' => 2,
            'caption_id' => 759,
            'caption_translation' => 'Имя пользователя по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-22 16:00:00',
            'updated_at' => '2019-04-22 16:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1206,
            'language_id' => 1,
            'caption_id' => 760,
            'caption_translation' => 'Contract Status',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1207,
            'language_id' => 2,
            'caption_id' => 760,
            'caption_translation' => 'Статус договора',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1208,
            'language_id' => 1,
            'caption_id' => 761,
            'caption_translation' => 'Payment VAT',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1209,
            'language_id' => 2,
            'caption_id' => 761,
            'caption_translation' => 'Платеж с НДС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1210,
            'language_id' => 1,
            'caption_id' => 762,
            'caption_translation' => 'Payment Time-Limit',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1211,
            'language_id' => 2,
            'caption_id' => 762,
            'caption_translation' => 'Крайний срок платежа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1212,
            'language_id' => 1,
            'caption_id' => 763,
            'caption_translation' => 'Payment Status',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1213,
            'language_id' => 2,
            'caption_id' => 763,
            'caption_translation' => 'Статус платежа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1214,
            'language_id' => 1,
            'caption_id' => 764,
            'caption_translation' => 'Payment Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1215,
            'language_id' => 2,
            'caption_id' => 764,
            'caption_translation' => 'Номер платежа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1216,
            'language_id' => 1,
            'caption_id' => 765,
            'caption_translation' => 'Payment Balance',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1217,
            'language_id' => 2,
            'caption_id' => 765,
            'caption_translation' => 'Остаток платежей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1218,
            'language_id' => 1,
            'caption_id' => 766,
            'caption_translation' => 'Redemption Payment',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1219,
            'language_id' => 2,
            'caption_id' => 766,
            'caption_translation' => 'Выкупной платеж',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1220,
            'language_id' => 1,
            'caption_id' => 767,
            'caption_translation' => 'Payment Fact',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1221,
            'language_id' => 2,
            'caption_id' => 767,
            'caption_translation' => 'Оплата факт',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1222,
            'language_id' => 1,
            'caption_id' => 768,
            'caption_translation' => 'Manager',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1223,
            'language_id' => 2,
            'caption_id' => 768,
            'caption_translation' => 'Менеджер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-25 15:00:00',
            'updated_at' => '2019-04-25 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1224,
            'language_id' => 1,
            'caption_id' => 769,
            'caption_translation' => 'Empty',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1225,
            'language_id' => 2,
            'caption_id' => 769,
            'caption_translation' => 'Пусто',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1226,
            'language_id' => 1,
            'caption_id' => 770,
            'caption_translation' => 'Contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1227,
            'language_id' => 2,
            'caption_id' => 770,
            'caption_translation' => 'Договор',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1228,
            'language_id' => 1,
            'caption_id' => 771,
            'caption_translation' => 'FIO',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1229,
            'language_id' => 2,
            'caption_id' => 771,
            'caption_translation' => 'ФИО',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1230,
            'language_id' => 1,
            'caption_id' => 772,
            'caption_translation' => 'Phone',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1231,
            'language_id' => 2,
            'caption_id' => 772,
            'caption_translation' => 'Телефон',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1232,
            'language_id' => 1,
            'caption_id' => 773,
            'caption_translation' => 'Office',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1233,
            'language_id' => 2,
            'caption_id' => 773,
            'caption_translation' => 'Офис',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 15:00:00',
            'updated_at' => '2019-05-16 15:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1234,
            'language_id' => 1,
            'caption_id' => 774,
            'caption_translation' => 'Undeletion mark ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 12:00:00',
            'updated_at' => '2019-05-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1235,
            'language_id' => 2,
            'caption_id' => 774,
            'caption_translation' => 'Пометка на удаление (снять)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 12:00:00',
            'updated_at' => '2019-05-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1236,
            'language_id' => 1,
            'caption_id' => 775,
            'caption_translation' => 'UnActual',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 12:00:00',
            'updated_at' => '2019-05-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1237,
            'language_id' => 2,
            'caption_id' => 775,
            'caption_translation' => 'Актуальность (снять)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-17 12:00:00',
            'updated_at' => '2019-05-17 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1238,
            'language_id' => 1,
            'caption_id' => 776,
            'caption_translation' => 'Payment',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1239,
            'language_id' => 2,
            'caption_id' => 776,
            'caption_translation' => 'Платеж',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1240,
            'language_id' => 1,
            'caption_id' => 777,
            'caption_translation' => 'Planned',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1241,
            'language_id' => 2,
            'caption_id' => 777,
            'caption_translation' => 'Планируемый',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1242,
            'language_id' => 1,
            'caption_id' => 778,
            'caption_translation' => 'Paid',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1243,
            'language_id' => 2,
            'caption_id' => 778,
            'caption_translation' => 'Оплаченный',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1244,
            'language_id' => 1,
            'caption_id' => 779,
            'caption_translation' => 'Overdue',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1245,
            'language_id' => 2,
            'caption_id' => 779,
            'caption_translation' => 'Просроченный',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 12:00:00',
            'updated_at' => '2019-05-20 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1246,
            'language_id' => 1,
            'caption_id' => 780,
            'caption_translation' => 'Acts of mutual settlements under leasing contracts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 12:00:00',
            'updated_at' => '2019-06-04 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1247,
            'language_id' => 2,
            'caption_id' => 780,
            'caption_translation' => 'Акты взаиморасчётов по договорам лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 12:00:01',
            'updated_at' => '2019-06-04 12:00:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1248,
            'language_id' => 1,
            'caption_id' => 781,
            'caption_translation' => 'The act of mutual settlements under the lease agreement',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 12:00:02',
            'updated_at' => '2019-06-04 12:00:02',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1249,
            'language_id' => 2,
            'caption_id' => 781,
            'caption_translation' => ' Акт взаиморасчётов по договору лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 12:00:03',
            'updated_at' => '2019-06-04 12:00:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1250,
            'language_id' => 1,
            'caption_id' => 782,
            'caption_translation' => 'Insurance contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1251,
            'language_id' => 2,
            'caption_id' => 782,
            'caption_translation' => 'Договор страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1252,
            'language_id' => 1,
            'caption_id' => 783,
            'caption_translation' => 'Date number of the insurance contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1253,
            'language_id' => 2,
            'caption_id' => 783,
            'caption_translation' => 'Дата, номер договора страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1254,
            'language_id' => 1,
            'caption_id' => 784,
            'caption_translation' => 'End date of insurance',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1255,
            'language_id' => 2,
            'caption_id' => 784,
            'caption_translation' => 'Дата окончания страховки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1256,
            'language_id' => 1,
            'caption_id' => 785,
            'caption_translation' => 'Insurance premium',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1257,
            'language_id' => 2,
            'caption_id' => 785,
            'caption_translation' => 'Страховая премия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1258,
            'language_id' => 1,
            'caption_id' => 786,
            'caption_translation' => 'Payment due date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1259,
            'language_id' => 2,
            'caption_id' => 786,
            'caption_translation' => 'Срок оплаты очередного взноса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1260,
            'language_id' => 1,
            'caption_id' => 787,
            'caption_translation' => 'Insured',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1261,
            'language_id' => 2,
            'caption_id' => 787,
            'caption_translation' => 'Страхователь',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1262,
            'language_id' => 1,
            'caption_id' => 788,
            'caption_translation' => 'Insurance company',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1263,
            'language_id' => 2,
            'caption_id' => 788,
            'caption_translation' => 'Страховая компания',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1264,
            'language_id' => 1,
            'caption_id' => 789,
            'caption_translation' => 'Leasing contract status',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1265,
            'language_id' => 2,
            'caption_id' => 789,
            'caption_translation' => 'Статус договора лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1266,
            'language_id' => 1,
            'caption_id' => 790,
            'caption_translation' => 'Insurance contracts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1267,
            'language_id' => 2,
            'caption_id' => 790,
            'caption_translation' => 'Договоры страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-05 12:00:00',
            'updated_at' => '2019-06-05 12:00:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1268,
            'language_id' => 1,
            'caption_id' => 791,
            'caption_translation' => 'Inform the lessor of the insured event',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1269,
            'language_id' => 2,
            'caption_id' => 791,
            'caption_translation' => 'Проинформировать лизингодателя о страховом случае',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1270,
            'language_id' => 1,
            'caption_id' => 792,
            'caption_translation' => 'What to do in case of an accident?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1271,
            'language_id' => 2,
            'caption_id' => 792,
            'caption_translation' => 'Что делать при ДТП?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1272,
            'language_id' => 1,
            'caption_id' => 793,
            'caption_translation' => 'What to do when stealing?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1273,
            'language_id' => 2,
            'caption_id' => 793,
            'caption_translation' => 'Что делать при угоне/хищении?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 15:30:00',
            'updated_at' => '2019-06-06 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1274,
            'language_id' => 1,
            'caption_id' => 794,
            'caption_translation' => 'Contractor Request Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1275,
            'language_id' => 2,
            'caption_id' => 794,
            'caption_translation' => 'Типы запросов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1276,
            'language_id' => 1,
            'caption_id' => 795,
            'caption_translation' => 'Contractor Request Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1277,
            'language_id' => 2,
            'caption_id' => 795,
            'caption_translation' => 'Тип запросов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1278,
            'language_id' => 1,
            'caption_id' => 796,
            'caption_translation' => 'Contractor Requests',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1279,
            'language_id' => 2,
            'caption_id' => 796,
            'caption_translation' => 'Запросы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1280,
            'language_id' => 1,
            'caption_id' => 797,
            'caption_translation' => 'Contractor Request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1281,
            'language_id' => 2,
            'caption_id' => 797,
            'caption_translation' => 'Запрос',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1282,
            'language_id' => 1,
            'caption_id' => 798,
            'caption_translation' => 'Administrator',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1283,
            'language_id' => 2,
            'caption_id' => 798,
            'caption_translation' => 'Администратор',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1284,
            'language_id' => 1,
            'caption_id' => 799,
            'caption_translation' => 'Administrators',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1285,
            'language_id' => 2,
            'caption_id' => 799,
            'caption_translation' => 'Администраторы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 15:30:00',
            'updated_at' => '2019-06-07 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1286,
            'language_id' => 1,
            'caption_id' => 800,
            'caption_translation' => 'Notification',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1287,
            'language_id' => 2,
            'caption_id' => 800,
            'caption_translation' => 'Уведомление',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1288,
            'language_id' => 1,
            'caption_id' => 801,
            'caption_translation' => 'Headline',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1289,
            'language_id' => 2,
            'caption_id' => 801,
            'caption_translation' => 'Заголовок',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1290,
            'language_id' => 1,
            'caption_id' => 802,
            'caption_translation' => 'Text',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1291,
            'language_id' => 2,
            'caption_id' => 802,
            'caption_translation' => 'Текст',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-10 15:30:00',
            'updated_at' => '2019-06-10 15:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1292,
            'language_id' => 1,
            'caption_id' => 803,
            'caption_translation' => 'Download',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1293,
            'language_id' => 2,
            'caption_id' => 803,
            'caption_translation' => 'Скачать',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1294,
            'language_id' => 1,
            'caption_id' => 804,
            'caption_translation' => 'Upload',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1295,
            'language_id' => 2,
            'caption_id' => 804,
            'caption_translation' => 'Загрузить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-13 12:30:00',
            'updated_at' => '2019-06-13 12:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1296,
            'language_id' => 1,
            'caption_id' => 805,
            'caption_translation' => 'Action logs',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:00',
            'updated_at' => '2019-06-18 12:30:00',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1297,
            'language_id' => 2,
            'caption_id' => 805,
            'caption_translation' => 'Логи действий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:01',
            'updated_at' => '2019-06-18 12:30:01',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1298,
            'language_id' => 1,
            'caption_id' => 806,
            'caption_translation' => 'Controller',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:02',
            'updated_at' => '2019-06-18 12:30:02',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1299,
            'language_id' => 2,
            'caption_id' => 806,
            'caption_translation' => 'Контроллер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:03',
            'updated_at' => '2019-06-18 12:30:03',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1300,
            'language_id' => 1,
            'caption_id' => 807,
            'caption_translation' => 'Error',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:04',
            'updated_at' => '2019-06-18 12:30:04',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1301,
            'language_id' => 2,
            'caption_id' => 807,
            'caption_translation' => 'Ошибка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:05',
            'updated_at' => '2019-06-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1302,
            'language_id' => 1,
            'caption_id' => 808,
            'caption_translation' => 'Error code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:06',
            'updated_at' => '2019-06-18 12:30:06',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1303,
            'language_id' => 2,
            'caption_id' => 808,
            'caption_translation' => 'Код ошибки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:07',
            'updated_at' => '2019-06-18 12:30:07',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1304,
            'language_id' => 1,
            'caption_id' => 809,
            'caption_translation' => 'Message',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:08',
            'updated_at' => '2019-06-18 12:30:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1305,
            'language_id' => 2,
            'caption_id' => 809,
            'caption_translation' => 'Сообщение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:09',
            'updated_at' => '2019-06-18 12:30:09',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1306,
            'language_id' => 1,
            'caption_id' => 810,
            'caption_translation' => 'Action log',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:10',
            'updated_at' => '2019-06-18 12:30:10',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1307,
            'language_id' => 2,
            'caption_id' => 810,
            'caption_translation' => 'Лог действия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:30:11',
            'updated_at' => '2019-06-18 12:30:11',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1308,
            'language_id' => 1,
            'caption_id' => 811,
            'caption_translation' => 'AddSection',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1309,
            'language_id' => 2,
            'caption_id' => 811,
            'caption_translation' => 'Добавить раздел',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1310,
            'language_id' => 1,
            'caption_id' => 812,
            'caption_translation' => 'AddArticle',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1311,
            'language_id' => 2,
            'caption_id' => 812,
            'caption_translation' => 'Добавить статью',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1312,
            'language_id' => 1,
            'caption_id' => 813,
            'caption_translation' => 'ExpandAll',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1313,
            'language_id' => 2,
            'caption_id' => 813,
            'caption_translation' => 'Развернуть все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1314,
            'language_id' => 1,
            'caption_id' => 814,
            'caption_translation' => 'CollapseAll',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1315,
            'language_id' => 2,
            'caption_id' => 814,
            'caption_translation' => 'Свернуть все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1316,
            'language_id' => 1,
            'caption_id' => 815,
            'caption_translation' => 'Edit',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1317,
            'language_id' => 2,
            'caption_id' => 815,
            'caption_translation' => 'Редактировать',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:30:05',
            'updated_at' => '2019-06-19 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1318,
            'language_id' => 1,
            'caption_id' => 816,
            'caption_translation' => 'Section',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:30:05',
            'updated_at' => '2019-06-20 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1319,
            'language_id' => 2,
            'caption_id' => 816,
            'caption_translation' => 'Раздел',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:30:05',
            'updated_at' => '2019-06-20 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1320,
            'language_id' => 1,
            'caption_id' => 817,
            'caption_translation' => 'Article',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:30:05',
            'updated_at' => '2019-06-20 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1321,
            'language_id' => 2,
            'caption_id' => 817,
            'caption_translation' => 'Статья',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:30:05',
            'updated_at' => '2019-06-20 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1322,
            'language_id' => 1,
            'caption_id' => 818,
            'caption_translation' => 'Reconciliation Records',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1323,
            'language_id' => 2,
            'caption_id' => 818,
            'caption_translation' => 'Акты сверки взаиморасчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1324,
            'language_id' => 1,
            'caption_id' => 819,
            'caption_translation' => 'Reconciliation Record',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1325,
            'language_id' => 2,
            'caption_id' => 819,
            'caption_translation' => 'Акт сверки взаиморасчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1326,
            'language_id' => 1,
            'caption_id' => 820,
            'caption_translation' => 'Acceptance Acts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1327,
            'language_id' => 2,
            'caption_id' => 820,
            'caption_translation' => 'Акты выполненных работ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1328,
            'language_id' => 1,
            'caption_id' => 821,
            'caption_translation' => 'Acceptance Act',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1329,
            'language_id' => 2,
            'caption_id' => 821,
            'caption_translation' => 'Акт выполненных работ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1330,
            'language_id' => 1,
            'caption_id' => 822,
            'caption_translation' => 'Leasing Payment Accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1331,
            'language_id' => 2,
            'caption_id' => 822,
            'caption_translation' => 'Счета на оплату лизинговых платежей 
',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1332,
            'language_id' => 1,
            'caption_id' => 823,
            'caption_translation' => 'Leasing Payment Account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1333,
            'language_id' => 2,
            'caption_id' => 823,
            'caption_translation' => 'Счет на оплату лизинговых платежей
',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1334,
            'language_id' => 1,
            'caption_id' => 824,
            'caption_translation' => 'Receive Documents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1335,
            'language_id' => 2,
            'caption_id' => 824,
            'caption_translation' => 'Получить документы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1336,
            'language_id' => 1,
            'caption_id' => 825,
            'caption_translation' => 'Receive Document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1337,
            'language_id' => 2,
            'caption_id' => 825,
            'caption_translation' => 'Получить документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1338,
            'language_id' => 1,
            'caption_id' => 826,
            'caption_translation' => 'Period From',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1339,
            'language_id' => 2,
            'caption_id' => 826,
            'caption_translation' => 'Период с',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1340,
            'language_id' => 1,
            'caption_id' => 827,
            'caption_translation' => 'Period By',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1341,
            'language_id' => 2,
            'caption_id' => 827,
            'caption_translation' => 'Период по',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1342,
            'language_id' => 1,
            'caption_id' => 828,
            'caption_translation' => 'Printed Form',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1343,
            'language_id' => 2,
            'caption_id' => 828,
            'caption_translation' => 'Печатная форма',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1344,
            'language_id' => 1,
            'caption_id' => 829,
            'caption_translation' => 'Request For Mutual Acts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1345,
            'language_id' => 2,
            'caption_id' => 829,
            'caption_translation' => 'Запрос на получение актов взаиморасчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1346,
            'language_id' => 1,
            'caption_id' => 830,
            'caption_translation' => 'Request For Mutual Act',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1347,
            'language_id' => 2,
            'caption_id' => 830,
            'caption_translation' => 'Запрос на получение акта взаиморасчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1348,
            'language_id' => 1,
            'caption_id' => 831,
            'caption_translation' => 'Period',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1349,
            'language_id' => 2,
            'caption_id' => 831,
            'caption_translation' => 'Период ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1350,
            'language_id' => 1,
            'caption_id' => 832,
            'caption_translation' => 'From',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1351,
            'language_id' => 2,
            'caption_id' => 832,
            'caption_translation' => 'с',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1352,
            'language_id' => 1,
            'caption_id' => 833,
            'caption_translation' => 'By',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1353,
            'language_id' => 2,
            'caption_id' => 833,
            'caption_translation' => 'по',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1354,
            'language_id' => 1,
            'caption_id' => 834,
            'caption_translation' => 'Request Parameters',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1355,
            'language_id' => 2,
            'caption_id' => 834,
            'caption_translation' => 'Параметры запроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1356,
            'language_id' => 1,
            'caption_id' => 835,
            'caption_translation' => 'Request Parameter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1357,
            'language_id' => 2,
            'caption_id' => 835,
            'caption_translation' => 'Параметр запроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1358,
            'language_id' => 1,
            'caption_id' => 836,
            'caption_translation' => 'Request Acceptance Acts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1359,
            'language_id' => 2,
            'caption_id' => 836,
            'caption_translation' => 'Запрос на получение актов выполненных работ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1360,
            'language_id' => 1,
            'caption_id' => 837,
            'caption_translation' => 'Request Acceptance Acts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1361,
            'language_id' => 2,
            'caption_id' => 837,
            'caption_translation' => 'Запрос на получение акта выполненных работ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1362,
            'language_id' => 1,
            'caption_id' => 838,
            'caption_translation' => 'Request Leasing Payment Accounts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1363,
            'language_id' => 2,
            'caption_id' => 838,
            'caption_translation' => 'Запрос на получение счетов на оплату лизинговых платежей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1364,
            'language_id' => 1,
            'caption_id' => 839,
            'caption_translation' => 'Request Leasing Payment Account',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1365,
            'language_id' => 2,
            'caption_id' => 839,
            'caption_translation' => 'Запрос на получение счета на оплату лизинговых платежей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1366,
            'language_id' => 1,
            'caption_id' => 840,
            'caption_translation' => 'Over Entire Period',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1367,
            'language_id' => 2,
            'caption_id' => 840,
            'caption_translation' => 'За весь период',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-08 12:30:05',
            'updated_at' => '2019-07-08 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1368,
            'language_id' => 1,
            'caption_id' => 841,
            'caption_translation' => 'Enter Period',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-09 12:30:05',
            'updated_at' => '2019-07-09 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1369,
            'language_id' => 2,
            'caption_id' => 841,
            'caption_translation' => 'Введите период',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-09 12:30:05',
            'updated_at' => '2019-07-09 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1370,
            'language_id' => 1,
            'caption_id' => 842,
            'caption_translation' => 'AddFiles',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1371,
            'language_id' => 2,
            'caption_id' => 842,
            'caption_translation' => 'Добавить файлы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1372,
            'language_id' => 1,
            'caption_id' => 843,
            'caption_translation' => 'AddFile',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1373,
            'language_id' => 2,
            'caption_id' => 843,
            'caption_translation' => 'Добавить файл',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1374,
            'language_id' => 1,
            'caption_id' => 844,
            'caption_translation' => 'Save',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1375,
            'language_id' => 2,
            'caption_id' => 844,
            'caption_translation' => 'Сохранить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-18 12:30:05',
            'updated_at' => '2019-07-18 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1376,
            'language_id' => 1,
            'caption_id' => 845,
            'caption_translation' => 'Signal',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-30 12:30:05',
            'updated_at' => '2019-07-30 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1377,
            'language_id' => 2,
            'caption_id' => 845,
            'caption_translation' => 'Сигнал в обработку',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-30 12:30:05',
            'updated_at' => '2019-07-30 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1378,
            'language_id' => 1,
            'caption_id' => 846,
            'caption_translation' => 'Done',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-30 12:30:05',
            'updated_at' => '2019-07-30 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1379,
            'language_id' => 2,
            'caption_id' => 846,
            'caption_translation' => 'Выполнен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-30 12:30:05',
            'updated_at' => '2019-07-30 12:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1380,
            'language_id' => 1,
            'caption_id' => 847,
            'caption_translation' => 'Record Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1381,
            'language_id' => 2,
            'caption_id' => 847,
            'caption_translation' => 'Номер записи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1382,
            'language_id' => 1,
            'caption_id' => 848,
            'caption_translation' => 'Record Numbers',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1383,
            'language_id' => 2,
            'caption_id' => 848,
            'caption_translation' => 'Номера записей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1384,
            'language_id' => 1,
            'caption_id' => 849,
            'caption_translation' => 'Add New Caption',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1385,
            'language_id' => 2,
            'caption_id' => 849,
            'caption_translation' => 'Добавить новую надпись',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1386,
            'language_id' => 1,
            'caption_id' => 850,
            'caption_translation' => 'Add New Captions ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1387,
            'language_id' => 2,
            'caption_id' => 850,
            'caption_translation' => 'Добавить новые надписи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1388,
            'language_id' => 1,
            'caption_id' => 851,
            'caption_translation' => 'Add New Translations Caption',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1389,
            'language_id' => 2,
            'caption_id' => 851,
            'caption_translation' => 'Добавить новый перевод надписи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1390,
            'language_id' => 1,
            'caption_id' => 852,
            'caption_translation' => 'Add New Translations Captions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1391,
            'language_id' => 2,
            'caption_id' => 852,
            'caption_translation' => 'Добавить новый перевод надписей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-31 16:30:05',
            'updated_at' => '2019-07-31 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1392,
            'language_id' => 1,
            'caption_id' => 853,
            'caption_translation' => 'Attach scanned copies of required documents according to the list',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1393,
            'language_id' => 2,
            'caption_id' => 853,
            'caption_translation' => 'Прикрепите скан-копии обязательных документов согласно перечню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1394,
            'language_id' => 1,
            'caption_id' => 854,
            'caption_translation' => 'Send request for review',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1395,
            'language_id' => 2,
            'caption_id' => 854,
            'caption_translation' => 'Отправить заявку на рассмотрение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1396,
            'language_id' => 1,
            'caption_id' => 855,
            'caption_translation' => 'Close a step',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1397,
            'language_id' => 2,
            'caption_id' => 855,
            'caption_translation' => 'Закрыть шаг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1398,
            'language_id' => 1,
            'caption_id' => 856,
            'caption_translation' => 'Step',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1399,
            'language_id' => 2,
            'caption_id' => 856,
            'caption_translation' => 'Шаг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1400,
            'language_id' => 1,
            'caption_id' => 857,
            'caption_translation' => 'Further',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1401,
            'language_id' => 2,
            'caption_id' => 857,
            'caption_translation' => 'Далее',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-02 16:30:05',
            'updated_at' => '2019-08-02 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1402,
            'language_id' => 1,
            'caption_id' => 858,
            'caption_translation' => 'Controllers',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1403,
            'language_id' => 2,
            'caption_id' => 858,
            'caption_translation' => 'Контроллеры',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1404,
            'language_id' => 1,
            'caption_id' => 859,
            'caption_translation' => 'System Parameter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1405,
            'language_id' => 2,
            'caption_id' => 859,
            'caption_translation' => 'Системный параметр',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1406,
            'language_id' => 1,
            'caption_id' => 860,
            'caption_translation' => 'System Parameters Values',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1407,
            'language_id' => 2,
            'caption_id' => 860,
            'caption_translation' => 'Значения системных параметров',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1408,
            'language_id' => 1,
            'caption_id' => 861,
            'caption_translation' => 'System Parameters Value',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1409,
            'language_id' => 2,
            'caption_id' => 861,
            'caption_translation' => 'Значение системных параметров',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1410,
            'language_id' => 1,
            'caption_id' => 862,
            'caption_translation' => 'Model Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1411,
            'language_id' => 2,
            'caption_id' => 862,
            'caption_translation' => 'Номер модели',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1412,
            'language_id' => 1,
            'caption_id' => 863,
            'caption_translation' => 'Model Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1413,
            'language_id' => 2,
            'caption_id' => 863,
            'caption_translation' => 'Код модели',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1414,
            'language_id' => 1,
            'caption_id' => 864,
            'caption_translation' => 'Model Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1415,
            'language_id' => 2,
            'caption_id' => 864,
            'caption_translation' => 'Наименование модели',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1416,
            'language_id' => 1,
            'caption_id' => 865,
            'caption_translation' => 'Model Folder',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1417,
            'language_id' => 2,
            'caption_id' => 865,
            'caption_translation' => 'Путь модели',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1418,
            'language_id' => 1,
            'caption_id' => 866,
            'caption_translation' => 'Attached Files',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1419,
            'language_id' => 2,
            'caption_id' => 866,
            'caption_translation' => 'Прикрепленные файлы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1420,
            'language_id' => 1,
            'caption_id' => 867,
            'caption_translation' => 'Output Template',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1421,
            'language_id' => 2,
            'caption_id' => 867,
            'caption_translation' => 'Шаблон вывода',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1422,
            'language_id' => 1,
            'caption_id' => 868,
            'caption_translation' => 'Controller Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1423,
            'language_id' => 2,
            'caption_id' => 868,
            'caption_translation' => 'Код контроллера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1424,
            'language_id' => 1,
            'caption_id' => 869,
            'caption_translation' => 'Controller Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1425,
            'language_id' => 2,
            'caption_id' => 869,
            'caption_translation' => 'Наименование контролера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1426,
            'language_id' => 1,
            'caption_id' => 870,
            'caption_translation' => 'Controller Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1427,
            'language_id' => 2,
            'caption_id' => 870,
            'caption_translation' => 'Номер контролера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1428,
            'language_id' => 1,
            'caption_id' => 871,
            'caption_translation' => 'Controller Alias',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1429,
            'language_id' => 2,
            'caption_id' => 871,
            'caption_translation' => 'Представление контролера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1430,
            'language_id' => 1,
            'caption_id' => 872,
            'caption_translation' => 'Server port',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1431,
            'language_id' => 2,
            'caption_id' => 872,
            'caption_translation' => 'Порт сервера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1432,
            'language_id' => 1,
            'caption_id' => 873,
            'caption_translation' => 'Menu Items',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1433,
            'language_id' => 2,
            'caption_id' => 873,
            'caption_translation' => 'Пункты меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1434,
            'language_id' => 1,
            'caption_id' => 874,
            'caption_translation' => 'Menu Item',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1435,
            'language_id' => 2,
            'caption_id' => 874,
            'caption_translation' => 'Пункт меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1436,
            'language_id' => 1,
            'caption_id' => 875,
            'caption_translation' => 'MenuItem Access Roles',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1437,
            'language_id' => 2,
            'caption_id' => 875,
            'caption_translation' => 'Доступы к пунктам меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1438,
            'language_id' => 1,
            'caption_id' => 876,
            'caption_translation' => 'MenuItem Access Role',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1439,
            'language_id' => 2,
            'caption_id' => 876,
            'caption_translation' => 'Доступ к пунктам меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1440,
            'language_id' => 1,
            'caption_id' => 877,
            'caption_translation' => 'Invoices',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1441,
            'language_id' => 2,
            'caption_id' => 877,
            'caption_translation' => 'Счета-фактуры',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1442,
            'language_id' => 1,
            'caption_id' => 878,
            'caption_translation' => 'Invoice',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1443,
            'language_id' => 2,
            'caption_id' => 878,
            'caption_translation' => 'Счет-фактура',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1444,
            'language_id' => 1,
            'caption_id' => 879,
            'caption_translation' => 'Menu Item Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1445,
            'language_id' => 2,
            'caption_id' => 879,
            'caption_translation' => 'Код пункта меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1446,
            'language_id' => 1,
            'caption_id' => 880,
            'caption_translation' => 'Menu Item Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1447,
            'language_id' => 2,
            'caption_id' => 880,
            'caption_translation' => 'Наименование пункта меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1448,
            'language_id' => 1,
            'caption_id' => 881,
            'caption_translation' => 'FE Route ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1449,
            'language_id' => 2,
            'caption_id' => 881,
            'caption_translation' => 'FE Роут',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1450,
            'language_id' => 1,
            'caption_id' => 882,
            'caption_translation' => 'Image Id',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1451,
            'language_id' => 2,
            'caption_id' => 882,
            'caption_translation' => 'ID Картинки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1452,
            'language_id' => 1,
            'caption_id' => 883,
            'caption_translation' => 'Menu Item Parent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1453,
            'language_id' => 2,
            'caption_id' => 883,
            'caption_translation' => 'Ссылка на пункт родитель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1454,
            'language_id' => 1,
            'caption_id' => 884,
            'caption_translation' => 'Output Order',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1455,
            'language_id' => 2,
            'caption_id' => 884,
            'caption_translation' => 'Порядок вывода',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1456,
            'language_id' => 1,
            'caption_id' => 885,
            'caption_translation' => 'Group',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1457,
            'language_id' => 2,
            'caption_id' => 885,
            'caption_translation' => 'Группа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:30:05',
            'updated_at' => '2019-08-13 16:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1458,
            'language_id' => 1,
            'caption_id' => 886,
            'caption_translation' => 'BeRoutes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1459,
            'language_id' => 2,
            'caption_id' => 886,
            'caption_translation' => 'Back End Роуты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1460,
            'language_id' => 1,
            'caption_id' => 887,
            'caption_translation' => 'FeComponents',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1461,
            'language_id' => 2,
            'caption_id' => 887,
            'caption_translation' => 'Front End Компоненты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1462,
            'language_id' => 1,
            'caption_id' => 888,
            'caption_translation' => 'FeUrls',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1463,
            'language_id' => 2,
            'caption_id' => 888,
            'caption_translation' => 'Front End Ссылки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1464,
            'language_id' => 1,
            'caption_id' => 889,
            'caption_translation' => 'FeRoutes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1465,
            'language_id' => 2,
            'caption_id' => 889,
            'caption_translation' => 'Front End Роуты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1466,
            'language_id' => 1,
            'caption_id' => 890,
            'caption_translation' => 'FeRoute Urls',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1467,
            'language_id' => 2,
            'caption_id' => 890,
            'caption_translation' => 'Front End Роут Urls',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1468,
            'language_id' => 1,
            'caption_id' => 891,
            'caption_translation' => 'FeRoute Steps',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1469,
            'language_id' => 2,
            'caption_id' => 891,
            'caption_translation' => 'Front End Шаги',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1470,
            'language_id' => 1,
            'caption_id' => 892,
            'caption_translation' => 'FeRoute Objects',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1471,
            'language_id' => 2,
            'caption_id' => 892,
            'caption_translation' => 'Front End Объекты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1472,
            'language_id' => 1,
            'caption_id' => 893,
            'caption_translation' => 'FeRoute Step Objects',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1473,
            'language_id' => 2,
            'caption_id' => 893,
            'caption_translation' => 'Front End Объекты в шагах',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1474,
            'language_id' => 1,
            'caption_id' => 894,
            'caption_translation' => 'Exchange',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1475,
            'language_id' => 2,
            'caption_id' => 894,
            'caption_translation' => 'Обмен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1476,
            'language_id' => 1,
            'caption_id' => 895,
            'caption_translation' => 'Exchange Log',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1477,
            'language_id' => 2,
            'caption_id' => 895,
            'caption_translation' => 'Обмен логи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1478,
            'language_id' => 1,
            'caption_id' => 896,
            'caption_translation' => 'Exchange Total',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1479,
            'language_id' => 2,
            'caption_id' => 896,
            'caption_translation' => 'Обмен итого',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1480,
            'language_id' => 1,
            'caption_id' => 897,
            'caption_translation' => 'Object',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1481,
            'language_id' => 2,
            'caption_id' => 897,
            'caption_translation' => 'Объект',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1482,
            'language_id' => 1,
            'caption_id' => 898,
            'caption_translation' => 'Objects',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1483,
            'language_id' => 2,
            'caption_id' => 898,
            'caption_translation' => 'Объекты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1484,
            'language_id' => 1,
            'caption_id' => 899,
            'caption_translation' => 'Amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1485,
            'language_id' => 2,
            'caption_id' => 899,
            'caption_translation' => 'Количество',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1486,
            'language_id' => 1,
            'caption_id' => 900,
            'caption_translation' => 'Duration',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1487,
            'language_id' => 2,
            'caption_id' => 900,
            'caption_translation' => 'Длительность',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-16 11:30:05',
            'updated_at' => '2019-08-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1488,
            'language_id' => 1,
            'caption_id' => 901,
            'caption_translation' => 'Delete All',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1489,
            'language_id' => 2,
            'caption_id' => 901,
            'caption_translation' => 'Удалить все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1490,
            'language_id' => 1,
            'caption_id' => 902,
            'caption_translation' => 'Password Set',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1491,
            'language_id' => 2,
            'caption_id' => 902,
            'caption_translation' => 'Пароль установлен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1492,
            'language_id' => 1,
            'caption_id' => 903,
            'caption_translation' => 'Setting a new password is prohibited',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1493,
            'language_id' => 2,
            'caption_id' => 903,
            'caption_translation' => 'Установка нового пароля запрещена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1494,
            'language_id' => 1,
            'caption_id' => 904,
            'caption_translation' => 'BE Route ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1495,
            'language_id' => 2,
            'caption_id' => 904,
            'caption_translation' => 'BE Роуты ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1496,
            'language_id' => 1,
            'caption_id' => 905,
            'caption_translation' => 'FeComponent ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1497,
            'language_id' => 2,
            'caption_id' => 905,
            'caption_translation' => 'FE Компоненты ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1498,
            'language_id' => 1,
            'caption_id' => 906,
            'caption_translation' => 'FE Url',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1499,
            'language_id' => 2,
            'caption_id' => 906,
            'caption_translation' => 'FE Url',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1500,
            'language_id' => 1,
            'caption_id' => 907,
            'caption_translation' => 'Internal Property Number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1501,
            'language_id' => 2,
            'caption_id' => 907,
            'caption_translation' => 'Номер внутреннего объекта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1502,
            'language_id' => 1,
            'caption_id' => 908,
            'caption_translation' => 'FeRoute Url ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1503,
            'language_id' => 2,
            'caption_id' => 908,
            'caption_translation' => 'FE Параметр Урла',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1504,
            'language_id' => 1,
            'caption_id' => 909,
            'caption_translation' => 'FeRoute Step',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1505,
            'language_id' => 2,
            'caption_id' => 909,
            'caption_translation' => 'FE Шаг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1506,
            'language_id' => 1,
            'caption_id' => 910,
            'caption_translation' => 'Fe Route Object',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1507,
            'language_id' => 2,
            'caption_id' => 910,
            'caption_translation' => 'FE Объект',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1508,
            'language_id' => 1,
            'caption_id' => 911,
            'caption_translation' => 'FeRoute Step Object',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1509,
            'language_id' => 2,
            'caption_id' => 911,
            'caption_translation' => 'FE Объект в шаге',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1510,
            'language_id' => 1,
            'caption_id' => 912,
            'caption_translation' => 'Controller ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1511,
            'language_id' => 2,
            'caption_id' => 912,
            'caption_translation' => 'Контроллер ID',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1512,
            'language_id' => 1,
            'caption_id' => 913,
            'caption_translation' => 'Child Routes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1513,
            'language_id' => 2,
            'caption_id' => 913,
            'caption_translation' => 'Дочерние роуты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1514,
            'language_id' => 1,
            'caption_id' => 914,
            'caption_translation' => 'Steps',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1515,
            'language_id' => 2,
            'caption_id' => 914,
            'caption_translation' => 'Шаги',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1516,
            'language_id' => 1,
            'caption_id' => 915,
            'caption_translation' => 'Menu',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1517,
            'language_id' => 2,
            'caption_id' => 915,
            'caption_translation' => 'Меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1518,
            'language_id' => 1,
            'caption_id' => 916,
            'caption_translation' => 'Routes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1519,
            'language_id' => 2,
            'caption_id' => 916,
            'caption_translation' => 'Роуты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1520,
            'language_id' => 1,
            'caption_id' => 917,
            'caption_translation' => 'System Tables',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1521,
            'language_id' => 2,
            'caption_id' => 917,
            'caption_translation' => 'Системные таблицы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1522,
            'language_id' => 1,
            'caption_id' => 918,
            'caption_translation' => 'Action Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1523,
            'language_id' => 2,
            'caption_id' => 918,
            'caption_translation' => 'Типы действий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1524,
            'language_id' => 1,
            'caption_id' => 919,
            'caption_translation' => 'Admin Directories',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1525,
            'language_id' => 2,
            'caption_id' => 919,
            'caption_translation' => 'Справочники супер администратора',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1526,
            'language_id' => 1,
            'caption_id' => 920,
            'caption_translation' => 'Catalog Contractors',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-20 11:30:05',
            'updated_at' => '2019-08-20 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1527,
            'language_id' => 2,
            'caption_id' => 920,
            'caption_translation' => 'Справочник Контрагенты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1528,
            'language_id' => 1,
            'caption_id' => 921,
            'caption_translation' => 'Catalog Companies',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1529,
            'language_id' => 2,
            'caption_id' => 921,
            'caption_translation' => 'Справочник Организации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1530,
            'language_id' => 1,
            'caption_id' => 922,
            'caption_translation' => 'Catalog Countries',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1531,
            'language_id' => 2,
            'caption_id' => 922,
            'caption_translation' => 'Справочник Страны',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1532,
            'language_id' => 1,
            'caption_id' => 923,
            'caption_translation' => 'Catalog Info Kinds',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1533,
            'language_id' => 2,
            'caption_id' => 923,
            'caption_translation' => 'Справочник Виды контактной информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1534,
            'language_id' => 1,
            'caption_id' => 924,
            'caption_translation' => 'Enumeration Info Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1535,
            'language_id' => 2,
            'caption_id' => 924,
            'caption_translation' => 'Перечисление Типы контактной информации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1536,
            'language_id' => 1,
            'caption_id' => 925,
            'caption_translation' => 'Catalog File Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1537,
            'language_id' => 2,
            'caption_id' => 925,
            'caption_translation' => 'Справочник Типы файлов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1538,
            'language_id' => 1,
            'caption_id' => 926,
            'caption_translation' => 'Catalog Currencies',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1539,
            'language_id' => 2,
            'caption_id' => 926,
            'caption_translation' => 'Справочник Валюты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1540,
            'language_id' => 1,
            'caption_id' => 927,
            'caption_translation' => 'Catalog Physical Persons',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1541,
            'language_id' => 2,
            'caption_id' => 927,
            'caption_translation' => 'Справочник Физические лица',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1542,
            'language_id' => 1,
            'caption_id' => 928,
            'caption_translation' => 'Document Leasing Calculations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1543,
            'language_id' => 2,
            'caption_id' => 928,
            'caption_translation' => 'Документ Лизинговый расчет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1544,
            'language_id' => 1,
            'caption_id' => 929,
            'caption_translation' => 'Document Leasing Contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1545,
            'language_id' => 2,
            'caption_id' => 929,
            'caption_translation' => 'Документ Договор лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1546,
            'language_id' => 1,
            'caption_id' => 930,
            'caption_translation' => 'Catalog Contractor Contracts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1547,
            'language_id' => 2,
            'caption_id' => 930,
            'caption_translation' => 'Справочник Договоры контрагентов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1548,
            'language_id' => 1,
            'caption_id' => 931,
            'caption_translation' => 'Document Leasing Contract Specification',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1549,
            'language_id' => 2,
            'caption_id' => 931,
            'caption_translation' => 'Документ Спецификация по договору лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1550,
            'language_id' => 1,
            'caption_id' => 932,
            'caption_translation' => 'Catalog Schedules',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1551,
            'language_id' => 2,
            'caption_id' => 932,
            'caption_translation' => 'Справочник Графики',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1552,
            'language_id' => 1,
            'caption_id' => 933,
            'caption_translation' => 'CCT Schedule Articles',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1553,
            'language_id' => 2,
            'caption_id' => 933,
            'caption_translation' => 'ПВХ Статьи графиков',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1554,
            'language_id' => 1,
            'caption_id' => 934,
            'caption_translation' => 'Catalog Leasing Object Groups',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1555,
            'language_id' => 2,
            'caption_id' => 934,
            'caption_translation' => 'Справочник Группы предметов лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1556,
            'language_id' => 1,
            'caption_id' => 935,
            'caption_translation' => 'Catalog Attached Document Kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1557,
            'language_id' => 2,
            'caption_id' => 935,
            'caption_translation' => 'Справочник Виды документов контрагентов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1558,
            'language_id' => 1,
            'caption_id' => 936,
            'caption_translation' => 'Catalog File Type Sets',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1559,
            'language_id' => 2,
            'caption_id' => 936,
            'caption_translation' => 'Справочник Наборы типов файлов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1560,
            'language_id' => 1,
            'caption_id' => 937,
            'caption_translation' => 'Catalog Leasing Object Brands',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1561,
            'language_id' => 2,
            'caption_id' => 937,
            'caption_translation' => 'Справочник Марки предметов лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1562,
            'language_id' => 1,
            'caption_id' => 938,
            'caption_translation' => 'Catalog Leasing Object Models',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1563,
            'language_id' => 2,
            'caption_id' => 938,
            'caption_translation' => 'Справочник Модели предметов лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1564,
            'language_id' => 1,
            'caption_id' => 939,
            'caption_translation' => 'Catalog Leasing Object Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1565,
            'language_id' => 2,
            'caption_id' => 939,
            'caption_translation' => 'Справочник Виды предметов лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1566,
            'language_id' => 1,
            'caption_id' => 940,
            'caption_translation' => 'Catalog Legal Forms',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1567,
            'language_id' => 2,
            'caption_id' => 940,
            'caption_translation' => 'Справочник Организационно-правовые формы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1568,
            'language_id' => 1,
            'caption_id' => 941,
            'caption_translation' => 'Catalog Statuses',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1569,
            'language_id' => 2,
            'caption_id' => 941,
            'caption_translation' => 'Справочник Статусы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1570,
            'language_id' => 1,
            'caption_id' => 942,
            'caption_translation' => 'Catalog Files',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1571,
            'language_id' => 2,
            'caption_id' => 942,
            'caption_translation' => 'Справочник Файлы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1572,
            'language_id' => 1,
            'caption_id' => 943,
            'caption_translation' => 'Enumeration Rate VAT',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1573,
            'language_id' => 2,
            'caption_id' => 943,
            'caption_translation' => 'Перечисление Ставки НДС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1574,
            'language_id' => 1,
            'caption_id' => 944,
            'caption_translation' => 'CCT Additional Details',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1575,
            'language_id' => 2,
            'caption_id' => 944,
            'caption_translation' => 'ПВХ Дополнительные реквизиты и сведения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1576,
            'language_id' => 1,
            'caption_id' => 945,
            'caption_translation' => 'Document Customer Requests',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1577,
            'language_id' => 2,
            'caption_id' => 945,
            'caption_translation' => 'Документ Обращение клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1578,
            'language_id' => 1,
            'caption_id' => 946,
            'caption_translation' => 'Document Contractor Requests',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1579,
            'language_id' => 2,
            'caption_id' => 946,
            'caption_translation' => 'Документ Запрос клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1580,
            'language_id' => 1,
            'caption_id' => 947,
            'caption_translation' => 'Catalog Contractor Request Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1581,
            'language_id' => 2,
            'caption_id' => 947,
            'caption_translation' => 'Справочник Типы запросов клиентов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1582,
            'language_id' => 1,
            'caption_id' => 948,
            'caption_translation' => 'Catalog Sale Points',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1583,
            'language_id' => 2,
            'caption_id' => 948,
            'caption_translation' => 'Справочник Точки продаж',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1584,
            'language_id' => 1,
            'caption_id' => 949,
            'caption_translation' => 'Catalog Schedule Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1585,
            'language_id' => 2,
            'caption_id' => 949,
            'caption_translation' => 'Справочник Виды графиков',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1586,
            'language_id' => 1,
            'caption_id' => 950,
            'caption_translation' => 'Document Insurance Policy Contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1587,
            'language_id' => 2,
            'caption_id' => 950,
            'caption_translation' => 'Документ Договор страхования (страховой полис)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1588,
            'language_id' => 1,
            'caption_id' => 951,
            'caption_translation' => 'Exchange In',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1589,
            'language_id' => 2,
            'caption_id' => 951,
            'caption_translation' => 'Обмен входящий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1590,
            'language_id' => 1,
            'caption_id' => 952,
            'caption_translation' => 'Exchange Out',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1591,
            'language_id' => 2,
            'caption_id' => 952,
            'caption_translation' => 'Обмен исходящий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-21 11:30:05',
            'updated_at' => '2019-08-21 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1592,
            'language_id' => 1,
            'caption_id' => 953,
            'caption_translation' => 'Client Cabinet',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1593,
            'language_id' => 2,
            'caption_id' => 953,
            'caption_translation' => 'Кабинет клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1594,
            'language_id' => 1,
            'caption_id' => 954,
            'caption_translation' => 'Feedback Phone',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1595,
            'language_id' => 2,
            'caption_id' => 954,
            'caption_translation' => 'Телефон обратной связи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1596,
            'language_id' => 1,
            'caption_id' => 955,
            'caption_translation' => 'Theme (optional)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1597,
            'language_id' => 2,
            'caption_id' => 955,
            'caption_translation' => 'Тема (опционально)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1598,
            'language_id' => 1,
            'caption_id' => 956,
            'caption_translation' => 'Attach Document',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1599,
            'language_id' => 2,
            'caption_id' => 956,
            'caption_translation' => 'Приложить документ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1600,
            'language_id' => 1,
            'caption_id' => 957,
            'caption_translation' => 'since',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1601,
            'language_id' => 2,
            'caption_id' => 957,
            'caption_translation' => 'от',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-28 11:30:05',
            'updated_at' => '2019-08-28 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1602,
            'language_id' => 1,
            'caption_id' => 958,
            'caption_translation' => 'Request New',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1603,
            'language_id' => 2,
            'caption_id' => 958,
            'caption_translation' => 'Запросить новое',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1604,
            'language_id' => 1,
            'caption_id' => 959,
            'caption_translation' => 'Sort A → Z',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1605,
            'language_id' => 2,
            'caption_id' => 959,
            'caption_translation' => 'Сортировать A → Я',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1606,
            'language_id' => 1,
            'caption_id' => 960,
            'caption_translation' => 'Sort Z → A',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1607,
            'language_id' => 2,
            'caption_id' => 960,
            'caption_translation' => 'Сортировать Я → А',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1608,
            'language_id' => 1,
            'caption_id' => 961,
            'caption_translation' => 'Filter by condition ...',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1609,
            'language_id' => 2,
            'caption_id' => 961,
            'caption_translation' => 'Фильтр по условию...',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1610,
            'language_id' => 1,
            'caption_id' => 962,
            'caption_translation' => 'Filter by value ...',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1611,
            'language_id' => 2,
            'caption_id' => 962,
            'caption_translation' => 'Фильтр по значению...',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1612,
            'language_id' => 1,
            'caption_id' => 963,
            'caption_translation' => 'Empty',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1613,
            'language_id' => 2,
            'caption_id' => 963,
            'caption_translation' => '(Пустые)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1614,
            'language_id' => 1,
            'caption_id' => 964,
            'caption_translation' => 'Cell is empty',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1615,
            'language_id' => 2,
            'caption_id' => 964,
            'caption_translation' => 'Ячейка не заполнена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1616,
            'language_id' => 1,
            'caption_id' => 965,
            'caption_translation' => 'Data cell',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1617,
            'language_id' => 2,
            'caption_id' => 965,
            'caption_translation' => 'Ячейка с данными',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1618,
            'language_id' => 1,
            'caption_id' => 966,
            'caption_translation' => 'The text contains',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1619,
            'language_id' => 2,
            'caption_id' => 966,
            'caption_translation' => 'Текст содержит',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1620,
            'language_id' => 1,
            'caption_id' => 967,
            'caption_translation' => 'Enter text',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1621,
            'language_id' => 2,
            'caption_id' => 967,
            'caption_translation' => 'Введите текст',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1622,
            'language_id' => 1,
            'caption_id' => 968,
            'caption_translation' => 'The text does not contain',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1623,
            'language_id' => 2,
            'caption_id' => 968,
            'caption_translation' => 'Текст не содержит',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1624,
            'language_id' => 1,
            'caption_id' => 969,
            'caption_translation' => 'The text begins with',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1625,
            'language_id' => 2,
            'caption_id' => 969,
            'caption_translation' => 'Текст начинается с',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1626,
            'language_id' => 1,
            'caption_id' => 970,
            'caption_translation' => 'The text ends with',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1627,
            'language_id' => 2,
            'caption_id' => 970,
            'caption_translation' => 'Текст заканчивается на',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1628,
            'language_id' => 1,
            'caption_id' => 971,
            'caption_translation' => 'Text exactly',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1629,
            'language_id' => 2,
            'caption_id' => 971,
            'caption_translation' => 'Текст в точности',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1630,
            'language_id' => 1,
            'caption_id' => 972,
            'caption_translation' => 'Choose a date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1631,
            'language_id' => 2,
            'caption_id' => 972,
            'caption_translation' => 'Выберите дату',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1632,
            'language_id' => 1,
            'caption_id' => 973,
            'caption_translation' => 'Date to',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1633,
            'language_id' => 2,
            'caption_id' => 973,
            'caption_translation' => 'Дата до',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1634,
            'language_id' => 1,
            'caption_id' => 974,
            'caption_translation' => 'Date after',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1635,
            'language_id' => 2,
            'caption_id' => 974,
            'caption_translation' => 'Дата после',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1636,
            'language_id' => 1,
            'caption_id' => 975,
            'caption_translation' => 'More',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1637,
            'language_id' => 2,
            'caption_id' => 975,
            'caption_translation' => 'Больше',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1638,
            'language_id' => 1,
            'caption_id' => 976,
            'caption_translation' => 'More or equal',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1639,
            'language_id' => 2,
            'caption_id' => 976,
            'caption_translation' => 'Больше или равно',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1640,
            'language_id' => 1,
            'caption_id' => 977,
            'caption_translation' => 'Insert the number',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1641,
            'language_id' => 2,
            'caption_id' => 977,
            'caption_translation' => 'Введите число',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1642,
            'language_id' => 1,
            'caption_id' => 978,
            'caption_translation' => 'Less',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1643,
            'language_id' => 2,
            'caption_id' => 978,
            'caption_translation' => 'Меньше',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1644,
            'language_id' => 1,
            'caption_id' => 979,
            'caption_translation' => 'Less or equal',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1645,
            'language_id' => 2,
            'caption_id' => 979,
            'caption_translation' => 'Меньше или равно',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1646,
            'language_id' => 1,
            'caption_id' => 980,
            'caption_translation' => 'Equally',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1647,
            'language_id' => 2,
            'caption_id' => 980,
            'caption_translation' => 'Равно',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1648,
            'language_id' => 1,
            'caption_id' => 981,
            'caption_translation' => 'Not equal',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1649,
            'language_id' => 2,
            'caption_id' => 981,
            'caption_translation' => 'Не равно',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1650,
            'language_id' => 1,
            'caption_id' => 982,
            'caption_translation' => 'Between',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1651,
            'language_id' => 2,
            'caption_id' => 982,
            'caption_translation' => 'Между',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1652,
            'language_id' => 1,
            'caption_id' => 983,
            'caption_translation' => 'Before',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1653,
            'language_id' => 2,
            'caption_id' => 983,
            'caption_translation' => 'До',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1654,
            'language_id' => 1,
            'caption_id' => 984,
            'caption_translation' => 'Not between',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1655,
            'language_id' => 2,
            'caption_id' => 984,
            'caption_translation' => 'Не между',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1656,
            'language_id' => 1,
            'caption_id' => 985,
            'caption_translation' => 'Draft',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1657,
            'language_id' => 2,
            'caption_id' => 985,
            'caption_translation' => 'Черновик',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1658,
            'language_id' => 1,
            'caption_id' => 986,
            'caption_translation' => 'General Leasing Issues',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1659,
            'language_id' => 2,
            'caption_id' => 986,
            'caption_translation' => 'Общие вопросы по лизингу',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1660,
            'language_id' => 1,
            'caption_id' => 987,
            'caption_translation' => 'How to get a commercial offer?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1661,
            'language_id' => 2,
            'caption_id' => 987,
            'caption_translation' => 'Как получить коммерческое предложение?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1662,
            'language_id' => 1,
            'caption_id' => 988,
            'caption_translation' => 'Leasing Rules',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1663,
            'language_id' => 2,
            'caption_id' => 988,
            'caption_translation' => 'Правила лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1664,
            'language_id' => 1,
            'caption_id' => 989,
            'caption_translation' => 'How to send an application for leasing?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1665,
            'language_id' => 2,
            'caption_id' => 989,
            'caption_translation' => 'Как отправить заявку на лизинг?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1666,
            'language_id' => 1,
            'caption_id' => 990,
            'caption_translation' => 'FAQ on Graphics and Primary Documentation',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1667,
            'language_id' => 2,
            'caption_id' => 990,
            'caption_translation' => 'Частые вопросы по графикам и первичной документации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1668,
            'language_id' => 1,
            'caption_id' => 991,
            'caption_translation' => 'What to do when losing documents?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1669,
            'language_id' => 2,
            'caption_id' => 991,
            'caption_translation' => 'Что делать при потере документов?',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1670,
            'language_id' => 1,
            'caption_id' => 992,
            'caption_translation' => 'Download All',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1671,
            'language_id' => 2,
            'caption_id' => 992,
            'caption_translation' => 'Скачать все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1672,
            'language_id' => 1,
            'caption_id' => 993,
            'caption_translation' => 'Request Terms',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1673,
            'language_id' => 2,
            'caption_id' => 993,
            'caption_translation' => 'Условия запроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-29 11:30:05',
            'updated_at' => '2019-08-29 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1674,
            'language_id' => 1,
            'caption_id' => 994,
            'caption_translation' => 'Contacts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1675,
            'language_id' => 2,
            'caption_id' => 994,
            'caption_translation' => 'Контакты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1676,
            'language_id' => 1,
            'caption_id' => 995,
            'caption_translation' => 'Statistics',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1677,
            'language_id' => 2,
            'caption_id' => 995,
            'caption_translation' => 'Статистика',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1678,
            'language_id' => 1,
            'caption_id' => 996,
            'caption_translation' => 'Date number of the leasing contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1679,
            'language_id' => 2,
            'caption_id' => 996,
            'caption_translation' => 'Дата, номер договора страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-02 11:30:05',
            'updated_at' => '2019-09-02 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1680,
            'language_id' => 1,
            'caption_id' => 997,
            'caption_translation' => 'View',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1681,
            'language_id' => 2,
            'caption_id' => 997,
            'caption_translation' => 'Просмотр',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1682,
            'language_id' => 1,
            'caption_id' => 998,
            'caption_translation' => 'Download the application form, fill out and sign on behalf of the EIO',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1683,
            'language_id' => 2,
            'caption_id' => 998,
            'caption_translation' => 'Скачайте анкету, заполните и подпишите от имени ЕИО',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1684,
            'language_id' => 1,
            'caption_id' => 999,
            'caption_translation' => 'Scan copies of documents.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1685,
            'language_id' => 2,
            'caption_id' => 999,
            'caption_translation' => 'Скан-копии документов.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-09 11:30:05',
            'updated_at' => '2019-09-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1686,
            'language_id' => 1,
            'caption_id' => 1000,
            'caption_translation' => 'Russian',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1687,
            'language_id' => 2,
            'caption_id' => 1000,
            'caption_translation' => 'Русский',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1688,
            'language_id' => 1,
            'caption_id' => 1001,
            'caption_translation' => 'English',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1689,
            'language_id' => 2,
            'caption_id' => 1001,
            'caption_translation' => 'Английский',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1690,
            'language_id' => 1,
            'caption_id' => 1002,
            'caption_translation' => 'Role is access',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1691,
            'language_id' => 2,
            'caption_id' => 1002,
            'caption_translation' => 'Роль разрешена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1692,
            'language_id' => 1,
            'caption_id' => 1003,
            'caption_translation' => 'Role is forbidden',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1693,
            'language_id' => 2,
            'caption_id' => 1003,
            'caption_translation' => 'Роль запрещена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1694,
            'language_id' => 1,
            'caption_id' => 1004,
            'caption_translation' => 'FeRoute name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1695,
            'language_id' => 2,
            'caption_id' => 1004,
            'caption_translation' => 'Наименование Fe Route',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1696,
            'language_id' => 1,
            'caption_id' => 1005,
            'caption_translation' => 'Menu Item view',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1697,
            'language_id' => 2,
            'caption_id' => 1005,
            'caption_translation' => 'Просмотр пункта меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1698,
            'language_id' => 1,
            'caption_id' => 1006,
            'caption_translation' => 'Access is allowed',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1699,
            'language_id' => 2,
            'caption_id' => 1006,
            'caption_translation' => 'Доступ разрешен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1700,
            'language_id' => 1,
            'caption_id' => 1007,
            'caption_translation' => 'Back End Route',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1701,
            'language_id' => 2,
            'caption_id' => 1007,
            'caption_translation' => 'BE Роут',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1702,
            'language_id' => 1,
            'caption_id' => 1008,
            'caption_translation' => 'Individual entrepreneur',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1703,
            'language_id' => 2,
            'caption_id' => 1008,
            'caption_translation' => 'ИП',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-16 11:30:05',
            'updated_at' => '2019-09-16 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1704,
            'language_id' => 1,
            'caption_id' => 1009,
            'caption_translation' => 'Request Invoices',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1705,
            'language_id' => 2,
            'caption_id' => 1009,
            'caption_translation' => 'Запрос на получение счетов-фактур',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1706,
            'language_id' => 1,
            'caption_id' => 1010,
            'caption_translation' => 'Request Invoice',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1707,
            'language_id' => 2,
            'caption_id' => 1010,
            'caption_translation' => 'Запрос на получение счета-фактуры',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1708,
            'language_id' => 1,
            'caption_id' => 1011,
            'caption_translation' => 'Verify Page',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1709,
            'language_id' => 2,
            'caption_id' => 1011,
            'caption_translation' => 'Страница верификации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-17 11:30:05',
            'updated_at' => '2019-09-17 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1710,
            'language_id' => 1,
            'caption_id' => 1012,
            'caption_translation' => 'FeComponent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1711,
            'language_id' => 2,
            'caption_id' => 1012,
            'caption_translation' => 'FE Компонента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1712,
            'language_id' => 1,
            'caption_id' => 1013,
            'caption_translation' => 'BeRoute Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1713,
            'language_id' => 2,
            'caption_id' => 1013,
            'caption_translation' => 'Наименование BE Роута',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1714,
            'language_id' => 1,
            'caption_id' => 1014,
            'caption_translation' => 'FeUrl Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1715,
            'language_id' => 2,
            'caption_id' => 1014,
            'caption_translation' => 'Код FeUrl',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1716,
            'language_id' => 1,
            'caption_id' => 1015,
            'caption_translation' => 'FeUrl Parameter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1717,
            'language_id' => 2,
            'caption_id' => 1015,
            'caption_translation' => 'Параметр FeUrl',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1718,
            'language_id' => 1,
            'caption_id' => 1016,
            'caption_translation' => 'FeRoute Step Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1719,
            'language_id' => 2,
            'caption_id' => 1016,
            'caption_translation' => 'Наименование FE Шага',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1720,
            'language_id' => 1,
            'caption_id' => 1017,
            'caption_translation' => 'FeUrl Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1721,
            'language_id' => 2,
            'caption_id' => 1017,
            'caption_translation' => 'Инфо FeUrl',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1722,
            'language_id' => 1,
            'caption_id' => 1018,
            'caption_translation' => 'FeUrl Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1723,
            'language_id' => 2,
            'caption_id' => 1018,
            'caption_translation' => 'Наименование FeUrl',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1724,
            'language_id' => 1,
            'caption_id' => 1019,
            'caption_translation' => 'FeRouteUrl Parameter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1725,
            'language_id' => 2,
            'caption_id' => 1019,
            'caption_translation' => 'Параметр FeRouteUrl',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-18 11:30:05',
            'updated_at' => '2019-09-18 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1726,
            'language_id' => 1,
            'caption_id' => 1020,
            'caption_translation' => 'Send Letter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1727,
            'language_id' => 2,
            'caption_id' => 1020,
            'caption_translation' => 'Отправить письмо',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1728,
            'language_id' => 1,
            'caption_id' => 1021,
            'caption_translation' => 'Resend Letter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1729,
            'language_id' => 2,
            'caption_id' => 1021,
            'caption_translation' => 'Повторно отправляется письмо на верификацию пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1730,
            'language_id' => 1,
            'caption_id' => 1022,
            'caption_translation' => 'Logs Count',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1731,
            'language_id' => 2,
            'caption_id' => 1022,
            'caption_translation' => 'Примечание: выводятся последние {count} логов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1732,
            'language_id' => 1,
            'caption_id' => 1023,
            'caption_translation' => 'Duration Site',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1733,
            'language_id' => 2,
            'caption_id' => 1023,
            'caption_translation' => 'Длительность (сайт)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1734,
            'language_id' => 1,
            'caption_id' => 1024,
            'caption_translation' => 'Duration 1C',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1735,
            'language_id' => 2,
            'caption_id' => 1024,
            'caption_translation' => 'Длительность (1С)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1736,
            'language_id' => 1,
            'caption_id' => 1025,
            'caption_translation' => 'Duration Connect',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1737,
            'language_id' => 2,
            'caption_id' => 1025,
            'caption_translation' => 'Длительность (соед.)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-09-27 11:30:05',
            'updated_at' => '2019-09-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1738,
            'language_id' => 1,
            'caption_id' => 1026,
            'caption_translation' => 'Not Selected',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-04 11:30:05',
            'updated_at' => '2019-10-04 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1739,
            'language_id' => 2,
            'caption_id' => 1026,
            'caption_translation' => 'Не выбрано',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-04 11:30:05',
            'updated_at' => '2019-10-04 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1740,
            'language_id' => 1,
            'caption_id' => 1027,
            'caption_translation' => 'Action Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1741,
            'language_id' => 2,
            'caption_id' => 1027,
            'caption_translation' => 'Тип действия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1742,
            'language_id' => 1,
            'caption_id' => 1028,
            'caption_translation' => 'Parameter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1743,
            'language_id' => 2,
            'caption_id' => 1028,
            'caption_translation' => 'Параметр',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1744,
            'language_id' => 1,
            'caption_id' => 1029,
            'caption_translation' => 'Page Setup',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1745,
            'language_id' => 2,
            'caption_id' => 1029,
            'caption_translation' => 'Настройка страницы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1746,
            'language_id' => 1,
            'caption_id' => 1030,
            'caption_translation' => 'Preview',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1747,
            'language_id' => 2,
            'caption_id' => 1030,
            'caption_translation' => 'Предпросмотр',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1748,
            'language_id' => 1,
            'caption_id' => 1031,
            'caption_translation' => 'Header Top',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1749,
            'language_id' => 2,
            'caption_id' => 1031,
            'caption_translation' => 'Header - Верхняя часть',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1750,
            'language_id' => 1,
            'caption_id' => 1032,
            'caption_translation' => 'Header Bottom',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1751,
            'language_id' => 2,
            'caption_id' => 1032,
            'caption_translation' => 'Header - Нижняя часть',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1752,
            'language_id' => 1,
            'caption_id' => 1033,
            'caption_translation' => 'Body Page',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1753,
            'language_id' => 2,
            'caption_id' => 1033,
            'caption_translation' => 'Body - Страница',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1754,
            'language_id' => 1,
            'caption_id' => 1034,
            'caption_translation' => 'Footer Top',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1755,
            'language_id' => 2,
            'caption_id' => 1034,
            'caption_translation' => 'Footer - Верхняя часть',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1756,
            'language_id' => 1,
            'caption_id' => 1035,
            'caption_translation' => 'Footer Bottom',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1757,
            'language_id' => 2,
            'caption_id' => 1035,
            'caption_translation' => 'Footer - Нижняя часть',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-07 11:30:05',
            'updated_at' => '2019-10-07 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1758,
            'language_id' => 1,
            'caption_id' => 1036,
            'caption_translation' => 'Compound Route',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1759,
            'language_id' => 2,
            'caption_id' => 1036,
            'caption_translation' => 'Составной Роут',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1760,
            'language_id' => 1,
            'caption_id' => 1037,
            'caption_translation' => 'Page Theme',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1761,
            'language_id' => 2,
            'caption_id' => 1037,
            'caption_translation' => 'Тема страницы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1762,
            'language_id' => 1,
            'caption_id' => 1038,
            'caption_translation' => 'Parent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1763,
            'language_id' => 2,
            'caption_id' => 1038,
            'caption_translation' => 'Родитель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1764,
            'language_id' => 1,
            'caption_id' => 1039,
            'caption_translation' => 'Card',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1765,
            'language_id' => 2,
            'caption_id' => 1039,
            'caption_translation' => 'Карточка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1766,
            'language_id' => 1,
            'caption_id' => 1040,
            'caption_translation' => 'Create Compliance',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1767,
            'language_id' => 2,
            'caption_id' => 1040,
            'caption_translation' => 'Создание соответствия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1768,
            'language_id' => 1,
            'caption_id' => 1041,
            'caption_translation' => 'Output Object',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1769,
            'language_id' => 2,
            'caption_id' => 1041,
            'caption_translation' => 'Объект вывода',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1770,
            'language_id' => 1,
            'caption_id' => 1042,
            'caption_translation' => 'Completed',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1771,
            'language_id' => 2,
            'caption_id' => 1042,
            'caption_translation' => 'Завершено',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1772,
            'language_id' => 1,
            'caption_id' => 1043,
            'caption_translation' => 'Controller Allias',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1773,
            'language_id' => 2,
            'caption_id' => 1043,
            'caption_translation' => 'Представление контроллера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1774,
            'language_id' => 1,
            'caption_id' => 1044,
            'caption_translation' => 'Page Spoofing',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1775,
            'language_id' => 2,
            'caption_id' => 1044,
            'caption_translation' => 'Подмена страницы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1776,
            'language_id' => 1,
            'caption_id' => 1045,
            'caption_translation' => 'File not found. Try later.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1777,
            'language_id' => 2,
            'caption_id' => 1045,
            'caption_translation' => 'Файл не найден. Попробуйте позже.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1778,
            'language_id' => 1,
            'caption_id' => 1046,
            'caption_translation' => 'Link to external object',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1779,
            'language_id' => 2,
            'caption_id' => 1046,
            'caption_translation' => 'Ссылка на внешний объект',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1780,
            'language_id' => 1,
            'caption_id' => 1047,
            'caption_translation' => 'File uploaded successfully',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1781,
            'language_id' => 2,
            'caption_id' => 1047,
            'caption_translation' => 'Файл успешно загружен',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-09 11:30:05',
            'updated_at' => '2019-10-09 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1782,
            'language_id' => 1,
            'caption_id' => 1048,
            'caption_translation' => 'Customer Requests ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1783,
            'language_id' => 2,
            'caption_id' => 1048,
            'caption_translation' => 'Обращения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1784,
            'language_id' => 1,
            'caption_id' => 1049,
            'caption_translation' => 'Customer Request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1785,
            'language_id' => 2,
            'caption_id' => 1049,
            'caption_translation' => 'Обращение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1786,
            'language_id' => 1,
            'caption_id' => 1050,
            'caption_translation' => 'Check the data in the Models table',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1787,
            'language_id' => 2,
            'caption_id' => 1050,
            'caption_translation' => 'Проверьте данные в таблице Моделей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-10 11:30:05',
            'updated_at' => '2019-10-10 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1788,
            'language_id' => 1,
            'caption_id' => 1051,
            'caption_translation' => 'Title',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-23 11:30:05',
            'updated_at' => '2019-10-23 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1789,
            'language_id' => 2,
            'caption_id' => 1051,
            'caption_translation' => 'Заголовок',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-23 11:30:05',
            'updated_at' => '2019-10-23 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1790,
            'language_id' => 1,
            'caption_id' => 1052,
            'caption_translation' => 'Select at least 1 item',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-23 11:30:05',
            'updated_at' => '2019-10-23 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1791,
            'language_id' => 2,
            'caption_id' => 1052,
            'caption_translation' => 'Выберите хотя бы 1 элемент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-23 11:30:05',
            'updated_at' => '2019-10-23 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1792,
            'language_id' => 1,
            'caption_id' => 1053,
            'caption_translation' => 'Secure connection',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-24 11:30:05',
            'updated_at' => '2019-10-24 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1793,
            'language_id' => 2,
            'caption_id' => 1053,
            'caption_translation' => 'Защищенное соединение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-10-24 11:30:05',
            'updated_at' => '2019-10-24 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1794,
            'language_id' => 1,
            'caption_id' => 1054,
            'caption_translation' => 'Partners',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1795,
            'language_id' => 2,
            'caption_id' => 1054,
            'caption_translation' => 'Партнеры',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1796,
            'language_id' => 1,
            'caption_id' => 1055,
            'caption_translation' => 'Partner',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1797,
            'language_id' => 2,
            'caption_id' => 1055,
            'caption_translation' => 'Партнер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1798,
            'language_id' => 1,
            'caption_id' => 1056,
            'caption_translation' => 'Partner Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1799,
            'language_id' => 2,
            'caption_id' => 1056,
            'caption_translation' => 'Регионы партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1800,
            'language_id' => 1,
            'caption_id' => 1057,
            'caption_translation' => 'Partner Region',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1801,
            'language_id' => 2,
            'caption_id' => 1057,
            'caption_translation' => 'Регион партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1802,
            'language_id' => 1,
            'caption_id' => 1058,
            'caption_translation' => 'Use Regions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1803,
            'language_id' => 2,
            'caption_id' => 1058,
            'caption_translation' => 'Использовать регионы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1804,
            'language_id' => 1,
            'caption_id' => 1059,
            'caption_translation' => 'Partner Points Address',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1805,
            'language_id' => 2,
            'caption_id' => 1059,
            'caption_translation' => 'Адрес точки партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1806,
            'language_id' => 1,
            'caption_id' => 1060,
            'caption_translation' => 'Partner Points',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1807,
            'language_id' => 2,
            'caption_id' => 1060,
            'caption_translation' => 'Точки партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1808,
            'language_id' => 1,
            'caption_id' => 1061,
            'caption_translation' => 'Partner Point',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1809,
            'language_id' => 2,
            'caption_id' => 1061,
            'caption_translation' => 'Точка партнера ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1810,
            'language_id' => 1,
            'caption_id' => 1062,
            'caption_translation' => 'Contact Persons',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1811,
            'language_id' => 2,
            'caption_id' => 1062,
            'caption_translation' => 'Контактные лица',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1812,
            'language_id' => 1,
            'caption_id' => 1063,
            'caption_translation' => 'Contact Person',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1813,
            'language_id' => 2,
            'caption_id' => 1063,
            'caption_translation' => 'Контактное лицо',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1814,
            'language_id' => 1,
            'caption_id' => 1064,
            'caption_translation' => 'Position',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1815,
            'language_id' => 2,
            'caption_id' => 1064,
            'caption_translation' => 'Должность',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1816,
            'language_id' => 1,
            'caption_id' => 1065,
            'caption_translation' => 'Contact Persons Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1817,
            'language_id' => 2,
            'caption_id' => 1065,
            'caption_translation' => 'Информация о контактных лицах',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1818,
            'language_id' => 1,
            'caption_id' => 1066,
            'caption_translation' => 'Contact Person Info',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1819,
            'language_id' => 2,
            'caption_id' => 1066,
            'caption_translation' => 'Информция о контактном лице',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1820,
            'language_id' => 1,
            'caption_id' => 1067,
            'caption_translation' => 'Partner Employees',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1821,
            'language_id' => 2,
            'caption_id' => 1067,
            'caption_translation' => 'Сотрудники партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1822,
            'language_id' => 1,
            'caption_id' => 1068,
            'caption_translation' => 'Partner Employee',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1823,
            'language_id' => 2,
            'caption_id' => 1068,
            'caption_translation' => 'Сотрудник партнера',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1824,
            'language_id' => 1,
            'caption_id' => 1069,
            'caption_translation' => 'Partner Employee Contact Persons',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1825,
            'language_id' => 2,
            'caption_id' => 1069,
            'caption_translation' => 'Контактные лица сотрудника',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1826,
            'language_id' => 1,
            'caption_id' => 1070,
            'caption_translation' => 'Partner Employee Contact Person',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1827,
            'language_id' => 2,
            'caption_id' => 1070,
            'caption_translation' => 'Контактное лицо сотрудника',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1828,
            'language_id' => 1,
            'caption_id' => 1071,
            'caption_translation' => 'User Interfaces',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1829,
            'language_id' => 2,
            'caption_id' => 1071,
            'caption_translation' => 'Интерфейсы пользователей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1830,
            'language_id' => 1,
            'caption_id' => 1072,
            'caption_translation' => 'User Interface',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1831,
            'language_id' => 2,
            'caption_id' => 1072,
            'caption_translation' => 'Интерфейс пользователя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1832,
            'language_id' => 1,
            'caption_id' => 1073,
            'caption_translation' => 'Menu Item Left',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1833,
            'language_id' => 2,
            'caption_id' => 1073,
            'caption_translation' => 'Левое меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1834,
            'language_id' => 1,
            'caption_id' => 1074,
            'caption_translation' => 'Menu Item Top',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1835,
            'language_id' => 2,
            'caption_id' => 1074,
            'caption_translation' => 'Верхнее меню',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-08 11:30:05',
            'updated_at' => '2019-11-08 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1836,
            'language_id' => 1,
            'caption_id' => 1075,
            'caption_translation' => 'Access Axes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1837,
            'language_id' => 2,
            'caption_id' => 1075,
            'caption_translation' => 'Оси прав доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1838,
            'language_id' => 1,
            'caption_id' => 1076,
            'caption_translation' => 'Access Axe',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1839,
            'language_id' => 2,
            'caption_id' => 1076,
            'caption_translation' => 'Ось прав доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1840,
            'language_id' => 1,
            'caption_id' => 1077,
            'caption_translation' => 'QT Pages',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1841,
            'language_id' => 2,
            'caption_id' => 1077,
            'caption_translation' => 'Страницы для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1842,
            'language_id' => 1,
            'caption_id' => 1078,
            'caption_translation' => 'QT Page',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1843,
            'language_id' => 2,
            'caption_id' => 1078,
            'caption_translation' => 'Страница для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1844,
            'language_id' => 1,
            'caption_id' => 1079,
            'caption_translation' => 'QT Blocks',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1845,
            'language_id' => 2,
            'caption_id' => 1079,
            'caption_translation' => 'Блоки для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1846,
            'language_id' => 1,
            'caption_id' => 1080,
            'caption_translation' => 'QT Block',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1847,
            'language_id' => 2,
            'caption_id' => 1080,
            'caption_translation' => 'Блок для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1848,
            'language_id' => 1,
            'caption_id' => 1081,
            'caption_translation' => 'QT Sets',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1849,
            'language_id' => 2,
            'caption_id' => 1081,
            'caption_translation' => 'Наборы вопросов для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1850,
            'language_id' => 1,
            'caption_id' => 1082,
            'caption_translation' => 'QT Set',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1851,
            'language_id' => 2,
            'caption_id' => 1082,
            'caption_translation' => 'Набор вопросов для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1852,
            'language_id' => 1,
            'caption_id' => 1083,
            'caption_translation' => 'QT Question Kinds',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1853,
            'language_id' => 2,
            'caption_id' => 1083,
            'caption_translation' => 'Виды вопросов для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1854,
            'language_id' => 1,
            'caption_id' => 1084,
            'caption_translation' => 'QT Question Kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1855,
            'language_id' => 2,
            'caption_id' => 1084,
            'caption_translation' => 'Вид вопроса для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1856,
            'language_id' => 1,
            'caption_id' => 1085,
            'caption_translation' => 'Active',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1857,
            'language_id' => 2,
            'caption_id' => 1085,
            'caption_translation' => 'Активный',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1858,
            'language_id' => 1,
            'caption_id' => 1086,
            'caption_translation' => 'Select all',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1859,
            'language_id' => 2,
            'caption_id' => 1086,
            'caption_translation' => 'Выбрать все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1860,
            'language_id' => 1,
            'caption_id' => 1087,
            'caption_translation' => 'Deselect all',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1861,
            'language_id' => 2,
            'caption_id' => 1087,
            'caption_translation' => 'Убрать все',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1862,
            'language_id' => 1,
            'caption_id' => 1088,
            'caption_translation' => 'Delete mark',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1863,
            'language_id' => 2,
            'caption_id' => 1088,
            'caption_translation' => 'Пометка удаления',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1864,
            'language_id' => 1,
            'caption_id' => 1089,
            'caption_translation' => 'Primary сontractor',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1865,
            'language_id' => 2,
            'caption_id' => 1089,
            'caption_translation' => 'Основной контрагент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1866,
            'language_id' => 1,
            'caption_id' => 1090,
            'caption_translation' => 'Client request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1867,
            'language_id' => 2,
            'caption_id' => 1090,
            'caption_translation' => 'Обращение клиента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1868,
            'language_id' => 1,
            'caption_id' => 1091,
            'caption_translation' => 'from',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1869,
            'language_id' => 2,
            'caption_id' => 1091,
            'caption_translation' => 'от',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1870,
            'language_id' => 1,
            'caption_id' => 1092,
            'caption_translation' => 'Documents journal',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1871,
            'language_id' => 2,
            'caption_id' => 1092,
            'caption_translation' => 'Журнал документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1872,
            'language_id' => 1,
            'caption_id' => 1093,
            'caption_translation' => 'Leasing contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1873,
            'language_id' => 2,
            'caption_id' => 1093,
            'caption_translation' => 'Договор лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1874,
            'language_id' => 1,
            'caption_id' => 1094,
            'caption_translation' => 'Leasing сontract specification',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1875,
            'language_id' => 2,
            'caption_id' => 1094,
            'caption_translation' => 'Спецификация по договору лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1876,
            'language_id' => 1,
            'caption_id' => 1095,
            'caption_translation' => 'Leasing сalculation',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1877,
            'language_id' => 2,
            'caption_id' => 1095,
            'caption_translation' => 'Лизинговый расчет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1878,
            'language_id' => 1,
            'caption_id' => 1096,
            'caption_translation' => 'Calculation templates',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1879,
            'language_id' => 2,
            'caption_id' => 1096,
            'caption_translation' => 'Шаблоны расчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1880,
            'language_id' => 1,
            'caption_id' => 1097,
            'caption_translation' => 'Calculation template',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1881,
            'language_id' => 2,
            'caption_id' => 1097,
            'caption_translation' => 'Шаблон расчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1882,
            'language_id' => 1,
            'caption_id' => 1098,
            'caption_translation' => 'Additional details extensions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1883,
            'language_id' => 2,
            'caption_id' => 1098,
            'caption_translation' => 'Расширения дополнительных реквизитов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1884,
            'language_id' => 1,
            'caption_id' => 1099,
            'caption_translation' => 'Additional detail extension',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1885,
            'language_id' => 2,
            'caption_id' => 1099,
            'caption_translation' => 'Расширение дополнительного реквизита',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1886,
            'language_id' => 1,
            'caption_id' => 1100,
            'caption_translation' => 'Calculation parameter types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1887,
            'language_id' => 2,
            'caption_id' => 1100,
            'caption_translation' => 'Типы параметров расчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1888,
            'language_id' => 1,
            'caption_id' => 1101,
            'caption_translation' => 'Calculation parameter type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1889,
            'language_id' => 2,
            'caption_id' => 1101,
            'caption_translation' => 'Тип параметра расчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1890,
            'language_id' => 1,
            'caption_id' => 1102,
            'caption_translation' => 'Additional details',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1891,
            'language_id' => 2,
            'caption_id' => 1102,
            'caption_translation' => 'Дополнительные реквизиты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1892,
            'language_id' => 1,
            'caption_id' => 1103,
            'caption_translation' => 'Additional detail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1893,
            'language_id' => 2,
            'caption_id' => 1103,
            'caption_translation' => 'Дополнительный реквизит',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1894,
            'language_id' => 1,
            'caption_id' => 1104,
            'caption_translation' => 'Calculation templates parameter settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1895,
            'language_id' => 2,
            'caption_id' => 1104,
            'caption_translation' => 'Настройки парметров шаблонов расчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1896,
            'language_id' => 1,
            'caption_id' => 1105,
            'caption_translation' => 'Calculation template parameter setting',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1897,
            'language_id' => 2,
            'caption_id' => 1105,
            'caption_translation' => 'Настройка парметра шаблона расчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1898,
            'language_id' => 1,
            'caption_id' => 1106,
            'caption_translation' => 'Questionnaire preview',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:05',
            'updated_at' => '2019-11-27 11:30:05',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1899,
            'language_id' => 2,
            'caption_id' => 1106,
            'caption_translation' => 'Предварительный просмотр анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:06',
            'updated_at' => '2019-11-27 11:30:06',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1900,
            'language_id' => 1,
            'caption_id' => 1107,
            'caption_translation' => 'New request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:07',
            'updated_at' => '2019-11-27 11:30:07',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1901,
            'language_id' => 2,
            'caption_id' => 1107,
            'caption_translation' => 'Новое обращение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:08',
            'updated_at' => '2019-11-27 11:30:08',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1902,
            'language_id' => 1,
            'caption_id' => 1108,
            'caption_translation' => 'Calculation parameters',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:09',
            'updated_at' => '2019-11-27 11:30:09',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1903,
            'language_id' => 2,
            'caption_id' => 1108,
            'caption_translation' => 'Параметры расчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:10',
            'updated_at' => '2019-11-27 11:30:10',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1904,
            'language_id' => 1,
            'caption_id' => 1109,
            'caption_translation' => 'Allow editing',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:11',
            'updated_at' => '2019-11-27 11:30:11',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1905,
            'language_id' => 2,
            'caption_id' => 1109,
            'caption_translation' => 'Разрешить редактирвоание',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:12',
            'updated_at' => '2019-11-27 11:30:12',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1906,
            'language_id' => 1,
            'caption_id' => 1110,
            'caption_translation' => 'Access roles',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:13',
            'updated_at' => '2019-11-27 11:30:13',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1907,
            'language_id' => 2,
            'caption_id' => 1110,
            'caption_translation' => 'Роли доступов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:14',
            'updated_at' => '2019-11-27 11:30:14',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1908,
            'language_id' => 1,
            'caption_id' => 1111,
            'caption_translation' => 'Read',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:15',
            'updated_at' => '2019-11-27 11:30:15',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1909,
            'language_id' => 2,
            'caption_id' => 1111,
            'caption_translation' => 'Чтение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:16',
            'updated_at' => '2019-11-27 11:30:16',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1910,
            'language_id' => 1,
            'caption_id' => 1112,
            'caption_translation' => 'Record',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:17',
            'updated_at' => '2019-11-27 11:30:17',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1911,
            'language_id' => 2,
            'caption_id' => 1112,
            'caption_translation' => 'Запись',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:18',
            'updated_at' => '2019-11-27 11:30:18',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1912,
            'language_id' => 1,
            'caption_id' => 1113,
            'caption_translation' => 'Insert',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:19',
            'updated_at' => '2019-11-27 11:30:19',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1913,
            'language_id' => 2,
            'caption_id' => 1113,
            'caption_translation' => 'Добавление',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:20',
            'updated_at' => '2019-11-27 11:30:20',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1914,
            'language_id' => 1,
            'caption_id' => 1114,
            'caption_translation' => 'Update',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:21',
            'updated_at' => '2019-11-27 11:30:21',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1915,
            'language_id' => 2,
            'caption_id' => 1114,
            'caption_translation' => 'Обновление',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:22',
            'updated_at' => '2019-11-27 11:30:22',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1916,
            'language_id' => 1,
            'caption_id' => 1115,
            'caption_translation' => 'Send Request',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:23',
            'updated_at' => '2019-11-27 11:30:23',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1917,
            'language_id' => 2,
            'caption_id' => 1115,
            'caption_translation' => 'Отправь Запрос',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:24',
            'updated_at' => '2019-11-27 11:30:24',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1918,
            'language_id' => 1,
            'caption_id' => 1116,
            'caption_translation' => 'Required',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:25',
            'updated_at' => '2019-11-27 11:30:25',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1919,
            'language_id' => 2,
            'caption_id' => 1116,
            'caption_translation' => 'Обязательный',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:26',
            'updated_at' => '2019-11-27 11:30:26',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1920,
            'language_id' => 1,
            'caption_id' => 1117,
            'caption_translation' => 'Default value',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:27',
            'updated_at' => '2019-11-27 11:30:27',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1921,
            'language_id' => 2,
            'caption_id' => 1117,
            'caption_translation' => 'Значение по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:28',
            'updated_at' => '2019-11-27 11:30:28',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1922,
            'language_id' => 1,
            'caption_id' => 1118,
            'caption_translation' => 'Leasing application form',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:29',
            'updated_at' => '2019-11-27 11:30:29',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1923,
            'language_id' => 2,
            'caption_id' => 1118,
            'caption_translation' => 'Оформление заявки на лизинг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:30',
            'updated_at' => '2019-11-27 11:30:30',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1924,
            'language_id' => 1,
            'caption_id' => 1119,
            'caption_translation' => 'Leasing requests with a questionnaire',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:31',
            'updated_at' => '2019-11-27 11:30:31',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1925,
            'language_id' => 2,
            'caption_id' => 1119,
            'caption_translation' => 'Заявки на лизинг с анкетой',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:32',
            'updated_at' => '2019-11-27 11:30:32',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1926,
            'language_id' => 1,
            'caption_id' => 1120,
            'caption_translation' => 'Stage',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:33',
            'updated_at' => '2019-11-27 11:30:33',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1927,
            'language_id' => 2,
            'caption_id' => 1120,
            'caption_translation' => 'Этап',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:34',
            'updated_at' => '2019-11-27 11:30:34',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1928,
            'language_id' => 1,
            'caption_id' => 1121,
            'caption_translation' => 'Lessee',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:35',
            'updated_at' => '2019-11-27 11:30:35',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1929,
            'language_id' => 2,
            'caption_id' => 1121,
            'caption_translation' => 'Лизингополучатель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:36',
            'updated_at' => '2019-11-27 11:30:36',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1930,
            'language_id' => 1,
            'caption_id' => 1122,
            'caption_translation' => 'Codes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:37',
            'updated_at' => '2019-11-27 11:30:37',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1931,
            'language_id' => 2,
            'caption_id' => 1122,
            'caption_translation' => 'Коды',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:38',
            'updated_at' => '2019-11-27 11:30:38',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1932,
            'language_id' => 1,
            'caption_id' => 1123,
            'caption_translation' => 'Contact data',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:39',
            'updated_at' => '2019-11-27 11:30:39',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1933,
            'language_id' => 2,
            'caption_id' => 1123,
            'caption_translation' => 'Контактные данные',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:40',
            'updated_at' => '2019-11-27 11:30:40',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1934,
            'language_id' => 1,
            'caption_id' => 413,
            'caption_translation' => 'Email',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:41',
            'updated_at' => '2019-11-27 11:30:41',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1935,
            'language_id' => 2,
            'caption_id' => 413,
            'caption_translation' => 'Почта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:42',
            'updated_at' => '2019-11-27 11:30:42',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1936,
            'language_id' => 1,
            'caption_id' => 1124,
            'caption_translation' => 'LS type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:43',
            'updated_at' => '2019-11-27 11:30:43',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1937,
            'language_id' => 2,
            'caption_id' => 1124,
            'caption_translation' => 'Вид ПЛ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:44',
            'updated_at' => '2019-11-27 11:30:44',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1938,
            'language_id' => 1,
            'caption_id' => 1125,
            'caption_translation' => 'LS brand',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1939,
            'language_id' => 2,
            'caption_id' => 1125,
            'caption_translation' => 'Марка ПЛ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1940,
            'language_id' => 1,
            'caption_id' => 1126,
            'caption_translation' => 'LS model',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1941,
            'language_id' => 2,
            'caption_id' => 1126,
            'caption_translation' => 'Модель ПЛ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1942,
            'language_id' => 1,
            'caption_id' => 1127,
            'caption_translation' => 'Supplier',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1943,
            'language_id' => 2,
            'caption_id' => 1127,
            'caption_translation' => 'Поставщик',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1944,
            'language_id' => 1,
            'caption_id' => 1128,
            'caption_translation' => 'Price',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1945,
            'language_id' => 2,
            'caption_id' => 1128,
            'caption_translation' => 'Цена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1946,
            'language_id' => 1,
            'caption_id' => 1129,
            'caption_translation' => 'Submit request for review',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1947,
            'language_id' => 2,
            'caption_id' => 1129,
            'caption_translation' => 'Отправить заявку на рассмотрение',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1948,
            'language_id' => 1,
            'caption_id' => 1130,
            'caption_translation' => 'Comments',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1949,
            'language_id' => 2,
            'caption_id' => 1130,
            'caption_translation' => 'Комментарии',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1950,
            'language_id' => 1,
            'caption_id' => 1131,
            'caption_translation' => 'Comment',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1951,
            'language_id' => 2,
            'caption_id' => 1131,
            'caption_translation' => 'Комментарий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1952,
            'language_id' => 1,
            'caption_id' => 1132,
            'caption_translation' => 'Author',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1953,
            'language_id' => 2,
            'caption_id' => 1132,
            'caption_translation' => 'Автор',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1954,
            'language_id' => 1,
            'caption_id' => 1133,
            'caption_translation' => 'Calculations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1955,
            'language_id' => 2,
            'caption_id' => 1133,
            'caption_translation' => 'Расчеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1956,
            'language_id' => 1,
            'caption_id' => 1134,
            'caption_translation' => '<h1>To get a payment schedule fill out the form <br> and click Apply</h1>',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1957,
            'language_id' => 2,
            'caption_id' => 1134,
            'caption_translation' => '<h1>Для получения графика платежей заполните параметры <br> и нажмите кнопку Применить</h1>',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1958,
            'language_id' => 1,
            'caption_id' => 1135,
            'caption_translation' => 'This calculation is not a public offer and does not oblige either party to enter into a transaction. <br> This calculation is preliminary and may differ from the final terms of the lease.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1959,
            'language_id' => 2,
            'caption_id' => 1135,
            'caption_translation' => 'Данный расчёт не является публичной офертой и не обязывает ни одну из сторон к заключению сделки. <br> Данный расчёт является предварительным и может отличаться от конечных условий в договоре лизинга.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1960,
            'language_id' => 1,
            'caption_id' => 1136,
            'caption_translation' => 'Leasing requests 6 steps',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1961,
            'language_id' => 2,
            'caption_id' => 1136,
            'caption_translation' => 'Заявки на лизинг 6 шагов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1962,
            'language_id' => 1,
            'caption_id' => 1137,
            'caption_translation' => 'Record access settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1963,
            'language_id' => 2,
            'caption_id' => 1137,
            'caption_translation' => 'Параметры доступа на уровне записи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1964,
            'language_id' => 1,
            'caption_id' => 1138,
            'caption_translation' => 'Questionnaire questions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1965,
            'language_id' => 2,
            'caption_id' => 1138,
            'caption_translation' => 'Наборы вопросов под анкету',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1966,
            'language_id' => 1,
            'caption_id' => 1139,
            'caption_translation' => 'Questionnaire templates',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1967,
            'language_id' => 2,
            'caption_id' => 1139,
            'caption_translation' => 'Шаблоны анкет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1968,
            'language_id' => 1,
            'caption_id' => 1140,
            'caption_translation' => 'Docuemnts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1969,
            'language_id' => 2,
            'caption_id' => 1140,
            'caption_translation' => 'Документы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1970,
            'language_id' => 1,
            'caption_id' => 1141,
            'caption_translation' => 'Question type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1971,
            'language_id' => 2,
            'caption_id' => 1141,
            'caption_translation' => 'Тип вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1972,
            'language_id' => 1,
            'caption_id' => 1142,
            'caption_translation' => 'Question answers options',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1973,
            'language_id' => 2,
            'caption_id' => 1142,
            'caption_translation' => 'Варианты ответов на вопрос',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1974,
            'language_id' => 1,
            'caption_id' => 1143,
            'caption_translation' => 'Select options from the directory',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1975,
            'language_id' => 2,
            'caption_id' => 1143,
            'caption_translation' => 'Выбрать варианты из справочника',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1976,
            'language_id' => 1,
            'caption_id' => 1144,
            'caption_translation' => 'Tabulat part',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1977,
            'language_id' => 2,
            'caption_id' => 1144,
            'caption_translation' => 'Табличная часть',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1978,
            'language_id' => 1,
            'caption_id' => 1145,
            'caption_translation' => 'Possible answer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1979,
            'language_id' => 2,
            'caption_id' => 1145,
            'caption_translation' => 'Вариант ответа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1980,
            'language_id' => 1,
            'caption_id' => 1146,
            'caption_translation' => 'Question name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1981,
            'language_id' => 2,
            'caption_id' => 1146,
            'caption_translation' => 'Название вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1982,
            'language_id' => 1,
            'caption_id' => 1147,
            'caption_translation' => 'Question code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1983,
            'language_id' => 2,
            'caption_id' => 1147,
            'caption_translation' => 'Код вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1984,
            'language_id' => 1,
            'caption_id' => 1148,
            'caption_translation' => 'Question width',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1985,
            'language_id' => 2,
            'caption_id' => 1148,
            'caption_translation' => 'Ширина вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1986,
            'language_id' => 1,
            'caption_id' => 1149,
            'caption_translation' => 'Required',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1987,
            'language_id' => 2,
            'caption_id' => 1149,
            'caption_translation' => 'Обязательность',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1988,
            'language_id' => 1,
            'caption_id' => 1150,
            'caption_translation' => 'Table columns',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1989,
            'language_id' => 2,
            'caption_id' => 1150,
            'caption_translation' => 'Столбцы таблицы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1990,
            'language_id' => 1,
            'caption_id' => 1151,
            'caption_translation' => 'Access settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1991,
            'language_id' => 2,
            'caption_id' => 1151,
            'caption_translation' => 'Настройки доступов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        \App\Models\TranslationCaption::create([
            'id' => 1992,
            'language_id' => 1,
            'caption_id' => 1152,
            'caption_translation' => 'Validation rules',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        \App\Models\TranslationCaption::create([
            'id' => 1993,
            'language_id' => 2,
            'caption_id' => 1152,
            'caption_translation' => 'Правила валидации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1994,
            'language_id' => 1,
            'caption_id' => 1153,
            'caption_translation' => 'Questionnaire templates settings',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1995,
            'language_id' => 2,
            'caption_id' => 1153,
            'caption_translation' => 'Настройки шаблонов анкет',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1996,
            'language_id' => 1,
            'caption_id' => 1154,
            'caption_translation' => 'QT Question Types',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1997,
            'language_id' => 2,
            'caption_id' => 1154,
            'caption_translation' => 'Типы вопросов для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1998,
            'language_id' => 1,
            'caption_id' => 1155,
            'caption_translation' => 'QT Question Type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 1999,
            'language_id' => 2,
            'caption_id' => 1155,
            'caption_translation' => 'Тип вопроса для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2000,
            'language_id' => 1,
            'caption_id' => 1156,
            'caption_translation' => 'Header',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2001,
            'language_id' => 2,
            'caption_id' => 1156,
            'caption_translation' => 'Верхний колонтитул',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2002,
            'language_id' => 1,
            'caption_id' => 1157,
            'caption_translation' => 'Footer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2003,
            'language_id' => 2,
            'caption_id' => 1157,
            'caption_translation' => 'Нижний колонтитул',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2004,
            'language_id' => 1,
            'caption_id' => 1158,
            'caption_translation' => 'Selection from the directory',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2005,
            'language_id' => 2,
            'caption_id' => 1158,
            'caption_translation' => 'Выбор из справочника',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2006,
            'language_id' => 1,
            'caption_id' => 1159,
            'caption_translation' => 'QT Questions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2007,
            'language_id' => 2,
            'caption_id' => 1159,
            'caption_translation' => 'Вопросы для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2008,
            'language_id' => 1,
            'caption_id' => 1160,
            'caption_translation' => 'QT Question',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2009,
            'language_id' => 2,
            'caption_id' => 1160,
            'caption_translation' => 'Вопрос для Шаблона Анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2010,
            'language_id' => 1,
            'caption_id' => 1161,
            'caption_translation' => 'Question kind',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2011,
            'language_id' => 2,
            'caption_id' => 1161,
            'caption_translation' => 'Вид вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2012,
            'language_id' => 1,
            'caption_id' => 1162,
            'caption_translation' => 'Access Role Name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2013,
            'language_id' => 2,
            'caption_id' => 1162,
            'caption_translation' => 'Имя Роли Доступа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2014,
            'language_id' => 1,
            'caption_id' => 1163,
            'caption_translation' => 'Question set name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2015,
            'language_id' => 2,
            'caption_id' => 1163,
            'caption_translation' => 'Имя набора',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2016,
            'language_id' => 1,
            'caption_id' => 1164,
            'caption_translation' => 'Access Role Code',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2017,
            'language_id' => 2,
            'caption_id' => 1164,
            'caption_translation' => 'Код Доступа Роли',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2018,
            'language_id' => 1,
            'caption_id' => 1165,
            'caption_translation' => 'Element',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2019,
            'language_id' => 2,
            'caption_id' => 1165,
            'caption_translation' => 'Элемент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2020,
            'language_id' => 1,
            'caption_id' => 1166,
            'caption_translation' => 'Scenario',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2021,
            'language_id' => 2,
            'caption_id' => 1166,
            'caption_translation' => 'Сценарий',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2022,
            'language_id' => 1,
            'caption_id' => 1167,
            'caption_translation' => 'Questionnaire question',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2023,
            'language_id' => 2,
            'caption_id' => 1167,
            'caption_translation' => 'Вопрос анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2024,
            'language_id' => 1,
            'caption_id' => 1138,
            'caption_translation' => 'Questionnaire questions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2025,
            'language_id' => 2,
            'caption_id' => 1138,
            'caption_translation' => 'Вопросы анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2026,
            'language_id' => 1,
            'caption_id' => 1169,
            'caption_translation' => 'Questionnaire template',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2027,
            'language_id' => 2,
            'caption_id' => 1169,
            'caption_translation' => 'Шаблон анкеты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2028,
            'language_id' => 1,
            'caption_id' => 1170,
            'caption_translation' => 'Payment method',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2029,
            'language_id' => 2,
            'caption_id' => 1170,
            'caption_translation' => 'Способ оплаты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2030,
            'language_id' => 1,
            'caption_id' => 1171,
            'caption_translation' => 'Payment method group',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2031,
            'language_id' => 2,
            'caption_id' => 1171,
            'caption_translation' => 'Группа способа оплаты',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2032,
            'language_id' => 1,
            'caption_id' => 1172,
            'caption_translation' => 'Currencies (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2033,
            'language_id' => 2,
            'caption_id' => 1172,
            'caption_translation' => 'Валюты (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2034,
            'language_id' => 1,
            'caption_id' => 1173,
            'caption_translation' => 'Payment method groups (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2035,
            'language_id' => 2,
            'caption_id' => 1173,
            'caption_translation' => 'Группы направлений ввода/вывода (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2036,
            'language_id' => 1,
            'caption_id' => 1174,
            'caption_translation' => 'Position',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2037,
            'language_id' => 2,
            'caption_id' => 1174,
            'caption_translation' => 'Позиция',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2038,
            'language_id' => 1,
            'caption_id' => 1175,
            'caption_translation' => 'Payment methods (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2039,
            'language_id' => 2,
            'caption_id' => 1175,
            'caption_translation' => 'Методы/способы оплат (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2040,
            'language_id' => 1,
            'caption_id' => 1176,
            'caption_translation' => 'Exchangers (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2041,
            'language_id' => 2,
            'caption_id' => 1176,
            'caption_translation' => 'Обменники (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2042,
            'language_id' => 1,
            'caption_id' => 1177,
            'caption_translation' => 'Exchanger',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2043,
            'language_id' => 2,
            'caption_id' => 1177,
            'caption_translation' => 'Обменник',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2044,
            'language_id' => 1,
            'caption_id' => 1178,
            'caption_translation' => 'Rating',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2045,
            'language_id' => 2,
            'caption_id' => 1178,
            'caption_translation' => 'Рейтинг',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2046,
            'language_id' => 1,
            'caption_id' => 1179,
            'caption_translation' => 'Exchange directions (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2047,
            'language_id' => 2,
            'caption_id' => 1179,
            'caption_translation' => 'Направления обмена (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2048,
            'language_id' => 1,
            'caption_id' => 1180,
            'caption_translation' => 'Exchange offers (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2049,
            'language_id' => 2,
            'caption_id' => 1180,
            'caption_translation' => 'Объявления обмена (BankNet)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2050,
            'language_id' => 1,
            'caption_id' => 1181,
            'caption_translation' => 'Give',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2051,
            'language_id' => 2,
            'caption_id' => 1181,
            'caption_translation' => 'Отдаете',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2052,
            'language_id' => 1,
            'caption_id' => 1182,
            'caption_translation' => 'Get',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2053,
            'language_id' => 2,
            'caption_id' => 1182,
            'caption_translation' => 'Получаете',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2054,
            'language_id' => 1,
            'caption_id' => 1183,
            'caption_translation' => 'to',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2055,
            'language_id' => 2,
            'caption_id' => 1183,
            'caption_translation' => 'до',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2056,
            'language_id' => 1,
            'caption_id' => 1184,
            'caption_translation' => '% transaction security',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2057,
            'language_id' => 2,
            'caption_id' => 1184,
            'caption_translation' => '% обеспечения сделки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2058,
            'language_id' => 1,
            'caption_id' => 1185,
            'caption_translation' => 'Block position',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2059,
            'language_id' => 2,
            'caption_id' => 1185,
            'caption_translation' => 'Расположение блока',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2060,
            'language_id' => 1,
            'caption_id' => 1186,
            'caption_translation' => 'Set position',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2061,
            'language_id' => 2,
            'caption_id' => 1186,
            'caption_translation' => 'Расположение набора',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2062,
            'language_id' => 1,
            'caption_id' => 1187,
            'caption_translation' => 'Question position',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2063,
            'language_id' => 2,
            'caption_id' => 1187,
            'caption_translation' => 'Расположение вопроса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2064,
            'language_id' => 1,
            'caption_id' => 1188,
            'caption_translation' => 'Validations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2065,
            'language_id' => 2,
            'caption_id' => 1188,
            'caption_translation' => 'Валидации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2066,
            'language_id' => 1,
            'caption_id' => 1189,
            'caption_translation' => 'Validation rules',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2067,
            'language_id' => 2,
            'caption_id' => 1189,
            'caption_translation' => 'Правила валидаций',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2068,
            'language_id' => 1,
            'caption_id' => 1190,
            'caption_translation' => 'Validation',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2069,
            'language_id' => 2,
            'caption_id' => 1190,
            'caption_translation' => 'Валидация',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2070,
            'language_id' => 1,
            'caption_id' => 1191,
            'caption_translation' => 'Validation rule',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2071,
            'language_id' => 2,
            'caption_id' => 1191,
            'caption_translation' => 'Правило валидации',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2072,
            'language_id' => 1,
            'caption_id' => 1192,
            'caption_translation' => 'Rule name',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2073,
            'language_id' => 2,
            'caption_id' => 1192,
            'caption_translation' => 'Наименование правила',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2074,
            'language_id' => 1,
            'caption_id' => 1193,
            'caption_translation' => 'Table',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2075,
            'language_id' => 2,
            'caption_id' => 1193,
            'caption_translation' => 'Таблица',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2076,
            'language_id' => 1,
            'caption_id' => 1194,
            'caption_translation' => 'List',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2077,
            'language_id' => 2,
            'caption_id' => 1194,
            'caption_translation' => 'Список',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2078,
            'language_id' => 1,
            'caption_id' => 1195,
            'caption_translation' => 'Give',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2079,
            'language_id' => 2,
            'caption_id' => 1195,
            'caption_translation' => 'Отдадите',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2080,
            'language_id' => 1,
            'caption_id' => 1196,
            'caption_translation' => 'Get',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2081,
            'language_id' => 2,
            'caption_id' => 1196,
            'caption_translation' => 'Получите',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2082,
            'language_id' => 1,
            'caption_id' => 1197,
            'caption_translation' => 'Feedback form',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2083,
            'language_id' => 2,
            'caption_id' => 1197,
            'caption_translation' => 'Форма обратной связи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2084,
            'language_id' => 1,
            'caption_id' => 1198,
            'caption_translation' => 'Use this form if you want to ask us a question or inform us about a problem or a bug. Please make your message as detailed as possible. It will help us solve the problem much faster. Remember that we will not be able to reply to you if you specify an invalid e-mail address.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2085,
            'language_id' => 2,
            'caption_id' => 1198,
            'caption_translation' => 'Используйте эту форму, если вы хотите задать нам вопрос, или сообщить о проблеме или ошибке. Пожалуйста, делайте ваше сообщение как можно более детализированным, это поможет нам решить проблему намного быстрее. Помните, если ваш e-mail адрес неправилен, мы не сможем вам ответить.',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2086,
            'language_id' => 1,
            'caption_id' => 1199,
            'caption_translation' => 'Your name:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2087,
            'language_id' => 2,
            'caption_id' => 1199,
            'caption_translation' => 'Ваше имя:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2088,
            'language_id' => 1,
            'caption_id' => 1200,
            'caption_translation' => 'Your e-mail:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2089,
            'language_id' => 2,
            'caption_id' => 1200,
            'caption_translation' => 'Ваш e-mail:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2090,
            'language_id' => 1,
            'caption_id' => 1201,
            'caption_translation' => 'Comments:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2091,
            'language_id' => 2,
            'caption_id' => 1201,
            'caption_translation' => 'Сообщение:',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2092,
            'language_id' => 1,
            'caption_id' => 1202,
            'caption_translation' => 'Submit',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2093,
            'language_id' => 2,
            'caption_id' => 1202,
            'caption_translation' => 'Отправить',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2094,
            'language_id' => 1,
            'caption_id' => 1203,
            'caption_translation' => 'Exchangers',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2095,
            'language_id' => 2,
            'caption_id' => 1203,
            'caption_translation' => 'Обменники',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2096,
            'language_id' => 1,
            'caption_id' => 1204,
            'caption_translation' => 'Site map',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2097,
            'language_id' => 2,
            'caption_id' => 1204,
            'caption_translation' => 'Карта сайта',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        \App\Models\TranslationCaption::create([
            'id' => 2098,
            'language_id' => 1,
            'caption_id' => 1205,
            'caption_translation' => 'Login as user',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);

        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2099,
            'language_id' => 2,
            'caption_id' => 1205,
            'caption_translation' => 'Войти под пользователем ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2100,
            'language_id' => 1,
            'caption_id' => 1206,
            'caption_translation' => 'Users',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2101,
            'language_id' => 2,
            'caption_id' => 1206,
            'caption_translation' => 'Пользователи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2102,
            'language_id' => 1,
            'caption_id' => 1207,
            'caption_translation' => 'Setting calculations',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2103,
            'language_id' => 2,
            'caption_id' => 1207,
            'caption_translation' => 'Настрока расчетов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2104,
            'language_id' => 1,
            'caption_id' => 1208,
            'caption_translation' => 'Payments under the lease contracts',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2105,
            'language_id' => 2,
            'caption_id' => 1208,
            'caption_translation' => 'Платежи по договорам лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2106,
            'language_id' => 1,
            'caption_id' => 1209,
            'caption_translation' => 'Payments under the lease contract',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2107,
            'language_id' => 2,
            'caption_id' => 1209,
            'caption_translation' => 'Платежи по договору лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2108,
            'language_id' => 1,
            'caption_id' => 1210,
            'caption_translation' => 'User login',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2109,
            'language_id' => 2,
            'caption_id' => 1210,
            'caption_translation' => 'Вход под пользователем',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2112,
            'language_id' => 1,
            'caption_id' => 1212,
            'caption_translation' => 'To pay',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2113,
            'language_id' => 2,
            'caption_id' => 1212,
            'caption_translation' => 'К оплате',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2114,
            'language_id' => 1,
            'caption_id' => 1213,
            'caption_translation' => 'Exchange statistics',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2115,
            'language_id' => 2,
            'caption_id' => 1213,
            'caption_translation' => 'Статистика обмена',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2116,
            'language_id' => 1,
            'caption_id' => 1214,
            'caption_translation' => 'today',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2117,
            'language_id' => 2,
            'caption_id' => 1214,
            'caption_translation' => 'за сегодня',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2118,
            'language_id' => 1,
            'caption_id' => 1215,
            'caption_translation' => 'this week',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2119,
            'language_id' => 2,
            'caption_id' => 1215,
            'caption_translation' => 'за неделю',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2120,
            'language_id' => 1,
            'caption_id' => 1216,
            'caption_translation' => 'this month',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2121,
            'language_id' => 2,
            'caption_id' => 1216,
            'caption_translation' => 'за месяц',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2122,
            'language_id' => 1,
            'caption_id' => 1217,
            'caption_translation' => 'Favorites',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2123,
            'language_id' => 2,
            'caption_id' => 1217,
            'caption_translation' => 'Избранные',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2124,
            'language_id' => 1,
            'caption_id' => 1218,
            'caption_translation' => 'Attendance statistics',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2125,
            'language_id' => 2,
            'caption_id' => 1218,
            'caption_translation' => 'Статистика посещений',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2126,
            'language_id' => 1,
            'caption_id' => 1219,
            'caption_translation' => 'Number of users',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2127,
            'language_id' => 2,
            'caption_id' => 1219,
            'caption_translation' => 'Количество пользователей',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2128,
            'language_id' => 1,
            'caption_id' => 1220,
            'caption_translation' => 'Advance currency',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2129,
            'language_id' => 2,
            'caption_id' => 1220,
            'caption_translation' => 'Валюта аванса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2130,
            'language_id' => 1,
            'caption_id' => 1221,
            'caption_translation' => 'Leasing contract currency',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2131,
            'language_id' => 2,
            'caption_id' => 1221,
            'caption_translation' => 'Валюта ДЛ',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2132,
            'language_id' => 1,
            'caption_id' => 1222,
            'caption_translation' => 'Leasing subject currency',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2133,
            'language_id' => 2,
            'caption_id' => 1222,
            'caption_translation' => 'Валюта имущества',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2134,
            'language_id' => 1,
            'caption_id' => 1223,
            'caption_translation' => 'Financing currency',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2135,
            'language_id' => 2,
            'caption_id' => 1223,
            'caption_translation' => 'Валюта финансировния',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2136,
            'language_id' => 1,
            'caption_id' => 744,
            'caption_translation' => 'Insurance option',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2137,
            'language_id' => 2,
            'caption_id' => 744,
            'caption_translation' => 'Вариант страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2138,
            'language_id' => 1,
            'caption_id' => 1225,
            'caption_translation' => 'State duty',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2139,
            'language_id' => 2,
            'caption_id' => 1225,
            'caption_translation' => 'Госпошлина',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2140,
            'language_id' => 1,
            'caption_id' => 1226,
            'caption_translation' => 'Leasing contract date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2141,
            'language_id' => 2,
            'caption_id' => 1226,
            'caption_translation' => 'Дата договора лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2142,
            'language_id' => 1,
            'caption_id' => 1227,
            'caption_translation' => 'Leasing start date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2143,
            'language_id' => 2,
            'caption_id' => 1227,
            'caption_translation' => 'Дата начала лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2144,
            'language_id' => 1,
            'caption_id' => 1228,
            'caption_translation' => 'First payment date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2145,
            'language_id' => 2,
            'caption_id' => 1228,
            'caption_translation' => 'Дата первого платежа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2146,
            'language_id' => 1,
            'caption_id' => 1229,
            'caption_translation' => 'Is agent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2147,
            'language_id' => 2,
            'caption_id' => 1229,
            'caption_translation' => 'Есть агент',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2148,
            'language_id' => 1,
            'caption_id' => 1230,
            'caption_translation' => 'Are costs for the tracker',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2149,
            'language_id' => 2,
            'caption_id' => 1230,
            'caption_translation' => 'Есть расходы на трекер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2150,
            'language_id' => 1,
            'caption_id' => 1231,
            'caption_translation' => 'Is subsidy',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2151,
            'language_id' => 2,
            'caption_id' => 1231,
            'caption_translation' => 'Есть субсидия',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2152,
            'language_id' => 1,
            'caption_id' => 1232,
            'caption_translation' => 'Is franchise',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2153,
            'language_id' => 2,
            'caption_id' => 1232,
            'caption_translation' => 'Есть франшиза',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2154,
            'language_id' => 1,
            'caption_id' => 1233,
            'caption_translation' => 'Leasing subject on lessee balance',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2155,
            'language_id' => 2,
            'caption_id' => 1233,
            'caption_translation' => 'Имущество на балансе лизингодателя',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2156,
            'language_id' => 1,
            'caption_id' => 1234,
            'caption_translation' => 'Total VAT on advance',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2157,
            'language_id' => 2,
            'caption_id' => 1234,
            'caption_translation' => 'Итог НДС на аванс',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2158,
            'language_id' => 1,
            'caption_id' => 1235,
            'caption_translation' => 'Leasing rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2159,
            'language_id' => 2,
            'caption_id' => 1235,
            'caption_translation' => 'Лизинговая ставка',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2160,
            'language_id' => 1,
            'caption_id' => 1236,
            'caption_translation' => 'Advance percent',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2161,
            'language_id' => 2,
            'caption_id' => 1236,
            'caption_translation' => 'Процент аванса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2162,
            'language_id' => 1,
            'caption_id' => 1237,
            'caption_translation' => 'Registration costs',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2163,
            'language_id' => 2,
            'caption_id' => 1237,
            'caption_translation' => 'Расходы на регистрацию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2164,
            'language_id' => 1,
            'caption_id' => 1238,
            'caption_translation' => 'Leasing contract expire date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2165,
            'language_id' => 2,
            'caption_id' => 1238,
            'caption_translation' => 'Срок лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2166,
            'language_id' => 1,
            'caption_id' => 1239,
            'caption_translation' => 'DCT supply expire date',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2167,
            'language_id' => 2,
            'caption_id' => 1239,
            'caption_translation' => 'Срок поставки по ДКП',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2168,
            'language_id' => 1,
            'caption_id' => 1240,
            'caption_translation' => 'Agent rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2169,
            'language_id' => 2,
            'caption_id' => 1240,
            'caption_translation' => 'Ставка агента',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2170,
            'language_id' => 1,
            'caption_id' => 1241,
            'caption_translation' => 'Lending rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2171,
            'language_id' => 2,
            'caption_id' => 1241,
            'caption_translation' => 'Ставка кредитования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2172,
            'language_id' => 1,
            'caption_id' => 1242,
            'caption_translation' => 'Margin rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2173,
            'language_id' => 2,
            'caption_id' => 1242,
            'caption_translation' => 'Ставка маржи',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2174,
            'language_id' => 1,
            'caption_id' => 1243,
            'caption_translation' => 'Supply VAT rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2175,
            'language_id' => 2,
            'caption_id' => 1243,
            'caption_translation' => 'Ставка НДС поставки',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2176,
            'language_id' => 1,
            'caption_id' => 1244,
            'caption_translation' => 'Calculation VAT rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2177,
            'language_id' => 2,
            'caption_id' => 1244,
            'caption_translation' => 'Ставка НДС расчета',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2178,
            'language_id' => 1,
            'caption_id' => 1245,
            'caption_translation' => 'Insurance rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2179,
            'language_id' => 2,
            'caption_id' => 1245,
            'caption_translation' => 'Ставка страхования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2180,
            'language_id' => 1,
            'caption_id' => 1246,
            'caption_translation' => 'Appreciation rate',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2181,
            'language_id' => 2,
            'caption_id' => 1246,
            'caption_translation' => 'Ставка удорожания',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2182,
            'language_id' => 1,
            'caption_id' => 1247,
            'caption_translation' => 'Leasing subject cost',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2183,
            'language_id' => 2,
            'caption_id' => 1247,
            'caption_translation' => 'Стоимость имущества',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2184,
            'language_id' => 1,
            'caption_id' => 1248,
            'caption_translation' => 'CASCO cost',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2185,
            'language_id' => 2,
            'caption_id' => 1248,
            'caption_translation' => 'Стоимость КАСКО',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2186,
            'language_id' => 1,
            'caption_id' => 1249,
            'caption_translation' => 'State registration party lessee',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2187,
            'language_id' => 2,
            'caption_id' => 1249,
            'caption_translation' => 'Сторона гос регистрации лизингодатель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2188,
            'language_id' => 1,
            'caption_id' => 1250,
            'caption_translation' => 'Insurance company (name)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2189,
            'language_id' => 2,
            'caption_id' => 1250,
            'caption_translation' => 'Страховая компания (наименование)',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2190,
            'language_id' => 1,
            'caption_id' => 1251,
            'caption_translation' => 'Insures lessee',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2191,
            'language_id' => 2,
            'caption_id' => 1251,
            'caption_translation' => 'Страхует лизингодатель',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2192,
            'language_id' => 1,
            'caption_id' => 1252,
            'caption_translation' => 'Advance amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2193,
            'language_id' => 2,
            'caption_id' => 1252,
            'caption_translation' => 'Сумма аванса',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2194,
            'language_id' => 1,
            'caption_id' => 1253,
            'caption_translation' => 'Agent fee',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2195,
            'language_id' => 2,
            'caption_id' => 1253,
            'caption_translation' => 'Сумма агентского вознаграждения',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2196,
            'language_id' => 1,
            'caption_id' => 1254,
            'caption_translation' => 'Leasing contract amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2197,
            'language_id' => 2,
            'caption_id' => 1254,
            'caption_translation' => 'Сумма договора лизинга',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2198,
            'language_id' => 1,
            'caption_id' => 1255,
            'caption_translation' => 'Leasing subject tax sum',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2199,
            'language_id' => 2,
            'caption_id' => 1255,
            'caption_translation' => 'Сумма налога на имущество',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2200,
            'language_id' => 1,
            'caption_id' => 1256,
            'caption_translation' => 'Tracker expenses',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2201,
            'language_id' => 2,
            'caption_id' => 1256,
            'caption_translation' => 'Сумма расходов на трекер',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2202,
            'language_id' => 1,
            'caption_id' => 1257,
            'caption_translation' => 'Subsidy amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2203,
            'language_id' => 2,
            'caption_id' => 1257,
            'caption_translation' => 'Сумма субсидии',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2204,
            'language_id' => 1,
            'caption_id' => 1258,
            'caption_translation' => 'Financing amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2205,
            'language_id' => 2,
            'caption_id' => 1258,
            'caption_translation' => 'Сумма финансирования',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2206,
            'language_id' => 1,
            'caption_id' => 1259,
            'caption_translation' => 'Franchise amount',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2207,
            'language_id' => 2,
            'caption_id' => 1259,
            'caption_translation' => 'Сумма франшизы',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2208,
            'language_id' => 1,
            'caption_id' => 1260,
            'caption_translation' => 'Payment type',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2209,
            'language_id' => 2,
            'caption_id' => 1260,
            'caption_translation' => 'Тип платежа',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2210,
            'language_id' => 1,
            'caption_id' => 1261,
            'caption_translation' => 'Transport tax',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2211,
            'language_id' => 2,
            'caption_id' => 1261,
            'caption_translation' => 'Транспортный налог',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2212,
            'language_id' => 1,
            'caption_id' => 1262,
            'caption_translation' => 'Account VAT rate changes',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        /**/
        \App\Models\TranslationCaption::create([
            'id' => 2213,
            'language_id' => 2,
            'caption_id' => 1262,
            'caption_translation' => 'Учитывать изменение ставки НДС',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-11-27 11:30:45',
            'updated_at' => '2019-11-27 11:30:45',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"_TranslationCaptions_id_seq\"', 5000, true)");
        }
    }
}
