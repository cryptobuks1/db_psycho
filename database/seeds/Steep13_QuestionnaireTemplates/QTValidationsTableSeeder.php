<?php

use Illuminate\Database\Seeder;

class QTValidationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuestionnaireTemplates\QTValidation::truncate();

        \App\Models\QuestionnaireTemplates\QTValidation::create([
            'id' => 1,
            'validation_name' => 'Длина больше',
            "validation_code" => 'min',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTValidation::create([
            'id' => 2,
            'validation_name' => 'Длина меньше',
            "validation_code" => 'max',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTValidation::create([
            'id' => 4,
            'validation_name' => 'Значение больше',
            "validation_code"=>'min_value',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);
        \App\Models\QuestionnaireTemplates\QTValidation::create([
            'id' => 3,
            'validation_name' => 'Значение меньше',
            "validation_code"=>'max_value',
            'deleted_l' => 0,
            'active_l' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-20 11:00:00',
            'updated_at' => '2019-05-20 11:00:00',
        ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"QTValidations_id_seq\"', 100, true)");
        }
    }
}
