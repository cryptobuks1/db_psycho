<?php

use Illuminate\Database\Seeder;

class ConsumerAccessRowParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ConsumerAccessRowParameter::truncate();


        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 1,
            'consumer_access_row_id' => 1,
            'data_types_id' => null,
            'access_axes_parameter_id' => 1,
            'access_row_parameter_value' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);


        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 2,
            'consumer_access_row_id' => 1,
            'data_types_id' => null,
            'access_axes_parameter_id' => 1,
            'access_row_parameter_value' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 3,
            'consumer_access_row_id' => 1,
            'data_types_id' => null,
            'access_axes_parameter_id' => 2,
            'access_row_parameter_value' => 2,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 4,
            'consumer_access_row_id' => 1,
            'data_types_id' => null,
            'access_axes_parameter_id' => 2,
            'access_row_parameter_value' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 5,
            'consumer_access_row_id' => 3,
            'data_types_id' => null,
            'access_axes_parameter_id' => 1,
            'access_row_parameter_value' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

        /**/
        \App\Models\ConsumerAccessRowParameter::create([
            'id' => 6,
            'consumer_access_row_id' => 3,
            'data_types_id' => null,
            'access_axes_parameter_id' => 2,
            'access_row_parameter_value' => 1,
            'created_by' => 'seed',
            'updated_by' => 'seed',
        ]);

    }
}
