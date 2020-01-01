<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Language;
use App\Product;
use Validator;
class BrandController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $languages = Language::all();
        return view('brand.index',compact('brands','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = null;
        $languages = Language::all();
        return view('brand.form',compact('brand','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
                'title' => 'required|array',
                'title.*' => 'required|string',
                'image' => ''
          ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $brand = new Brand();
        $brand->fill($request->except('title'));
        foreach ($request->title as $key => $value)
        {
            $brand->setTranslation('title', $key, $value);
        }

        if($request->image)
        {
          $imgExtensions = array("png","jpeg","jpg");
          $file = $request->image;
          if(! in_array($file->getClientOriginalExtension(),$imgExtensions))
          {
              \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
              return back();
         }
       }

      $brand->save();

      \Session::flash('success', 'Brand Created Successfully');
      return redirect('/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $brand = Brand::findOrFail($id);
        $products = Product::where('brand_id',$id)->paginate(10);
        $languages = Language::all();
        if ($request->ajax()) {
            return view('product.result',compact('products','languages'));
        }
        return view('product.index',compact('products','brand','languages'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        $languages = Language::all();
        return view('brand.form',compact('brand','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
                'title' => 'required|array',
                'title.*' => 'required|string',
                'image' => ''
          ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }
      $brand = Brand::findOrFail($id);
      foreach ($request->title as $key => $value)
      {
        $brand->setTranslation('title', $key, $value);
      }
      if($request->image){
        $imgExtensions = array("png","jpeg","jpg");
        $file = $request->image;
        if(! in_array($file->getClientOriginalExtension(),$imgExtensions))
        {
            \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
            return back();
        }
        $this->delete_image_if_exists(base_path('/uploads/brand/'.basename($brand->image)));
      }

      $brand->update($request->except('title'));

      \Session::flash('success', 'Brand Updated Successfully');
      return redirect('/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $brand = Brand::findOrFail($id);

      if($brand->image){
        $this->delete_image_if_exists(base_path('/uploads/brand/'.basename($brand->image)));
      }
      $brand->delete();

      \Session::flash('success', 'Brand Delete Successfully');
      return back();
    }
}
