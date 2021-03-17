<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Advertisement;
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
      dispatch(new ResizeImage());
      echo "done";
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
        $image_resize_path = $destinationPath . '/' . $brand->id . ".png";
        //resize image
        $img = Image::make($image);
        $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save($image_resize_path);
        //save image
        $brand->image_resize = $path . '/' . $brand->id . ".png";
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
        $image_resize_path = $destinationPath . '/' . $advertisemet->id . ".png";
        //resize image
        $img = Image::make($image);
        $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save($image_resize_path);
        //save image
        $advertisemet->image_resize = $path . '/' . $advertisemet->id . ".png";
        $advertisemet->save();
      }
      }

      echo "Advertisemets Resized Done" ;
    }



    public function test_job()
    {

      for ($i=1; $i <100 ; $i++) {

        \App\Post::create([

          "product_id" =>  1 ,
          "operator_id" => 1 ,
          "user_id"=> 1 ,
          "published_date"=> "2021-03-02",
          "active"=> 1 ,
          "url"=>"test"

               ]) ;

      }

      echo "Done" ;
    }

}
