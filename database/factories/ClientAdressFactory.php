<?php

use Faker\Generator as Faker;

$factory->define(App\ClientAddress::class, function (Faker $faker){
    return [
        'details'  => random_int(1,5),
        'address' => $faker->text(random_int(30,100)),
        'city_id' => App\City::inRandomOrder()->get()[0],
        'client_id' => App\client::inRandomOrder()->get()[0],
    ];
});
