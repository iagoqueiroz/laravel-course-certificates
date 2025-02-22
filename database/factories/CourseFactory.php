<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'hours' => $faker->randomElement([
            20, 40, 80, 120
        ])
    ];
});
