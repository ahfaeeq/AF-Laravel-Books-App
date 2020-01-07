<?php

use Faker\Generator as Faker;
use App\Books;

$factory->define(Books::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'release_date' => $faker->dateTime,
        'author' => $faker->numberBetween($min = 0, $max = 11)
    ];
});