<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Image;
use File;
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
      set_time_limit(-1);
        $path = 'uploads/product/image_resize';
        $destinationPath = base_path($path);

        if(!File::exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }

        $products = Product::all();
        foreach ($products as $key => $product) {
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

        return back()
            ->with('success','Image Upload successful');
    }

}
