<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Language;
use Illuminate\Support\Facades\Lang;
use Validator;
use App\Product;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::whereNull('parent_id')->get();
        $languages = Language::all();
        return view('category.index',compact('categorys','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = null;
        $parents = Category::all();
        $languages = Language::all();
        return view('category.form',compact('category','languages','parents'));
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
                  'coding' => 'required',
                  'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

      ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->fill($request->except('title'));
        foreach ($request->title as $key => $value)
        {
            $category->setTranslation('title', $key, $value);
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

        if ($request->hasFile('offer_image')) {
          if ($request->file('offer_image')->isValid()) {
              try {
                  $imgName = time() . '.' . $request->offer_image->getClientOriginalExtension();
                  $request->offer_image->move('uploads/offer_image', $imgName);
                  $category->offer_image = 'uploads/offer_image/'.$imgName;
              } catch (Illuminate\Filesystem\FileNotFoundException $e) {

              }
          }
        }

        if ($request->offer_image_link) {
            $category->offer_image_link = $request->offer_image_link;
        }

        if($category->save()){
          if(isset($category->offer_image) && $category->offer_image!=null){
            $path = 'uploads/offer_image/image_resize';
            $offer_image_resize = resizeImage($path, $category->offer_image);
            $category->offer_image_resize = $offer_image_resize;
            $category->save();
          }
        }

        \Session::flash('success', 'Category Created Successfully');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id',$id)->latest('created_at')->paginate(10);
        $languages = Language::all();
        if ($request->ajax()) {
            return view('product.result',compact('products','languages'));
        }
        return view('product.index',compact('products','category','languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::all();
        $languages = Language::all();
        return view('category.form',compact('category','languages','parents'));
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
                'coding' => 'required',
                'image' => '',

      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }
      $category = Category::findOrFail($id);
      foreach ($request->title as $key => $value) {
        $category->setTranslation('title', $key, $value);
    }


    $category->fill($request->except('title'));
      if($request->image){
        $imgExtensions = array("png","jpeg","jpg");
        $file = $request->image;
        if(! in_array($file->getClientOriginalExtension(),$imgExtensions))
        {
            \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
            return back();
       }
        $this->delete_image_if_exists(base_path('/uploads/category/'.basename($category->image)));
      }
      if ($request->hasFile('offer_image')) {
        if ($request->file('offer_image')->isValid()) {
          try {
            $imgName = time() . '.' . $request->offer_image->getClientOriginalExtension();
            $request->offer_image->move('uploads/offer_image', $imgName);
            $category->offer_image = 'uploads/offer_image/'.$imgName;
          } catch (Illuminate\Filesystem\FileNotFoundException $e) {

          }
        }
      }

      $category->offer_image_link = $request->offer_image_link;
      

      if($category->save()){
        if(isset($category->offer_image) && $category->offer_image!=null){
          $path = 'uploads/offer_image/image_resize';
          $offer_image_resize = resizeImage($path, $category->offer_image);
          $category->offer_image_resize = $offer_image_resize;
          $category->save();
        }
      }

      \Session::flash('success', 'Category Updated Successfully');
      return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::findOrFail($id);

      if($category->image){
        $this->delete_image_if_exists(base_path('/uploads/category/'.basename($category->image)));
      }
      foreach($category->sub_cats as $sub_cat){
        $this->delete_image_if_exists(base_path('/uploads/category/'.basename($sub_cat->image)));
      }
      $category->delete();

      \Session::flash('success', 'Category Delete Successfully');
      return back();
    }

    public function offer_image_delete($id)
    {
      $category = Category::findOrFail($id);
      $category->offer_image = null;
      $category->save();
      \Session::flash('success', 'Category Delete Successfully');
      return back();
    }
}
