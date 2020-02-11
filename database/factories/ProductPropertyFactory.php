<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProductProperty::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return App\Product::inRandomOrder()->first();
        },
        'property_value_id' => function () {
            return App\PropertyValue::inRandomOrder()->first();
        },
    ];
});
