<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Consumer::class, function(Faker $faker)
{
    return [
        "consumer_name"        => $faker->name,
        "consumer_login"       => $faker->name,
        "password"             => bcrypt($faker->password),
        "first_name"           => $faker->name("female"),
        "consumer_status_n"    => 3,
        "consumer_type_code"   => 1,
        "consumer_is_system_n" => 1,
        "email"                => $faker->unique()->safeEmail
    ];
});
