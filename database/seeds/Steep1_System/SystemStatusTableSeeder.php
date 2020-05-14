<?php

use Illuminate\Database\Seeder;

class SystemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SystemStatus::truncate();

        \App\Models\SystemStatus::create([
            'id' => 1,
            'system_status_code' => 'Signal',
            'caption_code' => 'Signal',
            'created_by' => 'seed',
            'updated_by' => 'seed',

        ]);

        \App\Models\SystemStatus::create([
            'id' => 2,
            'system_status_code' => 'Done',
            'caption_code' => 'Done',
            'created_by' => 'seed',
            'updated_by' => 'seed',

        ]);

        \App\Models\SystemStatus::create([
            'id' => 3,
            'system_status_code' => 'Error',
            'caption_code' => 'Error',
            'created_by' => 'seed',
            'updated_by' => 'seed',

        ]);
    }
}
