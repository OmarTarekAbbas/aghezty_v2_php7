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
        if($request->has('Installments')){
          $Installments = json_encode($request->Installments);
        }
        $brand->Installments = $Installments;
        $limitPrice = request('limit_price',0);
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
        $products = Product::where('brand_id',$id)->latest('created_at')->paginate(10);
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
        $categories = \App\Category::select('categories.*')
        ->join('categories AS t2', 'categories.parent_id', 't2.id')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->where('products.brand_id', $id)
        ->groupBy('categories.id')
        ->get();
        return view('brand.form',compact('brand','languages','categories'));
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
      if($request->has('Installments')){
        $Installments = json_encode($request->Installments);
      }
      $brand->Installments = $Installments;
      $limitPrice = request('limit_price',0);
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
          // $this->delete_image_if_exists(base_path('/uploads/brand/'.basename($brand->image)));
      }

      $brand->update($request->except('title'));

      //calculate Installments price
      $this->calculateProductInstallmentsPrice($id,$Installments,$limitPrice,$request);

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

    public function calculateProductInstallmentsPrice($brand_id , $installments, $limitPrice, $request)
    {
      $this->emptyProductInstallment($brand_id , $installments, $limitPrice, $request);

      $products = Product::where('brand_id',$brand_id)
      ->where(function($q) use ($limitPrice){
        $q->where('price','>=',$limitPrice);
        $q->orWhere('price_after_discount','>=',$limitPrice);
      });

      if($request->has('category_ids')){
        $products = $products->whereIn('category_id',$request->category_ids);
      }

      $products = $products->get();

      $installments = json_decode($installments,true);

      $product_installments[6]  = null;
      $product_installments[12] = null;
      $product_installments[18] = null;
      $product_installments[24] = null;

      foreach ($products as $key => $product) {
        $price = $product->price;
        if($product->price_after_discount){
          $price = $product->price_after_discount;
        }
        if($installments[6])
          $product_installments[6]  = ceil(($price / 6 )  + (($price)*($installments[6]/100) / 6));
        if($installments[12])
          $product_installments[12] = ceil(($price / 12 ) + (($price)*($installments[12]/100) / 12));
        if($installments[18])
          $product_installments[18] = ceil(($price / 18 ) + (($price)*($installments[18]/100) / 18));
        if($installments[24])
          $product_installments[24] = ceil(($price / 24 ) + (($price)*($installments[24]/100) / 24));

        $product->installments = json_encode($product_installments);
        $product->save();
      }

    }

    protected function emptyProductInstallment($brand_id , $installments, $limitPrice, $request)
    {
      $products = Product::where('brand_id',$brand_id)->update(['installments' => null]);
    }
}
