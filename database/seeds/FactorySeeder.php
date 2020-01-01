<?php

use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 5)->create()->each(function ($category){
            for ($i = random_int(1,3); $i; $i--) {
                $category->sub_cats()->save(factory(App\Category::class)->create());
                }
            });
        factory(App\Brand::class, 10)->create();
        factory(App\Client::class, 10)->create();
        factory(App\User::class, 1)->create();
        factory(App\Product::class, 5)->create()->each(function ($product){
            for ($i = random_int(1,6); $i; $i--) {
                $product->images()->save(factory(App\ProductImage::class)->create());
                }
            });
        factory(App\ClientRate::class, 20)->create();
        factory(App\ClientAddress::class, 20)->create();
        factory(App\Post::class, 20)->create();
    }
}
