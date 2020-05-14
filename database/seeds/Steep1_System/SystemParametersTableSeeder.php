<?php

use Illuminate\Database\Seeder;

class SystemParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SystemParameter::truncate();

        \App\Models\SystemParameter::create([
            'id' => 1,
            'sys_par_code' => 'TypeExtVerification',
            'sys_par_value' => '0',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Нужна ли верификация по почте пользователя при создании его из 1С. | Do you need verification by mail user who creating from 1C.
Возможные значения:
  0 - верификация по общей схеме. При этом высылается 2 письма. Первое Login и Password, с комментарием, что вам будет выслано письмо с верификацией. Второе - собственно ссылка на верификацию.
  1 - без верификации, но с уведомлением по почте. При этом высылается Login и Password, БЕЗ комментария, что вам будет выслано письмо с верификацией
  2 - без верификации и без уведомления по почте.',
            'data_type_code' => 'integer',
            'data_type_id' => 16,
            //edit Albert Topalu  08.04.19 10:43
//             'sys_par_use_allow_values_l' => 'TRUE',
            'sys_par_use_allow_values_l' => '1',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 2,
            'sys_par_code' => 'CheckInRequestTimeOut',
            'sys_par_value' => '720:00:00',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'В секундах',
            'data_type_code' => 'time',
            'data_type_id' => 41,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);


        \App\Models\SystemParameter::create([
            'id' => 3,
            'sys_par_code' => 'CheckInUseCaptcha',
            'sys_par_value' => 'true',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Использовать ли CAPTCHA при регистрации | Whether to use a CAPTCHA for registration',
            'data_type_code' => 'boolean',
            'data_type_id' => 4,

            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 4,
            'sys_par_code' => 'CaptchaNumberOfInvalidLogin',
            'sys_par_value' => '2',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Количество неправильных авторизаций для включения CAPTCHA | Number of invalid authorizations to enable CAPTCHA',
            'data_type_code' => 'integer',
            'data_type_id' => 16,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 5,
            'sys_par_code' => 'TimeOutRequestPasswordRecovery',
            'sys_par_value' => '0:1:0',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Time-out запроса на восстановление пароля (в секундах) | Time-out password recovery request (in hours)',
            'data_type_code' => 'time',
            'data_type_id' => 41,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 6,
            'sys_par_code' => 'TimeOutRequestRePasswordRecovery',
            'sys_par_value' => '0:1:0',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Time-out запроса на повторное восстановление пароля (в секундах) | Time-out request for re-password recovery (in hours)',
            'data_type_code' => 'time',
            'data_type_id' => 41,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 7,
            'sys_par_code' => 'TypeTimeOutChangeEmail',
            'sys_par_value' => '24:00:00',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Time-out подтверждения изменения e-mail | Confirmation of change e-mail time-out',
            'data_type_code' => 'time',
            'data_type_id' => 41,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'FALSE',
            'sys_par_use_allow_values_l' => '0',
            //End edit Albert Topalu  08.04.19 10:43

        ]);


        \App\Models\SystemParameter::create([
            'id' => 8,
            'sys_par_code' => 'ExtVerificationTypeSystem',
            'sys_par_value' => '0',
            'sys_par_name' => NULL,
            'sys_par_rem' => 'Проверка нужна ли верификация email при регистрации из системы',
            'data_type_code' => 'integer',
            'data_type_id' => 16,
            //edit Albert Topalu  08.04.19 10:43
//            'sys_par_use_allow_values_l' => 'TRUE',
            'sys_par_use_allow_values_l' => '1',
            //End edit Albert Topalu  08.04.19 10:43

        ]);

        \App\Models\SystemParameter::create([
            'id' => 9,
            'sys_par_code' => 'StorageTypeSystem',
            'sys_par_value' => '0',
            'sys_par_name' => 'Storage type system',
            'sys_par_rem' => 'Настройка куда сохранять файл в базу или папку или на Ftp',
            'data_type_code' => 'integer',
            'data_type_id' => 16,
            'sys_par_use_allow_values_l' => '1',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-06 09:00:00',
            'updated_at' => '2019-06-06 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 10,
            'sys_par_code' => 'DefaultDbAreaID',
            'sys_par_value' => 6,
            'sys_par_name' => 'Default dbArea ID',
            'sys_par_rem' => 'Область по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 11,
            'sys_par_code' => 'DefaultCompanyID',
            'sys_par_value' => 5,
            'sys_par_name' => 'Default company ID',
            'sys_par_rem' => 'Область по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 12,
            'sys_par_code' => 'DefaultDbAreaIDForGettingDocuments',
            'sys_par_value' => 6,
            'sys_par_name' => 'Default dbArea ID For Getting Documents',
            'sys_par_rem' => 'Область для получения печатных форма документов',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 13,
            'sys_par_code' => 'DefaultConsumerAccessRole',
            'sys_par_value' => 7,
            'sys_par_name' => 'Default consumer access role',
            'sys_par_rem' => 'Роль пользователя по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 14,
            'sys_par_code' => 'LogExpires',
            'sys_par_value' => 15,
            'sys_par_name' => 'Log Expires in N days',
            'sys_par_rem' => 'Сохранять Логи за последние N дней',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 15,
            'sys_par_code' => 'UseHomePage',
            'sys_par_value' => 1,
            'sys_par_name' => 'Use Home Page',
            'sys_par_rem' => 'Ипользовать главную страницу или переадрисовывать.
0 - переадресовывать на страницу по умолчанию
1 - открывать домашнюю страницу',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 16,
            'sys_par_code' => 'DefaultManagerAccessRole',
            'sys_par_value' => 6,
            'sys_par_name' => 'Default manager access role',
            'sys_par_rem' => 'Роль менеджера по умолчанию',
        ]);


        \App\Models\SystemParameter::create([
            'id' => 17,
            'sys_par_code' => 'LocalStorageTimeout',
            'sys_par_value' => 30,
            'sys_par_name' => 'Local storage timeout',
            'sys_par_rem' => 'Интервал сохранения LocalStorage',
        ]);

        \App\Models\SystemParameter::create([
            'id' => 18,
            'sys_par_code' => 'DefaultQuestionnaireTemplateID',
            'sys_par_value' => 1,
            'sys_par_name' => 'Default questionnaire template id',
            'sys_par_rem' => 'Шаблон анкеты по умолчанию',
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-24 09:00:00',
            'updated_at' => '2019-06-24 09:00:00',
        ]);

    }


}
