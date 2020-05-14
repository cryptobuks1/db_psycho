<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Image::truncate();


        /**/
        \App\Models\Image::create([
            'id' => 1,
            'image_code' => 'Binance',
            'image_name' => 'Crypto Exchange Binance',
            'image_path' => '/img/dollar.png',
            'image_category_id' => 1,
            'file_type_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 2,
            'image_code' => 'OKEx',
            'image_name' => 'Crypto Exchange OKEx',
            'image_path' => '/img/dollar.png',
            'image_category_id' => 1,
            'file_type_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 3,
            'image_code' => 'ZB.COM',
            'image_name' => 'Crypto Exchange ZB.COM',
            'image_path' => '/img/euro.png',
            'image_category_id' => 1,
            'file_type_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 4,
            'image_code' => 'rbl_systemUser',
            'image_name' => 'РБЛ Пользователи системы',
            'image_path' => '/img/menurbl/rbl_systemUser.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 5,
            'image_code' => 'rbl_arrow',
            'image_name' => 'РБЛ Стрелка',
            'image_path' => '/img/interfacerbl/rbl_arrow.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 6,
            'image_code' => 'rbl_clients',
            'image_name' => 'РБЛ Клиенты',
            'image_path' => '/img/menurbl/rbl_clients.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 7,
            'image_code' => 'rbl_done',
            'image_name' => 'РБЛ Выполнено',
            'image_path' => '/img/interfacerbl/rbl_done.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 8,
            'image_code' => 'rbl_error',
            'image_name' => 'РБЛ Ошибка',
            'image_path' => '/img/interfacerbl/rbl_error.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 9,
            'image_code' => 'rbl_exchange',
            'image_name' => 'РБЛ Обмен данными',
            'image_path' => '/img/menurbl/rbl_exchange.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 10,
            'image_code' => 'rbl_filter',
            'image_name' => 'РБЛ Фильтр',
            'image_path' => '/img/menurbl/rbl_filter.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 12,
            'image_code' => 'rbl_notification',
            'image_name' => 'РБЛ Уведомления',
            'image_path' => '/img/menurbl/rbl_notification.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 13,
            'image_code' => 'rbl_profile',
            'image_name' => 'РБЛ Профиль',
            'image_path' => '/img/menurbl/rbl_profile.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 14,
            'image_code' => 'rbl_request',
            'image_name' => 'РБЛ Запросы',
            'image_path' => '/img/menurbl/rbl_request.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 15,
            'image_code' => 'rbl_settings',
            'image_name' => 'РБЛ Настройки',
            'image_path' => '/img/menurbl/rbl_settings.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 16,
            'image_code' => 'rbl_types',
            'image_name' => 'РБЛ Типы запросов',
            'image_path' => '/img/menurbl/rbl_types.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 17,
            'image_code' => 'rbl_edit',
            'image_name' => 'РБЛ Редактирование',
            'image_path' => '/img/interfacerbl/rbl_edit.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 18,
            'image_code' => 'arrow',
            'image_name' => 'ДБ Стрелка',
            'image_path' => '/img/interfacedashboard/arrow.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 19,
            'image_code' => 'arrow_table',
            'image_name' => 'ДБ Стрелка_таблица',
            'image_path' => '/img/interfacedashboard/arrow_table.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 20,
            'image_code' => 'delete',
            'image_name' => 'ДБ Удаление',
            'image_path' => '/img/interfacedashboard/delete.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 21,
            'image_code' => 'download',
            'image_name' => 'ДБ Загрузка',
            'image_path' => '/img/interfacedashboard/download.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 22,
            'image_code' => 'edit',
            'image_name' => 'ДБ Редактирование',
            'image_path' => '/img/interfacedashboard/edit.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 23,
            'image_code' => 'file',
            'image_name' => 'ДБ Файл',
            'image_path' => '/img/interfacedashboard/file.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 24,
            'image_code' => 'folder',
            'image_name' => 'ДБ Папка',
            'image_path' => '/img/interfacedashboard/folder.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 25,
            'image_code' => 'info',
            'image_name' => 'ДБ Информация',
            'image_path' => '/img/interfacedashboard/info.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 26,
            'image_code' => 'menu',
            'image_name' => 'ДБ Меню',
            'image_path' => '/img/interfacedashboard/menu.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 27,
            'image_code' => 'remove',
            'image_name' => 'ДБ Удалить ',
            'image_path' => '/img/interfacedashboard/remove.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 28,
            'image_code' => 'report',
            'image_name' => 'ДБ Отчет',
            'image_path' => '/img/interfacedashboard/report.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 29,
            'image_code' => 'Search_icon',
            'image_name' => 'Search_icon.svg',
            'image_path' => '/img/interfacedashboard/Search_icon.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 30,
            'image_code' => 'user',
            'image_name' => 'ДБ Пользователь',
            'image_path' => '/img/interfacedashboard/user.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 31,
            'image_code' => 'userData',
            'image_name' => 'ДБ Данные пользователя',
            'image_path' => '/img/interfacedashboard/userData.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 32,
            'image_code' => 'rbl_administr',
            'image_name' => 'РБЛ Администрирование',
            'image_path' => '/img/menurbl/rbl_administr.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 33,
            'image_code' => 'rbl_dogovor',
            'image_name' => 'РБЛ Договоры лизинга',
            'image_path' => '/img/menurbl/rbl_dogovor.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 34,
            'image_code' => 'rbl_spravka',
            'image_name' => 'РБЛ Справка',
            'image_path' => '/img/menurbl/rbl_spravka.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 35,
            'image_code' => 'rbl_straxovanie',
            'image_name' => 'РБЛ Страхование',
            'image_path' => '/img/menurbl/rbl_straxovanie.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 36,
            'image_code' => 'rbl_vzaimozachet',
            'image_name' => 'РБЛ Взаимозачеты',
            'image_path' => '/img/menurbl/rbl_vzaimozachet.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 37,
            'image_code' => 'rbl_systemparametr',
            'image_name' => 'РБЛ Системные параметры',
            'image_path' => '/img/menurbl/rbl_systemparametr.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 38,
            'image_code' => 'rbl_KP',
            'image_name' => 'РБЛ Просмотр КП',
            'image_path' => '/img/menurbl/rbl_KP.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 39,
            'image_code' => 'rbl_database',
            'image_name' => 'РБЛ Настройки БД (3 уровень)',
            'image_path' => '/img/menurbl/rbl_database.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 40,
            'image_code' => 'rbl_settingsDB',
            'image_name' => 'РБЛ Настройка Внешних БД',
            'image_path' => '/img/menurbl/rbl_settingsDB.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 41,
            'image_code' => 'rbl_zayavki',
            'image_name' => 'РБЛ Заявки',
            'image_path' => '/img/menurbl/rbl_zayavki.svg',
            'image_category_id' => 3,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-20 17:00:00',
            'updated_at' => '2019-04-20 17:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 42,
            'image_code' => '000',
            'image_name' => 'Страница в разработке',
            'image_path' => '/img/interfacedashboard/000.png',
            'image_category_id' => 4,
            'file_type_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-02 15:00:00',
            'updated_at' => '2019-05-02 15:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 43,
            'image_code' => 'finished',
            'image_name' => 'Финиш',
            'image_path' => '/img/interfacedashboard/finished.png',
            'image_category_id' => 4,
            'file_type_id' => 4,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-03 15:00:00',
            'updated_at' => '2019-05-03 15:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 44,
            'image_code' => 'addfolder',
            'image_name' => 'Добавить группу',
            'image_path' => '/img/interfacerbl/rbl_addfolder.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:00',
            'updated_at' => '2019-06-16 15:00:00',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 45,
            'image_code' => 'add',
            'image_name' => 'Добавить',
            'image_path' => '/img/interfacerbl/rbl_add.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:01',
            'updated_at' => '2019-06-16 15:00:01',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 46,
            'image_code' => 'faqedit',
            'image_name' => 'Редактировать',
            'image_path' => '/img/interfacerbl/rbl_faqedit.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:01',
            'updated_at' => '2019-06-16 15:00:01',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 47,
            'image_code' => 'sidmenu',
            'image_name' => 'Три точки',
            'image_path' => '/img/interfacerbl/rbl_sidmenu.svg',
            'image_category_id' => 5,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:02',
            'updated_at' => '2019-06-16 15:00:02',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 48,
            'image_code' => 'profile',
            'image_name' => 'Заявка',
            'image_path' => '/img/menurbl/profile.png',
            'image_category_id' => 3,
            'file_type_id' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:02',
            'updated_at' => '2019-06-16 15:00:02',
        ]);


        /**/
        \App\Models\Image::create([
            'id' => 49,
            'image_code' => 'preview',
            'image_name' => 'Предпросмотр',
            'image_path' => '/img/interfacedashboard/preview.svg',
            'image_category_id' => 4,
            'file_type_id' => 9,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-16 15:00:02',
            'updated_at' => '2019-06-16 15:00:02',
        ]);

    }
}
