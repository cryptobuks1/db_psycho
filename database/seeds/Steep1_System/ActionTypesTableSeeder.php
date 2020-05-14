<?php

use Illuminate\Database\Seeder;

class ActionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ActionType::truncate();

        /**/
        \App\Models\ActionType::create([
            'id' => 1,
            'action_type_code' => 'read',
            'action_type_name' => 'Access for Read',
            'action_type_remark' => 'Доступ на Чтение',
            'access_right_id' => 1,
            'caption_code' => 'read',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 2,
            'action_type_code' => 'insert',
            'action_type_name' => 'Access for Insert',
            'action_type_remark' => 'Доступ на Добавление',
            'access_right_id' => 3,
            'caption_code' => 'insert',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 3,
            'action_type_code' => 'delete',
            'action_type_name' => 'Access for Delete',
            'action_type_remark' => 'Доступ на Удаление',
            'access_right_id' => 5,
            'caption_code' => 'delete',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 4,
            'action_type_code' => 'update',
            'action_type_name' => 'Access for Update',
            'action_type_remark' => 'Доступ на Изменение',
            'access_right_id' => 4,
            'caption_code' => 'update',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 5,
            'action_type_code' => 'card',
            'action_type_name' => 'Access for Card',
            'action_type_remark' => 'Доступ на Карточку',
            'access_right_id' => 1,
            'caption_code' => 'card',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 6,
            'action_type_code' => 'list',
            'action_type_name' => 'Access for List',
            'action_type_remark' => 'Доступ на Список',
            'access_right_id' => 1,
            'caption_code' => 'list',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 7,
            'action_type_code' => 'index',
            'action_type_name' => 'Access for Index',
            'action_type_remark' => 'Доступ на Чтение',
            'access_right_id' => 1,
            'caption_code' => 'index',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 8,
            'action_type_code' => 'write',
            'action_type_name' => 'Access for Write',
            'action_type_remark' => 'Доступ на Запись',
            'access_right_id' => 2,
            'caption_code' => 'write',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 9,
            'action_type_code' => 'selectOptions',
            'action_type_name' => 'Access for Select Options',
            'action_type_remark' => 'Доступ на Выбор элемента в списке',
            'access_right_id' => 1,
            'caption_code' => 'selectOptions',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 10,
            'action_type_code' => 'deleteMark',
            'action_type_name' => 'Access for Delete Mark',
            'action_type_remark' => 'Доступ на Пометку на удаление',
            'access_right_id' => 6,
            'caption_code' => 'deleteMark',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 11,
            'action_type_code' => 'show',
            'action_type_name' => 'Access for Show',
            'action_type_remark' => 'Доступ на Показ',
            'access_right_id' => 1,
            'caption_code' => 'show',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 12,
            'action_type_code' => 'filter',
            'action_type_name' => 'Access for Filter',
            'action_type_remark' => 'Доступ на кнопку фильтр в списке',
            'access_right_id' => 12,
            'caption_code' => 'Filter',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 13,
            'action_type_code' => 'switchLanguage',
            'action_type_name' => 'Смена языка',
            'action_type_remark' => 'Производит смену языка интерфейса',
            'access_right_id' => 1,
            'caption_code' => 'switchLanguage',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 14,
            'action_type_code' => 'getFields',
            'action_type_name' => 'getFields',
            'action_type_remark' => 'Получить новый перечень полей карточки ',
            'access_right_id' => 1,
            'caption_code' => 'getFields',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        /**/
        \App\Models\ActionType::create([
            'id' => 15,
            'action_type_code' => 'sendRequest',
            'action_type_name' => 'sendRequest',
            'action_type_remark' => 'Оправлять Запрос контрагента',
            'access_right_id' => 10,
            'caption_code' => 'sendRequest',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 20,
            'action_type_code' => 'questionnairePreview',
            'action_type_name' => 'questionnairePreview',
            'action_type_remark' => 'Предварительный просмотр анкеты',
            'access_right_id' => 1,
            'caption_code' => 'questionnairePreview',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 21,
            'action_type_code' => 'testConnection',
            'action_type_name' => 'Test Connection',
            'action_type_remark' => 'Проверка соединения с внешним источником данных',
            'access_right_id' => 2,
            'caption_code' => 'testConnection',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 24,
            'action_type_code' => 'tree',
            'action_type_name' => 'tree',
            'action_type_remark' => '',
            'access_right_id' => 1,
            'caption_code' => 'tree',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 25,
            'action_type_code' => 'handleSendMail',
            'action_type_name' => 'handleSendMail',
            'action_type_remark' => 'Отправка письма на подтверждение регистрации',
            'access_right_id' => 1,
            'caption_code' => 'handleSendMail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        /**/
        \App\Models\ActionType::create([
            'id' => 26,
            'action_type_code' => 'singIn',
            'action_type_name' => 'Sing in',
            'action_type_remark' => 'Вход в систему. Технический тип действия',
            'access_right_id' => NULL,
            'caption_code' => 'singIn',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 27,
            'action_type_code' => 'changeEmail',
            'action_type_name' => 'change Email',
            'action_type_remark' => 'Процедура смены почты пользователя',
            'access_right_id' => 2,
            'caption_code' => 'changeEmail',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 28,
            'action_type_code' => 'deleteAll',
            'action_type_name' => 'deleteAll',
            'action_type_remark' => 'Удалить все записи',
            'access_right_id' => 5,
            'caption_code' => 'deleteAll',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 29,
            'action_type_code' => 'getBreadcrumbs',
            'action_type_name' => 'getBreadcrumbs',
            'action_type_remark' => 'Получение хлебных крошек',
            'access_right_id' => 1,
            'caption_code' => 'getBreadcrumbs',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 30,
            'action_type_code' => 'getRequest',
            'action_type_name' => 'getRequest',
            'action_type_remark' => 'Отправлять запросы',
            'access_right_id' => 10,
            'caption_code' => 'getRequest',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 31,
            'action_type_code' => 'record',
            'action_type_name' => 'record',
            'action_type_remark' => '',
            'access_right_id' => 2,
            'caption_code' => 'record',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 32,
            'action_type_code' => 'download',
            'action_type_name' => 'Скачивание',
            'action_type_remark' => 'Скачивание файлов',
            'access_right_id' => 7,
            'caption_code' => 'download',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 33,
            'action_type_code' => 'upload',
            'action_type_name' => 'Загрузки',
            'action_type_remark' => 'Загрузки файлов',
            'access_right_id' => 8,
            'caption_code' => 'upload',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 34,
            'action_type_code' => 'unDeleteMark',
            'action_type_name' => 'Снять пометку удаления ',
            'action_type_remark' => 'Снять пометку удаления ',
            'access_right_id' => 6,
            'caption_code' => 'unDeleteMark',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 35,
            'action_type_code' => 'actual',
            'action_type_name' => 'Установить актуальность',
            'action_type_remark' => 'Установить актуальность',
            'access_right_id' => 9,
            'caption_code' => 'actual',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 36,
            'action_type_code' => 'unActual',
            'action_type_name' => 'Снять актуальность',
            'action_type_remark' => 'Снять актуальность',
            'access_right_id' => 9,
            'caption_code' => 'unActual',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 37,
            'action_type_code' => 'getAnswer',
            'action_type_name' => 'Получить статью',
            'action_type_remark' => 'Получить статью в справке',
            'access_right_id' => 1,
            'caption_code' => 'getAnswer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 38,
            'action_type_code' => 'getAllAnswer',
            'action_type_name' => 'Получить все статьи',
            'action_type_remark' => 'Получить все статьи в справке',
            'access_right_id' => 1,
            'caption_code' => 'getAllAnswer',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:51',
            'updated_at' => '2019-04-05 6:36:51',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 39,
            'action_type_code' => 'closeStep',
            'action_type_name' => 'Закрыть шаг',
            'action_type_remark' => 'Закрыть шаг',
            'access_right_id' => 1,
            'caption_code' => 'closeStep',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 40,
            'action_type_code' => 'rollbackStep',
            'action_type_name' => 'Откатиться шаг',
            'action_type_remark' => 'Откатиться шаг',
            'access_right_id' => 1,
            'caption_code' => 'rollbackStep',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 41,
            'action_type_code' => 'changePassword',
            'action_type_name' => 'Смена пароля',
            'action_type_remark' => 'Процедура смены пароля пользователя',
            'access_right_id' => 2,
            'caption_code' => 'changePassword',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 42,
            'action_type_code' => 'requestCard',
            'action_type_name' => 'Access for  request Card',
            'action_type_remark' => 'Доступ на Карточку Запроса в 1С',
            'access_right_id' => 10,
            'caption_code' => 'requestCard',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 43,
            'action_type_code' => 'getDocuments',
            'action_type_name' => 'Access for get Documents',
            'action_type_remark' => 'Получить документы из 1С',
            'access_right_id' => 10,
            'caption_code' => 'getDocuments',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 44,
            'action_type_code' => 'setPassword',
            'action_type_name' => 'Access for setPassword',
            'action_type_remark' => 'Процедура установки нового пароля',
            'access_right_id' => 2,
            'caption_code' => 'setPassword',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-21 6:36:52',
            'updated_at' => '2019-04-05 6:36:52',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 45,
            'action_type_code' => 'ExchangeIn',
            'action_type_name' => 'Входящий',
            'action_type_remark' => 'Обмен данных В систему. Технический тип действия',
            'access_right_id' => 11,
            'caption_code' => 'ExchangeIn',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:00:00',
            'updated_at' => '2019-08-13 16:00:00',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 46,
            'action_type_code' => 'ExchangeOut',
            'action_type_name' => 'Исходящий',
            'action_type_remark' => 'Обмен данных ИЗ системы. Технический тип действия',
            'access_right_id' => 11,
            'caption_code' => 'ExchangeOut',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:00:00',
            'updated_at' => '2019-08-13 16:00:00',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 47,
            'action_type_code' => 'statisticFinish',
            'action_type_name' => 'Возвращает статистику посещений',
            'action_type_remark' => 'Возвращает статистику посещений',
            'access_right_id' => 1,
            'caption_code' => 'statisticFinish',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:00:00',
            'updated_at' => '2019-08-13 16:00:00',
        ]);

        /**/
        \App\Models\ActionType::create([
            'id' => 48,
            'action_type_code' => 'getVerificationInputs',
            'action_type_name' => 'Возвращает поля верификации',
            'action_type_remark' => 'Возвращает поля верификации',
            'access_right_id' => 1,
            'caption_code' => 'getVerificationInputs',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:00:00',
            'updated_at' => '2019-08-13 16:00:00',
        ]);


        /**/
        \App\Models\ActionType::create([
            'id' => 49,
            'action_type_code' => 'changesStage',
            'action_type_name' => 'Изменение этапа в обращении',
            'action_type_remark' => 'Изменение этапа в обращении',
            'access_right_id' => 1,
            'caption_code' => 'changesStage',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-08-13 16:00:00',
            'updated_at' => '2019-08-13 16:00:00',
        ]);


/**/
\App\Models\ActionType::create([
	'id' => 50,
	'action_type_code' => 'cardDev',
	'action_type_name' => '',
	'action_type_remark' => '',
	'access_right_id' => 1,
	'caption_code' => '',
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-08-13 16:00:00',
	'updated_at' => '2019-08-13 16:00:00',
	]);

/**/
\App\Models\ActionType::create([
	'id' => 51,
	'action_type_code' => 'save',
	'action_type_name' => 'Сохранение анкеты',
	'action_type_remark' => 'Сохранение анкеты',
	'access_right_id' => 2,
	'caption_code' => '',
	'created_by' => 'seed',
	'updated_by' => 'seed',
	'created_at' => '2019-08-13 16:00:00',
	'updated_at' => '2019-08-13 16:00:00',
	]);

    }
}
