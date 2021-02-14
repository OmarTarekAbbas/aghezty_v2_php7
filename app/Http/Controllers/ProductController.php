<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\ProductImage;
use Validator;
use App\Language;
use App\DeleteProduct;
use App\Events\Products;
use Illuminate\Http\Request;
use App\Constants\OrderStatus;
use App\Constants\PaymentStatus;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //return $request->all();

      $products = Product::select('products.*','products.id as product_id');
      if ($request->has('search') && $request->search != '') {
        $products = $products->join('translatables','translatables.record_id','=','products.id')
          ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
          ->where('translatables.table_name','products')
          ->where('translatables.column_name','title')
          ->latest('products.created_at')
          ->where(function($q) use ($request){
            $q->where('products.title', 'like', '%' . $request->search . '%');
            $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
          });
      }

        if($request->has('category_id') && $request->category_id != ''){
          $products = $products->whereIn('category_id',(array)$request->category_id);
        }
        if($request->has('brand_id') && $request->brand_id != ''){
          $products = $products->whereIn('brand_id',(array)$request->brand_id);
        }
        if($request->has('search_model') && $request->search_model != ''){
          $products = $products->whereIn('short_description',explode(',',$request->search_model));
        }
        if($request->has('sku') && $request->sku != ''){
          $products = $products->whereIn('sku',explode(',',$request->sku));
        }
        $products = $products->paginate(request('limit',10));
        $languages = Language::all();
        if ($request->ajax()) {
            return view('product.result',compact('products','languages'));
        }
        return view('product.index',compact('products','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $product   = Null;
       $categorys = Category::whereNotNull('parent_id')->get();
       $brands    = Brand::all();
       $languages = Language::all();
       return view('product.form',compact('product','categorys','brands','languages'));
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
            'title' => '',
            'main_image' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'inch' => '',
            'discount' => '',
            'special'  => '',
            'active'    => '',
            'description.*'  => 'required',
            'short_description.*'  => 'required',
            'category_id'  => 'required',
            'brand_id'  => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $images = [];
        $category = Category::find($request->category_id);
        $brand = Brand::find($request->brand_id);
        $imgExtensions = array("png","jpeg","jpg");
        $file = $request->main_image;
        $request->special = ($request->special) ? 1:0;
        $request->active = ($request->active) ? 1:0;
        if(! in_array($file->getClientOriginalExtension(),$imgExtensions))
        {
            \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
            return back();
        }
        if ($request->has('images'))
        {
            foreach ($request->images as $key=>$image) {
                if(! in_array($image->getClientOriginalExtension(),$imgExtensions))
                {
                    \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
                    return back();
                }
                $images[] = new ProductImage(['image' => $image]);
            }
        }

        if($request->has('Installments')){
          $Installments = json_encode($request->Installments);
        }

        $product = new Product();
        $product->fill($request->except('title','images','counter_img','description','short_description','property_value_id','key_feature','warranty','delivery_time','cash_on_delivery','return_or_refund','offer'));

        $product->Installments = $Installments;
        foreach ($request->title as $key => $value) {
            $product->setTranslation('title', $key, $value);
        }
        foreach ($request->description as $key => $value) {
            $product->setTranslation('description', $key, $value);
        }
        foreach ($request->short_description as $key => $value) {
            $product->setTranslation('short_description', $key, $value);
        }
        // foreach ($request->warranty as $key => $value) {
        //   if($value){
        //     $product->setTranslation('warranty', $key, $value);
        //   }
        // }
        // foreach ($request->delivery_time as $key => $value) {
        //   if($value){
        //     $product->setTranslation('delivery_time', $key, $value);
        //   }
        // }
        // foreach ($request->cash_on_delivery as $key => $value) {
        //   if($value){
        //     $product->setTranslation('cash_on_delivery', $key, $value);
        //   }
        // }
        // foreach ($request->return_or_refund as $key => $value) {
        //   if($value){
        //     $product->setTranslation('return_or_refund', $key, $value);
        //   }
        // }
        foreach ($request->key_feature as $key => $value) {
          if($value){
            $product->setTranslation('key_feature', $key, $value);
          }
        }
        $product->discount = $request->discount;
        if (!$request->discount && $request->price > $request->price_after_discount  && $request->price_after_discount > 0) {
          $product->discount = ceil(($request->price - $request->price_after_discount)*100) /$request->price ;
        }
        //dd($product);
        if($request->offer == null){
          $product->offer = 0;
        }else{
          $product->offer = 1;
        }
        $product->save();

        if($request->has('property_value_id')){
          $property_value_id = array_values(array_filter($request->property_value_id));
          $product->pr_value()->attach($property_value_id);
        }

        if ($request->has('images')){
            $product->images()->saveMany($images);
        }
        // broadcast(new Products('The New Product is Added You Can See It Now',url('clients/productv2/'.$product->id)))->toOthers();
        \Session::flash('success', 'Product Created Successfully');
        return redirect(route("admin.image.index",['product_id'=>$product->id]));
        //return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $product   = Product::find($id);
        $categorys = Category::whereNotNull('parent_id')->get();
        $brands    = Brand::all();
        $languages = Language::all();
        if ($request->ajax()) {
            //return [$product,$categorys,$brands,$languages];
            return view('product.ajax_form',compact('product','categorys','brands','languages'));
        }
        return view('product.form',compact('product','categorys','brands','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => '',
            'main_image' => '',
            'price' => 'required',
            'stock' => 'required',
            'inch' => '',
            'discount' => '',
            'offer' => '',
            'special'  => '',
            'active'    => '',
            'description.*'  => 'required',
            'short_description.*'  => 'required',
            'category_id'  => 'required',
            'brand_id'  => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $images = [];
        $imgExtensions = array("png","jpeg","jpg");
        $request->special = ($request->special) ? 1:0;
        $request->active = ($request->active) ? 1:0;
        //$request->offer = ($request->offer) ? 1:0;

        $product = Product::find($id);


        if($request->has('Installments')){
          $Installments = json_encode($request->Installments);
        }
        $product->Installments = $Installments;

        if($request->has('main_image'))
        {
            $file = $request->main_image;
            if(! in_array($file->getClientOriginalExtension(),$imgExtensions))
            {
                \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
                return back();
            }
            $this->delete_image_if_exists(base_path('/uploads/product/main_image/'.basename($product->main_image)));
         }
        if ($request->has('images'))
        {
            foreach ($request->images as $key=>$image) {
                if(! in_array($image->getClientOriginalExtension(),$imgExtensions))
                {
                    \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
                    return back();
                }
                 $images[] = new ProductImage(['image' => $image]);
            }
        }
        foreach ($request->title as $key => $value) {
          $product->setTranslation('title', $key, $value);
        }
        foreach ($request->description as $key => $value) {
            $product->setTranslation('description', $key, $value);
        }
        foreach ($request->short_description as $key => $value) {
            $product->setTranslation('short_description', $key, $value);
        }
        // foreach ($request->warranty as $key => $value) {
        //   if($value){
        //     $product->setTranslation('warranty', $key, $value);
        //   }
        // }
        // foreach ($request->delivery_time as $key => $value) {
        //   if($value){
        //     $product->setTranslation('delivery_time', $key, $value);
        //   }
        // }
        // foreach ($request->cash_on_delivery as $key => $value) {
        //   if($value){
        //     $product->setTranslation('cash_on_delivery', $key, $value);
        //   }
        // }
        // foreach ($request->return_or_refund as $key => $value) {
        //   if($value){
        //     $product->setTranslation('return_or_refund', $key, $value);
        //   }
        // }
        foreach ($request->key_feature as $key => $value) {
          if($value){
            $product->setTranslation('key_feature', $key, $value);
          }
        }
        $product->discount = $request->discount;
        if (!$request->discount && $request->price > $request->price_after_discount && $request->price_after_discount > 0) {
          $product->discount = ceil(($request->price - $request->price_after_discount)*100) /$request->price ;
        }

        if($request->offer == "on"){
          $product->offer = 1;
        }else{
          $product->offer = 0;
        }
        $product->save();

        if($request->has('property_value_id')){
          $property_value_id = array_values(array_filter($request->property_value_id));
          $product->pr_value()->sync($property_value_id);
        }

        $product->update($request->except('title','images','counter_img','description','short_description','discount','key_feature','warranty','delivery_time','cash_on_delivery','return_or_refund','offer'));
        if ($request->has('images')){
            $product->images()->saveMany($images);
        }
        if($request->ajax()){
            return response()->json(['status' => 'success' , 'id' => $id]);
        }
        \Session::flash('success', 'Product Update Successfully');

        return redirect(
          session()->has('redirect_edit_url') ? (strpos(session()->get('redirect_edit_url'), "?") ? session()->get('redirect_edit_url')."&brand_id=".$product->brand_id : session()->get('redirect_edit_url').'?brand_id='.$product->brand_id  ) : 'product?category_id='.$request->category_id
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        foreach($product->images as $image)
        {
            if(file_exists(base_path('/uploads/product/images/'.basename($image->image))))
            {
                unlink(base_path('/uploads/product/images/'.basename($image->image))) ;
            }
        }
        if($product->delete()){
        $delete_the_product_from_this_table_and_save_it_in_the_table_delete_products = new DeleteProduct();
        $delete_the_product_from_this_table_and_save_it_in_the_table_delete_products->product_id	= $id;
        $delete_the_product_from_this_table_and_save_it_in_the_table_delete_products->category_id	= $product->category_id;
        $delete_the_product_from_this_table_and_save_it_in_the_table_delete_products->save();
        }
        \Session::flash('success', 'Product Delete Successfully');
        return back();

    }

    public function delete_image($id)
    {
        $image = ProductImage::find($id);
        $image->delete();
        return "Delete Successful";
    }

    public function dublicate_product($id)
    {
        $product = Product::find($id);
        $newProd = $product->replicate();

        $title = $product->getTranslation('title','ar');
        $newProd->setTranslation('title', 'ar', $title);

        $description = $product->getTranslation('description','ar');
        $newProd->setTranslation('description', 'ar', $description);

        $short_description = $product->getTranslation('short_description','ar');
        $newProd->setTranslation('short_description', 'ar', $short_description);

        $warranty = $product->getTranslation('warranty','ar');
        $newProd->setTranslation('warranty', 'ar', $warranty);

        $delivery_time = $product->getTranslation('delivery_time','ar');
        $newProd->setTranslation('delivery_time', 'ar', $delivery_time);

        $cash_on_delivery = $product->getTranslation('cash_on_delivery','ar');
        $newProd->setTranslation('cash_on_delivery', 'ar', $cash_on_delivery);

        $return_or_refund = $product->getTranslation('return_or_refund','ar');
        $newProd->setTranslation('return_or_refund', 'ar', $return_or_refund);

        $key_feature = $product->getTranslation('key_feature','ar');
        $newProd->setTranslation('key_feature', 'ar', $key_feature);

        $newProd->save();

        return redirect('product/'.$newProd->id.'/edit');
    }

    public function get_excel()
    {
        // $sql = 'SELECT  o.title , o.id FROM  categories as o WHERE NOT EXISTS (select * from categories as c where o.id = c.parent_id )';
        // $res = \DB::select($sql);
        // foreach ($res as $key => $value) {
        //   $categorys[$value->id] = $value->title;
        // }
        $categorys = Category::all();
        $brands    = Brand::all();
        return view('product.excel',compact('categorys','brands'));
    }

    public function store_excel(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $counter = 0 ;
        $total_counter = 0 ;
        $category = Category::find($request->category_id);
        $brand = Brand::find($request->brand_id);
        ini_set('max_execution_time', 60000000000);
        ini_set('memory_limit', -1);

        if ($request->hasFile('fileToUpload')) {
            $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
            if ($ext != 'xls' && $ext != 'xlsx' && $ext != 'csv') {
                $request->session()->flash('failed', 'File must be excel');
                return back();
            }

            $file = $request->file('fileToUpload');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!$file->move(base_path().'/uploads/product/'.date('Y-m-d').'/excel',  $filename) ){
                return back();
            }

            \Excel::filter('chunk')->load(base_path().'/uploads/product/'.date('Y-m-d').'/excel/'.$filename)->chunk(100, function($results) use ($request,&$counter,&$total_counter,&$category,&$brand)
            {
                foreach ($results as $row) {
                    $total_counter++;
                    $product = new Product();
                    // $product->setTranslation('title', 'ar', $category->getTranslation('title','ar').'-'.$brand->getTranslation('title','ar').'-'.$row->model_ar);
                    // $product->setTranslation('title', 'en', $category->getTranslation('title','en').'-'.$brand->getTranslation('title','en').'-'.$row->model_en);
                    $product->setTranslation('title', 'ar', $row->title_ar);
                    $product->setTranslation('title', 'en', $row->title_en);
                    $product->setTranslation('description', 'ar', $row->description_ar);
                    $product->setTranslation('description', 'en', $row->description_en);
                    $product->setTranslation('short_description', 'ar', $row->model_ar);
                    $product->setTranslation('short_description', 'en', $row->model_en);
                    $product->brand_id = $request->brand_id;
                    $product->category_id = $request->category_id;
                    $product->price = $row->price;
                    $product->discount = $row->discount;
                    $product->sku = $row->sku;
                    if($row->price_after_discount){
                      $product->price_after_discount = $row->price_after_discount;
                    }
                    else{
                      $dis = ($row->discount) ? $row->discount : 0;
                      $product->price_after_discount = $row->price - $dis;
                    }
                    $product->stock = $row->stock;
                    $product->inch = isset($row->inch) ? $row->inch : null;
                    $product->main_image = $row->main_image;
                    $product->save();
                    $gallery  = explode(',',$row->gallery);
                    if (count($gallery) > 0){
                        foreach($gallery as $value){
                            $product->images()->create([
                                'image' => $value
                            ]);
                        }

                    }
                    if ($product)
                    {
                        $counter++ ;
                    }
                }
            },false);
        }else{
            $request->session()->flash('failed', 'Excel file is required');
            return back();
        }
        //    unlink(base_path().'/uploads/rbt/excel/'.$filename);
        $failures = $total_counter - $counter ;
        $request->session()->flash('success', $counter.' item(s) created successfully, and '.$failures.' item(s) failed');
        broadcast(new Products('The New Product is Added You Can See It Now',url('clients/productsv2?sub_category_id='.$request->category_id.'&brand_id='.$request->brand_id.'')))->toOthers();
        //return redirect('category/'.$request->category_id);
        return redirect('product');
    }

    public function getDownload()
    {
        $file= base_path(). "/files/product.xlsx";

        $headers = array(
                  'Content-Type: application/xlsx',
                );
        return response()->download($file, 'product.xlsx', $headers);
    }

    public function delete_all_product(Request $request)
    {
      $products = Product::whereIn('id',explode(',',$request->product_ids))->delete();
      return back()->with('success','Download All Product SuccessFully');
    }

    public function update_all_product(Request $request)
    {
      //return $request->all();
      $col = $request->column;
      $products = Product::whereIn('id',explode(',',$request->product_ids))->get();
      foreach ($products as $key => $value) {
        if($request->column != 'minus'){
          $value[$request->column] = $request->value;
        }
        if($request->column == 'discount'){
          $value->price_after_discount = $value->price - (($value->price * $request->value)/100);
        }
        if($request->column == 'minus'){
          $value->price_after_discount = $value->price - $request->value;
        }
        $value->save();
      }
      return back()->with('success','Update All Product SuccessFully');
    }

    public function updateOldSolidCountInProduct()
    {
      $order_details = \App\OrderDetail::whereHas("order",function($query){
        $query->where('orders.status','=', OrderStatus::UNDER_SHIPPING);
        $query->orWhere('orders.status','=', OrderStatus::FINISHED);
        $query->orWhere('orders.payment_status','=', PaymentStatus::Success);
      })->get();
      foreach ($order_details as $key => $order_detail) {
        $product = Product::find($order_detail->product_id);
        $product->solid_count = $product->solid_count + $order_detail->quantity;
        //dd($product);
        $product->save();
      }

      echo "Solid Done"  ;
    }

    public function updateOldProductWithDiscount()
    {
      $products = Product::where("price_after_discount", ">", "0")->where(function($q){
        $q->where("discount",0);
        $q->orWhereNull("discount");
      })->get();
      // return $products;
      foreach ($products as $key => $product) {
        if($product->price > $product->price_after_discount) {
          $product->discount = ceil(($product->price - $product->price_after_discount)*100) / $product->price ;
          $product->save();
        }
      }
      return "ok";
    }
}
