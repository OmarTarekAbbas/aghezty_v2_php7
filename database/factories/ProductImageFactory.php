<?php

use Faker\Generator as Faker;

$path = base_path() . '/uploads/product/images/';
if (!\File::exists($path)) {
    \File::makeDirectory($path, 0777, true);
}
$factory->define(App\ProductImage::class, function (Faker $faker) use ($path){
    return [
        'image'  => $faker->image($path,1280,720,'technics',false)
    ];
});
