<?php

use Illuminate\Database\Seeder;

class SystemOperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SystemOperation::truncate();
        /*Системная операция 'Регистрация'*/
        \App\Models\SystemOperation::create([
            'id' => 1,
            'sys_oper_code' => 'CheckIn',
            'sys_oper_name' => 'Регистрация',
            'sys_oper_rem' => 'Регистрация',
        ]);


        /*Системная операция 'Регистрация внешняя'*/
        \App\Models\SystemOperation::create([
            'id' => 2,
            'sys_oper_code' => 'CheckInExt',
            'sys_oper_name' => 'Регистрация внешняя',
            'sys_oper_rem' => 'Регистрация внешняя',
        ]);


        /*Системная операция 'Авторизация'*/
        \App\Models\SystemOperation::create([
            'id' => 3,
            'sys_oper_code' => 'Authorization',
            'sys_oper_name' => 'Авторизация',
            'sys_oper_rem' => 'Авторизация',
		]);


        /*Системная операция 'Верификация'*/
        \App\Models\SystemOperation::create([
            'id' => 4,
            'sys_oper_code' => 'Verification',
            'sys_oper_name' => 'Верификация',
            'sys_oper_rem' => 'Верификация',
		]);


        /*Системная операция 'Смена пароля'*/
        \App\Models\SystemOperation::create([
            'id' => 5,
            'sys_oper_code' => 'PasswordChange',
            'sys_oper_name' => 'Смена пароля',
            'sys_oper_rem' => 'Смена пароля',
		]);


        /*Системная операция 'Восстановление пароля'*/
        \App\Models\SystemOperation::create([
            'id' => 6,
            'sys_oper_code' => 'PasswordRecovery',
            'sys_oper_name' => 'Восстановление пароля',
            'sys_oper_rem' => 'Восстановление пароля',
		]);


        /*Системная операция 'Изменение Login'*/
        \App\Models\SystemOperation::create([
            'id' => 7,
            'sys_oper_code' => 'LoginChange',
            'sys_oper_name' => 'Изменение Login',
            'sys_oper_rem' => 'Изменение Login',
		]);


        /*Системная операция 'Изменение E-mail'*/
        \App\Models\SystemOperation::create([
		    'id' => 8,
		    'sys_oper_code' => 'EmailChange',
		    'sys_oper_name' => 'Изменение E-mail',
		    'sys_oper_rem' => 'Изменение E-mail',
		]);
    }
}
