<?php

use Faker\Generator as Faker;

$factory->define(App\ClientRate::class, function (Faker $faker){
    return [
        'rate'  => random_int(1,5),
        'comment' => $faker->text(random_int(10,30)),
        'publish' => 1,
        'product_id' => App\Product::inRandomOrder()->get()[0],
        'client_id' => App\client::inRandomOrder()->get()[0]
    ];
});
