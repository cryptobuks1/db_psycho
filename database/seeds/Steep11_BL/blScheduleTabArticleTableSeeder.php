<?php

use Illuminate\Database\Seeder;

class BlScheduleTabArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BL\BlScheduleTabArticle::truncate();

        /*табличная часть справочника графиков  Справочники.блГрафики.Статьи*/
        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 1,
            'bl_schedule_id' => 1,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 2,
            'bl_schedule_id' => 1,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 3,
            'bl_schedule_id' => 1,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 5,
            'bl_schedule_id' => 2,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 6,
            'bl_schedule_id' => 2,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 7,
            'bl_schedule_id' => 2,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 8,
            'bl_schedule_id' => 3,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 9,
            'bl_schedule_id' => 3,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 10,
            'bl_schedule_id' => 3,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 11,
            'bl_schedule_id' => 4,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 12,
            'bl_schedule_id' => 4,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 13,
            'bl_schedule_id' => 4,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 14,
            'bl_schedule_id' => 5,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 15,
            'bl_schedule_id' => 5,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 16,
            'bl_schedule_id' => 5,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 17,
            'bl_schedule_id' => 6,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 18,
            'bl_schedule_id' => 6,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 19,
            'bl_schedule_id' => 6,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 20,
            'bl_schedule_id' => 7,
            'bl_schedule_article_id' => 1,
            'line_n' => 1,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 21,
            'bl_schedule_id' => 7,
            'bl_schedule_article_id' => 2,
            'line_n' => 2,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\BL\BlScheduleTabArticle::create([
            'id' => 22,
            'bl_schedule_id' => 7,
            'bl_schedule_article_id' => 3,
            'line_n' => 3,
            'referential_l' => false,
            'calculated_l' => false,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"blScheduleTabArticles_id_seq\"', 100, true)");
        }

    }
}
