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

		$path = 'uploads/product/image_resize';
		$destinationPath = base_path($path);

		if (!File::exists($path)) {
			File::makeDirectory($path, 0755, true, true);
		}

		$products = Product::whereNull('main_image_resize')->orderBy("id", "desc")->get();

		foreach ($products as $product) {
			$main_image = $product->main_image;
			$main_image_resize_path = $destinationPath . '/' . $product->id . ".png";
			//resize image
			$img = Image::make($main_image);
			$img->resize(500, 500, function ($constraint) {
				$constraint->aspectRatio();
			})->save($main_image_resize_path);
			//save image
			$product->main_image_resize = $path . '/' . $product->id . ".png";
			$product->save();
		}

	}

	public function failed(Throwable $exception) {
		\File::append(storage_path('logs') . '/' . basename(get_class($this)) . '.log', $exception->getMessage() . PHP_EOL);
	}

}
