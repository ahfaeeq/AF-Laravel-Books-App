<?php

use Faker\Generator as Faker;
use App\Authors;

$factory->define(Authors::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween($min = 17, $max = 90),
        'address' => $faker->address
    ];
});
