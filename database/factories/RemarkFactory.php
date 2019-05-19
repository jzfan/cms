<?php

use Faker\Generator as Faker;

$factory->define(App\Remark::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'message' => $faker->sentence
    ];
});
