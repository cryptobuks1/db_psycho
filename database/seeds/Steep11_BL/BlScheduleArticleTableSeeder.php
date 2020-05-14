<?php

use Illuminate\Database\Seeder;

class BlScheduleArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlScheduleArticle::truncate();

        /*Статьи графиков ПланВидовХарактеристикСсылка.блСтатьиГрафиков*/
        \App\Models\BL\BlScheduleArticle::create([
            'id' => 1,
            'db_area_id' => 6,
            'bl_schedule_article_name' => 'Авансовый платеж',
            'uid_1c_code' => '5f7d3c28-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleArticle::create([
            'id' => 2,
            'db_area_id' => 6,
            'bl_schedule_article_name' => 'Лизинговый платеж',
            'uid_1c_code' => '5f7d3c2b-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleArticle::create([
            'id' => 3,
            'db_area_id' => 6,
            'bl_schedule_article_name' => 'Выкупной платеж',
            'uid_1c_code' => '5f7d3c29-d8eb-11e7-9324-00155d140c02',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleArticle::create([
            'id' => 4,
            'db_area_id' => 6,
            'bl_schedule_article_name' => 'Лизинговый платеж без страховки',
            'uid_1c_code' => 'c29db391-24d0-11e9-ae7d-0cc47a0cb8fd',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blScheduleArticles_id_seq\"', 10, true)");
        }
    }
}
