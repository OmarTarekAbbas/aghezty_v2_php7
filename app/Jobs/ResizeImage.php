<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Product;
use Image;
use File;


class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */



    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      set_time_limit(-1);
      $path = 'uploads/product/image_resize';
      $destinationPath = base_path($path);

      if(!File::exists($path)) {
          File::makeDirectory($path, 0755, true, true);
      }

        $products = Product::whereNull('main_image_resize')->chunk(1000, function($chunk_products) use($path , $destinationPath) {

          foreach ($chunk_products as $product) {
            $main_image = $product->main_image;
            $main_image_resize_path = $destinationPath.'/'.$product->id.".png";
            //resize image
            $img = Image::make($main_image);
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($main_image_resize_path);
            //save image
            $product->main_image_resize = $path.'/'.$product->id.".png";
            $product->save();
          }
      });

  }

}
