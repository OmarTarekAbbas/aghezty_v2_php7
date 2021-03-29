<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductImage;
use App\Country;
use Validator;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = ProductImage::query();
        if($request->has('product_id') && $request->product_id != ''){
          $images = $images->where('product_id',$request->product_id);
        }
        $images = $images->get();

        return view('product.image_control',compact('images'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $image = ProductImage::findOrFail($id);

      $image->delete();

      \Session::flash('success', 'ProductImage Delete Successfully');
      return back();
    }

    public function orderImage($id,Request $request)
    {
      $images = ProductImage::where('product_id',$id)->get();

      foreach ($images as $key => $value) {
        //$value->image = parse_url($request->list[$key], PHP_URL_PATH);
        // $value->image = $request->list[$key];
        // dd($request->list[$key]);

        $starting_pos = strpos($request->list[$key],"/uploads");
        $value->image = substr($request->list[$key], $starting_pos, strlen($request->list[$key]));
        $value->save();
      }

      return 'ok';
    }
}
