<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10),
        'category_id' => mt_rand(1, 5),
        'user_id' => mt_rand(1, 10),
        'comment' => $faker->sentence(10),
        'price' => mt_rand(500, 100000),

    ];
});
