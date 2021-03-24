<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Product;
use File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Image;

class ResizeImage extends Job implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, SerializesModels;

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
	public function handle() {
    ini_set('memory_limit', '20M');

		$path = 'uploads/product/image_resize';
		  $destinationPath = base_path($path);

		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true, true);
		}

			$products = Product::whereNull('main_image_resize')->orderBy("id", "desc")->get();
		foreach ($products as $product) {
			$image = $product->main_image;
			if(isset($image) && $image!=null){
			$image_resize_path = $destinationPath . '/' . $product->id . ".webp";
			//resize image

			$ext = pathinfo($image, PATHINFO_EXTENSION);
			if ($ext != "png") {
			$img = Image::make($image);
			$img->encode('webp', 90)->save($image_resize_path);
			} elseif($ext == "png") {
			$image_form = imagecreatefrompng($image);
			imagepalettetotruecolor($image_form);
			imageAlphaBlending($image_form, true); // alpha channel
			imageSaveAlpha($image_form, true); // save alpha setting

			$img = Image::make($image_form);
			$img->encode('webp', 90)->save($image_resize_path);
			}

			//save image
			$product->main_image_resize = $path . '/' . $product->id . ".webp";
			$product->save();
		}
		}

		echo "Products Resized Done" ;

	}

	public function failed(Throwable $exception) {
		\File::append(storage_path('logs') . '/' . basename(get_class($this)) . '.log', $exception->getMessage() . PHP_EOL);
	}
}
