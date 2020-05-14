<?php

use Illuminate\Database\Seeder;

class FeSetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeSet::truncate();

        /**/
        \App\Models\FeSet::create([
            'id' => 1,
            'fe_set_code' => 'card_actions',
            'fe_set_name' => 'Кнопки карточки',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 2,
            'fe_set_code' => 'list_top_dropdown_actions',
            'fe_set_name' => 'Выпадающий список действий для Формы Списка',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 3,
            'fe_set_code' => 'list_top_left_command_bar',
            'fe_set_name' => 'Элементы панели списка вверху слева (Фильтр, Добавить, Закладки, Ссылки)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-07 16:00:00',
            'updated_at' => '2019-05-07 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 4,
            'fe_set_code' => 'list_top_right_command_bar',
            'fe_set_name' => 'Элементы панели списка вверху справа (Поиск)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 5,
            'fe_set_code' => 'list_bottom',
            'fe_set_name' => 'Переходы по страницам внизу',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 6,
            'fe_set_code' => 'list_top',
            'fe_set_name' => 'Переходы по страницам вверху',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 7,
            'fe_set_code' => 'steps_actions',
            'fe_set_name' => 'Переходы по шагам (назад, вперед)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 8,
            'fe_set_code' => 'steps_bottom',
            'fe_set_name' => 'Кнопки шага (Завершить шаг)',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-16 16:00:00',
            'updated_at' => '2019-05-16 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 9,
            'fe_set_code' => 'faq_dropdown_actions',
            'fe_set_name' => 'Выпадающий список действий в FAQ',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:00',
            'updated_at' => '2019-06-19 16:00:00',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 10,
            'fe_set_code' => 'faq_command_bar',
            'fe_set_name' => 'Командная панель вверху под кнопки',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:01',
            'updated_at' => '2019-06-19 16:00:01',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 11,
            'fe_set_code' => 'faq_section_actions',
            'fe_set_name' => 'Кнопки под раздел',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:02',
            'updated_at' => '2019-06-19 16:00:02',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 12,
            'fe_set_code' => 'faq_article_actions',
            'fe_set_name' => 'Кнопки под статью',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 16:00:03',
            'updated_at' => '2019-06-19 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 13,
            'fe_set_code' => 'att_file_bar',
            'fe_set_name' => 'Кнопки для работы с файлом',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 14,
            'fe_set_code' => 'request_card_actions',
            'fe_set_name' => 'Кнопки для карточки запроса',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 15,
            'fe_set_code' => 'profile_card_actions',
            'fe_set_name' => 'Кнопки для профиля',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 16,
            'fe_set_code' => 'att_file_download',
            'fe_set_name' => 'Кнопка для скачивания файла',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 17,
            'fe_set_code' => 'list_top_left_request',
            'fe_set_name' => 'Кнопки для листа с запросами',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);


        /**/
        \App\Models\FeSet::create([
            'id' => 18,
            'fe_set_code' => 'request_card_send_save',
            'fe_set_name' => 'Кнопки для карточки запроса Отправить и Сохранить',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-07-02 16:00:03',
            'updated_at' => '2019-07-02 16:00:03',
        ]);

    }
}
