<?php

use Faker\Generator as Faker;

$path = base_path() . '/uploads/category/' ;
if (!\File::exists($path)) {
    \File::makeDirectory($path, 0777, true);
}
$factory->define(App\Category::class, function (Faker $faker) use($path) {
    return [
        'title' => $faker->text(random_int(5,12)),
        'image' => $faker->image($path,1280,720,'technics',false),
        'coding' => rand(1111,9999)
    ];
});
