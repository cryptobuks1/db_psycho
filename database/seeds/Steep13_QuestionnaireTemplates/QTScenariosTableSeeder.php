<?php

use Illuminate\Database\Seeder;

class QTScenariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\QuestionnaireTemplates\QTScenario::truncate();
        \App\Models\QuestionnaireTemplates\QTScenario::create([
            'id'=>1,
            'scenario_name'=>'show',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        \App\Models\QuestionnaireTemplates\QTScenario::create([
            'id'=>2,
            'scenario_name'=>'hide',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTScenarios_id_seq\"', 100, true)");
        }
    }
}
