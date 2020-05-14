<?php

use Illuminate\Database\Seeder;

class AccessAxesParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessAxesParameter::truncate();

        /**/
        \App\Models\AccessAxesParameter::create([
            'id' => 1,
            'access_axis_id' => 1,
            'line_n' => 1,
            'access_row_parameter_id' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
        ]);

        /**/
        \App\Models\AccessAxesParameter::create([
            'id' => 2,
            'access_axis_id' => 1,
            'line_n' => 2,
            'access_row_parameter_id' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-12-11 17:00:00',
            'updated_at' => '2019-12-11 17:00:00',
        ]);

//        /**/
//        \App\Models\AccessAxesParameter::create([
//            'id' => 2,
//            'access_axis_id' => 2,
//            'line_n' => 1,
//            'access_row_parameter_id' => 2,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\AccessAxesParameter::create([
//            'id' => 3,
//            'access_axis_id' => 2,
//            'line_n' => 2,
//            'access_row_parameter_id' => 3,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
//
//
//        /**/
//        \App\Models\AccessAxesParameter::create([
//            'id' => 4,
//            'access_axis_id' => 2,
//            'line_n' => 3,
//            'access_row_parameter_id' => 4,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-12-11 17:00:00',
//            'updated_at' => '2019-12-11 17:00:00',
//        ]);
    }
}
