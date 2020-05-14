<?php

use Illuminate\Database\Seeder;

class QTPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTPage::truncate();

        \App\Models\QuestionnaireTemplates\QTPage::create([
            'id'=>1,
            'db_area_id'=>6,
            'questionnaire_templates_id'=>1,
            'line_n'=>1,
            'page_name'=>'Страница 1',
            'page_code'=>'page1',
            'page_description'=>null,
            'page_remark'=>null,
            'header'=>null,
            'footer'=>null,
            'caption_code'=>null,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTPage::create([
            'id'=>2,
            'db_area_id'=>6,
            'questionnaire_templates_id'=>1,
            'line_n'=>2,
            'page_name'=>'Страница 2',
            'page_code'=>'page2',
            'page_description'=>null,
            'page_remark'=>null,
            'header'=>null,
            'footer'=>null,
            'caption_code'=>null,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTPage::create([
            'id'=>3,
            'db_area_id'=>6,
            'questionnaire_templates_id'=>2,
            'line_n'=>1,
            'page_name'=>'Страница 1',
            'page_code'=>'page1',
            'page_description'=>null,
            'page_remark'=>null,
            'header'=>null,
            'footer'=>null,
            'caption_code'=>null,
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTPages_id_seq\"', 100, true)");
        }
    }
}
