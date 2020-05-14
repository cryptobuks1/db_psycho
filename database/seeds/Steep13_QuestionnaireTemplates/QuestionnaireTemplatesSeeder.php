<?php

use Illuminate\Database\Seeder;

class QuestionnaireTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QuestionnaireTemplate::truncate();

        \App\Models\QuestionnaireTemplates\QuestionnaireTemplate::create([
            'id' => 1,
            'db_area_id' => 6,
            'form_name' => 'Aнкета 1',
            'message' => null,
            'questionnaire_templates_name' => 'questionnaire1',
            'questionnaire_templates_code' => 'questionnaire1',
            'description' => null,
            'remark' => null,
            'header' => null,
            'footer' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QuestionnaireTemplate::create([
            'id' => 2,
            'db_area_id' => 6,
            'form_name' => 'Aнкета 1',
            'message' => null,
            'questionnaire_templates_name' => 'Demonstration Example',
            'questionnaire_templates_code' => 'demonstration_example',
            'description' => null,
            'remark' => null,
            'header' => null,
            'footer' => null,
            'caption_code' => null,
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QuestionnaireTemplates_id_seq\"', 100, true)");
        }
    }
}
