<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'color' => ['blue', 'indigo','purple', 'pink', 'red', 'orange', 'green', 'teal',  'cyan'][rand(0, 8)],
        'sort' => rand(1, 99),
        'job' => ['bar', 'kitchen'][rand(0, 1)],
    ];
});  
