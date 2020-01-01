<?php

use Faker\Generator as Faker;
$name = '/uploads/clients/'.date('Y-m-d').'/';
$path = base_path() .$name ;
if (!\File::exists($path)) {
    \File::makeDirectory($path, 0777, true);
}
$factory->define(App\Client::class, function (Faker $faker) use($path,$name){
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'phone' => str_random(10),
        'home_telphone' =>str_random(10),
        'image'  => $faker->image($path,700,500,'people',false)
    ];
});
