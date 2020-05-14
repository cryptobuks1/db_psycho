<?php

use Illuminate\Database\Seeder;
//use Faker\Factory as Faker;


class ActionLogs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,100000) as $index) {
            \Illuminate\Support\Facades\DB::table('__ActionLogs')->insert([
                'consumer_id' => $faker->randomDigit,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);

        }

        //              'consumer_id' => $faker->randomDigit,
        //            'created_at' => $faker->dateTimeBetween('now', '+30 years'),
        //            'updated_at' => $faker->dateTimeBetween('now', '+30 years'),
    }
}
