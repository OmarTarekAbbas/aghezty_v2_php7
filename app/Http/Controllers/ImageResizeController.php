<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Advertisement;
use App\Category;
use Image;
use File;
use App\Jobs\ResizeImage;
class ImageResizeController extends Controller
{

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage()
    {
        return view('product.resizeImage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = base_path('uploads/test_omar');
        $img = Image::make($image->path());

        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$input['imagename']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resizeProductImage()
    {
     // dispatch(new ResizeImage());


     ini_set('memory_limit', '200M');

     $path = 'uploads/product/image_resize';
     $destinationPath = base_path($path);

     if (!File::exists($path)) {
       File::makeDirectory($path, 0755, true, true);
     }

     Product::whereNull('main_image_resize')->orderBy("id", "desc")->chunk(100, function ($products) use($destinationPath,$path){
       foreach ($products as $product) {
         $image = $product->main_image;
         if (isset($image) && $image != null) {
           $image_resize_path = $destinationPath . '/' . $product->id . ".webp";
           //resize image

           $ext = pathinfo($image, PATHINFO_EXTENSION);
           if ($ext != "png") {
             $img = Image::make($image);
             $img->encode('webp', 90)->save($image_resize_path);
           } elseif ($ext == "png") {
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
     });

     echo "Products Resized Done";


    }


    public function resizeProductImages(){
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

    public function resizeBrandImages(){

      $path = 'uploads/brand/image_resize';
		  $destinationPath = base_path($path);

      if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true, true);
      }

		  $brands = Brand::whereNull('image_resize')->orderBy("id", "desc")->get();

      foreach ($brands as $brand) {
        $image = $brand->image;
        $image_resize_path = $destinationPath . '/' . $brand->id . ".webp";
        //resize image

        $ext = pathinfo($image, PATHINFO_EXTENSION);
        if ($ext != "png") {
          $img = Image::make($image);
          $img->encode('webp', 90)->resize(132, 65)->save($image_resize_path);
        } elseif($ext == "png") {
          $image_form = imagecreatefrompng($image);
          imagepalettetotruecolor($image_form);
          imageAlphaBlending($image_form, true); // alpha channel
          imageSaveAlpha($image_form, true); // save alpha setting

          $img = Image::make($image_form);
          $img->encode('webp', 90)->resize(132, 65)->save($image_resize_path);
        }

        //save image
        $brand->image_resize = $path . '/' . $brand->id . ".webp";
        $brand->save();
      }

      echo "Brands Resized Done" ;
    }

    public function resizeAdvertisementImages(){
      $path = 'uploads/advertisement/image_resize';
		  $destinationPath = base_path($path);

      if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true, true);
      }

		  $advertisemets = Advertisement::whereNull('image_resize')->orderBy("id", "desc")->get();
      foreach ($advertisemets as $advertisemet) {
        $image = $advertisemet->image;
        if(isset($image) && $image!=null){
        $image_resize_path = $destinationPath . '/' . $advertisemet->id . ".webp";
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
        $advertisemet->image_resize = $path . '/' . $advertisemet->id . ".webp";
        $advertisemet->save();
      }
      }

      echo "Advertisemets Resized Done" ;
    }

    public function resizeOfferImages(){
      $path = 'uploads/offer_image/image_resize';
		  $destinationPath = base_path($path);

      if (!File::exists($path)) {
        File::makeDirectory($path, 0755, true, true);
      }

		  $categories = Category::whereNull('parent_id')->whereNull('offer_image_resize')->orderBy("id", "desc")->get();
      foreach ($categories as $category) {
        $image = $category->offer_image;
        if(isset($image) && $image!=null){
        $image_resize_path = $destinationPath . '/' . $category->id . ".webp";
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
        $category->offer_image_resize = $path . '/' . $category->id . ".webp";
        $category->save();
      }
      }

      echo "Offer Category Resized Done" ;
    }

}
