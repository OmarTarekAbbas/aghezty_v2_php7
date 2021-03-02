<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
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

}
