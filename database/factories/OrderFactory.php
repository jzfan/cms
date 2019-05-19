<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'number' => rand(1, 99),
        'items' => function () {
        	$foods = factory(App\Food::class, rand(1, 5))->create();
        	return $foods;
        },
        'total' => number_format(rand(100, 99999)/100),
        'tax' => number_format(rand(100, 999)/100),
        'remarks' => function () {
        	return factory(App\Remark::class)->create()->message;
        }
    ];
});
