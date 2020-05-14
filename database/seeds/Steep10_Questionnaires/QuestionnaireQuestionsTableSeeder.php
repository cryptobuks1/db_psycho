<?php

use Illuminate\Database\Seeder;

class QuestionnaireQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Questionnaires\QuestionnaireQuestion::create([
            "que_id" => "1",
            "que_que_text" => "Input your name:",
            "que_type_id" => "1",
            "caption_id" => NUll,
            "email_l" => "0",
            "questionnaire_name_l" => "0",
        ]);
        \App\Models\Questionnaires\QuestionnaireQuestion::create([
            "que_id" => "1",
            "que_que_text" => "Input your surname:",
            "que_type_id" => "1",
            "caption_id" => NUll,
            "email_l" => "0",
            "questionnaire_name_l" => "0",
        ]);
        \App\Models\Questionnaires\QuestionnaireQuestion::create([
            "que_id" => "1",
            "que_que_text" => "Input your email:",
            "que_type_id" => "1",
            "caption_id" => NUll,
            "email_l" => "1",
            "questionnaire_name_l" => "0",
        ]);
        \App\Models\Questionnaires\QuestionnaireQuestion::create([
            "que_id" => "1",
            "que_que_text" => "Input your company:",
            "que_type_id" => "1",
            "caption_id" => NUll,
            "email_l" => "0",
            "questionnaire_name_l" => "0",
        ]);
        \App\Models\Questionnaires\QuestionnaireQuestion::create([
            "que_id" => "1",
            "que_que_text" => "Input Telegram, LinkedIn, Messenger or another link:",
            "que_type_id" => "1",
            "caption_id" => NUll,
            "email_l" => "0",
            "questionnaire_name_l" => "0",
        ]);
    }
}
