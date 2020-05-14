<?php

use Illuminate\Database\Seeder;

class TestCronTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TestCron::truncate();

        \App\TestCron::create([
            "name" => 'name1',
            "test" => 1,
        ]);
        \App\TestCron::create([
            "name" => 'name2',
            "test" => 11,
        ]);
        \App\TestCron::create([
            "name" => 'name3',
            "test" => 111,
        ]);
        \App\TestCron::create([
            "name" => 'name4',
            "test" => 1111,
        ]);
        \App\TestCron::create([
            "name" => 'name5',
            "test" => 12,
        ]);
    }
}
