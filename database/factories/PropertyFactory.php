<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'category_id' => function () {
            return App\Category::inRandomOrder()->first();;
        },
    ];
});
