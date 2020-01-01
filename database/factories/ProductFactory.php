<?php

use Faker\Generator as Faker;

$path = base_path() . '/uploads/product/main_image/';
if (!\File::exists($path)) {
    \File::makeDirectory($path, 0777, true);
}
$price = random_int(100,10000);
$factory->define(App\Product::class, function (Faker $faker) use ($path,$price){
    return [
        'title' => $faker->text(random_int(5,12)) ,
        'description' =>$faker->text(random_int(30,1000)) ,
        'short_description' =>$faker->text(random_int(30,100)) ,
        'discount' => 15,
        'price' => $price,
        'price_after_discount' => ($price - ($price * (15/100))),
        'category_id'=> App\Category::whereNotNull('parent_id')->inRandomOrder()->get()[0] ,
        'brand_id'=> App\Brand::inRandomOrder()->get()[0] ,
        'special' => 1,
        'active' => 1,
        'image'  => $faker->image($path,1280,720,'technics',false)
    ];
});
