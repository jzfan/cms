<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'category_id' => function () {
        	return factory(App\Category::class)->create()->id;
        },
        'abbr' => $faker->word,
        'name' => join(' ', $faker->words),
        'tax_rate' => array_rand(array_flip([0, 10])),
        'price' => number_format(rand(100, 9999) / 100, 2),
        'sort' => rand(1, 99)
    ];
});
