<?php

use Illuminate\Database\Seeder;

class QTBlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTBlock::truncate();

        \App\Models\QuestionnaireTemplates\QTBlock::create([
            'id'=>1,
            'db_area_id'=>6,
            'qt_page_id'=>1,
            'line_n'=>1,
            'block_name'=>'1.   Основная информация о Клиенте:',
            'block_code'=>'block1',
            'block_description'=>null,
            'block_remark'=>null,
            'caption_code'=>'',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTBlock::create([
            'id'=>2,
            'db_area_id'=>6,
            'qt_page_id'=>1,
            'line_n'=>2,
            'block_name'=>'2.   Состав руквоводящих органов',
            'block_code'=>'governing_authorities',
            'block_description'=>null,
            'block_remark'=>null,
            'caption_code'=>'',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTBlock::create([
            'id'=>3,
            'db_area_id'=>6,
            'qt_page_id'=>2,
            'line_n'=>1,
            'block_name'=>'3.	Сведения об уставном капитале и акционерах/участниках:',
            'block_code'=>'authorized_capital_and_shareholders_information',
            'block_description'=>null,
            'block_remark'=>null,
            'caption_code'=>'',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTBlock::create([
            'id'=>4,
            'db_area_id'=>6,
            'qt_page_id'=>3,
            'line_n'=>1,
            'block_name'=>'1.  Возможные виды вопросов',
            'block_code'=>'block4',
            'block_description'=>null,
            'block_remark'=>null,
            'caption_code'=>'',
            'deleted_l'=>0,
            'active_l'=>1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTBlocks_id_seq\"', 100, true)");
        }
    }
}
