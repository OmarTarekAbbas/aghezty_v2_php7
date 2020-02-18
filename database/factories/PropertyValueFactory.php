<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\PropertyValue::class, function (Faker $faker) {
    return [
        'value' => $faker->word,
        'property_id' => function () {
            return App\Property::inRandomOrder()->first();
        },
    ];
});
