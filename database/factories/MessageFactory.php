<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function(Faker $faker){
    return [
        'name' => $faker->name,
        'nim' => rand(11111111, 99999999),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'message' => $faker->text,
        'ukm_id' => 2
    ];
});