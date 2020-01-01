<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker){
    return [
        'published_date' => date('Y-m-d'),
        'active' => 1,
        'url' => '#',
        'product_id' => App\Product::inRandomOrder()->get()[0],
        'operator_id' => App\Operator::inRandomOrder()->get()[0],
        'user_id'=> App\User::inRandomOrder()->get()[0]
    ];
});
