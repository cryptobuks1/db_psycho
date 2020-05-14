<?php

use Illuminate\Database\Seeder;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Questionnaires\Questionnaire::create([
            "form_name" => "BetaRegister",
            "message" => "Hi, %name%

Welcome to Token.Accountant! This email is to confirm that you have successfully completed your Registration.

To have access to Try Mode database, please use following details: 
Login:
Password:

By clicking on the following link %name% you can make direct login to the system 

In case if you need additional assistance, please contact us via Telegram chat https://t.me/annatoken",
        ]);
    }
}
