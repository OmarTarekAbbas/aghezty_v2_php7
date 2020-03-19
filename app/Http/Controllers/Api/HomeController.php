<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Client;
use App\ClientAddress;
use App\ClientRate;
use App\Contact;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Brand;
use App\Product;
use Validator;
use App\ProductImage;
use App\Language;
use App\Order;
use App\Coupon;
use App\OrderDetail;
use App\Governorate;
use App\City;
use App\Advertisement;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use Braintree_Gateway;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //Login And Redister To Create Token
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:clients,email',
            'password' => 'required',
            'phone' => 'required|unique:clients,phone',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() ,'status' => 'error' , 'message' => 'Error In Data'], 422);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $client = Client::create($input);
        if($request->has('city_id') && $request->has('address')){
            ClientAddress::create([
                'client_id' => $client->id,
                'city_id'   => $request->city_id,
                'address'   => $request->address
            ]);
        }
        $success['token'] = $client->createToken('MyApp')->accessToken;
        $success['client'] = $client;
        return response()->json(['data' => $success,'status' => 'success' , 'message' => 'Register Successfully'], 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data'], 422);
        }
        $clients = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('client')->attempt($clients)) {
            $client = Auth::guard('client')->user();
            $success['token'] = auth()->guard('client')->user()->createToken('MyApp')->accessToken;
            return response()->json(['data' => $success , 'status' => 'success' , 'message' => 'Login Successfully'], 200);
        } else {
            return response()->json(['data' => ['These credentials do not match our records'], 'status' => 'error' , 'message' => 'These credentials do not match our records'], 422);
        }
    }
    // Make All Functionality Under Authorization Token
    public function index()
    {

      $slides = Advertisement::where('type', 'slider')->where('active', 1)->orderBy('order', 'ASC')->get();
      $ads = Advertisement::where('type', 'homeads')->where('active', 1)->orderBy('order', 'ASC')->get();
      $recently_added = Product::where('recently_added', 1)->get();
      $selected_for_you = Product::where('selected_for_you', 1)->get();
      $homepage_cat = Category::where('homepage', 1)->get();

      if(count($recently_added) != 6){
          $limit = 6 - count($recently_added);
          $recently_addedR = Product::orderBy('created_at', 'desc')->limit($limit)->get();
          $recently_added = $recently_added->toBase()->merge($recently_addedR);
      }

      if(count($selected_for_you) != 6){
          $limit = 6 - count($selected_for_you);
          $selected_for_youR = Product::all()->random($limit);
          $selected_for_you = $selected_for_you->toBase()->merge($selected_for_youR);
      }

      if(count($homepage_cat) != 6){
          $limit = 6 - count($homepage_cat);
          $homepage_catR = Category::whereNotNull('parent_id')->get()->random($limit);
          $homepage_cat = $homepage_cat->toBase()->merge($homepage_catR);
      }
      $data['slides']           = $slides;
      $data['ads']              = $ads;
      $data['recently_added']   = ProductResource::collection($recently_added);
      $data['selected_for_you'] = ProductResource::collection($selected_for_you);
      $data['homepage_cat']     = CategoryResource::collection($homepage_cat);

      return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Home Page Data' ],200);
    }
    public function categorys(Request $request)
    {
        $categorys = CategoryResource::collection(Category::whereNull('parent_id')->get());
        return response()->json(['status' => 'success' , 'data' => $categorys , 'message' => 'Get All Category' ],200);
    }
    public function products(Request $request)
    {
      $products = Product::query();
      if($request->has('category_id') && $request->category_id !=''){
          $products = $products->whereIn('category_id',explode(',',$request->category_id));
      }
      if($request->has('brand_id') && $request->brand_id !=''){
          $products = $products->whereIn('brand_id',explode(',',$request->brand_id));
      }
      if($request->has('from') && $request->from !=''){
          $products = $products->where('price','>=',$request->from);
      }
      if($request->has('to') && $request->to!=''){
          $products = $products->where('price','<',$request->to);
      }
      if($request->has('from_to') && $request->from_to!=''){
        $products = $products->whereBetween('price',explode(',',$request->from_to));
      }
      if($request->has('ifrom') && $request->ifrom !=''){
        $products = $products->whereHas('pr_value', function($q) use ($request){
          $q->join('properties','property_values.property_id','=','properties.id');
          $q->where('properties.title','LIKE' ,'%inch%');
          $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"),'>=',$request->ifrom);
        });
      }
      if($request->has('ito') && $request->ito!=''){
          $products = $products->whereHas('pr_value', function($q) use ($request){
          $q->join('properties','property_values.property_id','=','properties.id');
          $q->where('properties.title','LIKE' ,'%inch%');
          $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"),'=',$request->ito);
          });
      }
      if($request->has('ifrom_ito') && $request->ifrom_ito!=''){
        $products = $products->whereHas('pr_value', function($q) use ($request){
            $q->join('properties','property_values.property_id','=','properties.id');
            $q->where('properties.title','LIKE' ,'%inch%');
            $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"),explode(',',$request->ifrom_ito));
        });
      }
      if($request->has('search') && $request->search!=''){
        $products = $products->whereLike(['title'],$request->search);
      }
      if($request->has('sorted') && $request->sorted!=''){
        $products = $products->orderBy(explode(',',$request->sorted) [0] , explode(',',$request->sorted) [1]);
      }
      if($request->has('offer') && $request->offer !=''){
        $products =  $products->orderBy('discount','desc');
      }
      if($request->has('last') && $request->last!=''){
        $products = $products->latest('created_at');
      }
      if($request->has('random') && $request->random!=''){
        $products = $products->inRandomOrder();
      }
      if($request->has('property_value_id')){
        $products = $products->whereHas('pr_value', function($q) use ($request){
          $q->whereIn('property_values.id', $request->property_value_id);
        });
      }
      $products = $products->paginate(get_limit_paginate());
      $products->appends($request->all());
      $data = new ProductCollection($products);
      return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Product' ],200);
    }
    public function brands(Request $request)
    {
        $brands = Brand::all();
        $brands_array = [];
        foreach ($brands as $brand) {
            $sub_cat_from_brand = $this->api_sub_cat_from_brand($brand->id);
            array_push($brands_array, [
              'id' => $brand->id,
              'title_en' => $brand->title,
              'title_ar' => $brand->getTranslation('title','ar'),
              'image' => $brand->image,
              'category' => $sub_cat_from_brand
            ]);
        }
        return response()->json(['status' => 'success' , 'data' => $brands_array , 'message' => 'Get All Brand' ],200);
    }
    public function inner_product(Request $request, $id)
    {
        $product = new ProductResource(Product::whereId($id)->first());
        return response()->json(['status' => 'success' , 'data' => $product , 'message' => 'Get Product' ],200);
    }
    public function getSettign(Request $request)
    {
        $setting = setting($request->setting);
        return response()->json(['status' => 'success' , 'data' => $setting , 'message' => 'Get Setting data' ],200);
    }
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $contact = Contact::create($request->all());
        return response()->json(['data' => $contact, 'status' => 'success' , 'message' => 'Add Contact Successfully'],200);
    }
    public function edit_profile(Request $request)
    {
        $client = Auth::user();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,email,'.$client->id,
            'name' => 'required',
            'phone' => 'required|unique:clients,phone,'.$client->id,
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error','message' => 'error in data'],422);
        }
        $user = Client::find($client->id);
        $user->update($request->all());
        return response()->json(['status' => 'success' , 'data' => $user,  'message' => 'Update Profile Successfully'],200);
    }
    public function updated_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Old Password'],422);
        }
        $client = Auth::user();
        $user = Client::find($client->id);
        if (!Hash::check($request->old_password, $user->password)) {
          return response()->json(['status' => 'error' , 'data' => ['Error In Old Password'],  'message' => 'Error In Old Password'],422);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['status' => 'success' , 'data' => $user,  'message' => 'Update Password Successfully'],200);
    }
    public function addresses(Request $request)
    {
        $client = Auth::user();
        $addresses = ClientAddress::where('client_id', $client->id)
                    ->join('cities', 'cities.id', '=', 'client_addresses.city_id')
                    ->join('governorates', 'governorates.id', '=', 'cities.governorate_id')
                    ->select('client_addresses.id','client_addresses.address','cities.id as city_id','cities.shipping_amount','governorates.id as gover_id','cities.city_en', 'cities.city_ar','governorates.title_en as governorate_en', 'governorates.title_ar as governorate_ar')
                    ->get();
        return response()->json(['status' => 'success' , 'data' => $addresses,  'message' => 'Get All Addresses'],200);
    }
    public function updated_address(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $client_address = ClientAddress::find($id);
        if(!$client_address){
          return response()->json(['data' => ['Error In Data'], 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $addresses = $client_address->update($request->all());
        return response()->json(['status' => 'success' , 'data' => $client_address,  'message' => 'Update Address Successfully'],200);
    }
    public function add_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => auth()->user()->id, 'address' => $request->address]);
        return response()->json(['data' => $address, 'status' => 'success' , 'message' => 'Add Address Successfully'],200);
    }
    public function delete_address($id)
    {
        $address = ClientAddress::find($id);
        if(!$address){
          return response()->json(['status' => 'error' , 'message' => 'Error In Data' , 'data' => ['Error In Data'] ],422);
        }
        $address->delete();
        return response()->json(['message' => 'Delete Address Successfully ', 'status' => 'success' , 'data' => (object)[] ],200);
    }
    public function check_coupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $found_coupon = Coupon::where('coupon',$request->coupon)->first();
        if(!$found_coupon){
            return response()->json(['message' => 'Not Correct Coupon' , 'data' => ['Not Correct Coupon']  , 'status' => 'error'],422);
        }
        $used_coupon = Coupon::where('coupon',$request->coupon)->where(function($q){
            $q->where('used',1);
            $q->orWhere('used',2);
        })->first();
        if($used_coupon){
            return response()->json(['message' => 'this coupon used befor' , 'data' => ['this coupon used befor'] , 'status' => 'error'],422);
        }
        $coupon = Coupon::where('coupon',$request->coupon)->first();
        $coupon->client_id = \Auth::user()->id;
        $coupon->used      = 1;
        $coupon->save();
        return response()->json(['data' => $coupon->value , 'status' => 'success' , 'message' => 'Added Coupon Successfully'],200);
    }
    public function my_cart(Request $request)
    {
        $language_id = Language::where('short_code', 'ar')->first()->id;
        $auth_carts = Cart::select('carts.id','products.title as title_en','tans_bodies.body as title_ar', \DB::raw("CONCAT('".url('/')."', products.main_image) AS main_image"),'carts.quantity','carts.price','carts.total_price','carts.product_id')
                      ->join('products','products.id','=','carts.product_id')
                      ->join('translatables','translatables.record_id','=','products.id')
                      ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
                      ->where('translatables.table_name','=','products')
                      ->where('translatables.column_name','=','title')
                      ->where('tans_bodies.language_id',$language_id)
                      ->where('client_id',\Auth::user()->id)->get();
        return response()->json(['message' => 'get all carts data' , 'data' => $auth_carts , 'status' => 'success'],200);
    }
    public function store_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' =>  'required'
      ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        $product = Cart::where('client_id',\Auth::user()->id)->where('product_id',$request->product_id)->first();
        if($product){
            return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
        }
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::user()->id,
            'quantity'=> $request->quantity,
            'price'  => $request->price,
            'total_price' => $request->price * $request->quantity
        ]);
        return response()->json(['success' => 'Added To Cart Successfully' , 'status' => 'success']);
    }
    public function update_cart(Request $request,$id)
    {
      $validator = Validator::make($request->all(), [
          'product_id' => '',
          'quantity' => '',
          'price' =>  ''
      ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all() , 'status' => 'error']);
        }
        $cart = Cart::find($id);
        if(!$cart){
          return response()->json(['status' => 'error' , 'message' => 'Not Fount Cart']);
        }
        $cart->quantity = $request->quantity;
        $cart->total_price = $request->quantity * $cart->price;
        $cart->save();
        return response()->json(['status' => 'success' , 'message' => 'update Cart Item Successfuly']);
    }
    public function delete_cart($id)
    {
        $cart = Cart::find($id);
        if(!$cart){
          return response()->json(['status' => 'error' , 'message' => 'Not Fount Cart']);
        }
        $cart->delete();
        return response()->json(['status' => 'success' , 'message' => 'delete Cart Item Successfuly']);
    }
    public function make_order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required',
            'payment' => 'required',
            'carts' => 'required|array'
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'status' => 'error' , 'message' => 'Error In Data'],422);
        }
        $address = ClientAddress::find($request->address_id);
        $city = \App\City::find($address->city_id);
        $total_price = array_sum(array_column($request->carts, 'total_price'));
        $count_coupon = 0;
        $coupons = \App\Coupon::where('client_id',\Auth::user()->id)->where('used',1)->get();
        foreach($coupons as $coupon){
            $count_coupon += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::user()->id,
            'address_id' =>$address->id,
            'shipping_amount' =>$city->shipping_amount,
            'total_price' =>  ($total_price + $city->shipping_amount)-$count_coupon,
            'lang' => getCode(),
            'payment' => $request->payment
        ]);
        foreach($request->carts as $cart){
            $detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' =>$cart['product_id'],
                'quantity' =>$cart['quantity'],
                'price' =>$cart['price'],
                'total_price' =>$cart['total_price'],
            ]);
        }
        $client = \Auth::user();
        \Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
            $m->from($client->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
        });
        $link = url('order/'.$order->id);
        send_notification(' Make New order  #'.$order->id.' ',auth()->user()->id,$link);
        return response()->json(['data' => $order , 'status' => 'success' , 'message' => 'Order Added Successfully'],200);
    }
    public function add_rate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'rate' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'message' => 'error in data' , 'status' => 'error'],422);
        }

        $client_rate = ClientRate::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::user()->id,
            'rate' => $request->rate,
            'publish' => 0,
            'comment'=> $request->comment

        ]);
        return response()->json(['data' => $client_rate , 'status' => 'success' , 'message' => 'Rate Added Successfully'],200);
    }
    public function is_available(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'product_id' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'message' => 'error in data' , 'status' => 'error'],422);
        }
        $contact = Contact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'name'  => $request->name ,
            'product_id' => $request->product_id,
            'city_id' =>$request->city_id,
            'lang' => getCode()
        ]);
        $products = Product::whereId($request->product_id)->get();
        \Mail::send('front.mail2', ['products' => $products , 'client' => $contact , 'subject' => __('front.new_request_for_this_product')], function ($m) use ($request) {
            $m->from($request->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.product'));
        });
        $link = url('unavailable');
        send_notification('Request For unavailable Product #'.$request->product_id.' ',auth()->user()->id,$link);
        return response()->json(['data' => $contact , 'message' => 'Send Mail Successfully' , 'status' => 'success'],200);

    }
    public function details_client()
    {
        $client = Auth::user();
        return response()->json(['data' => $client , 'status' => 'success' , 'message' => 'get user data'], 200);
    }
    public function governorate()
    {
      $governorate = Governorate::select('governorates.id','governorates.title_en as governorate_en', 'governorates.title_ar as governorate_ar')->get();
      return response()->json(['data' => $governorate , 'message' => 'Get All Governorate' , 'status' => 'success'],200);
    }
    public function city(Request $request)
    {
      $city = City::latest('created_at');
      if($request->has('governorate_id')){
        $city = $city->where('governorate_id',$request->governorate_id);
      }
      $city = $city->select('cities.id','cities.city_en', 'cities.city_ar','cities.governorate_id')->get();
      return response()->json(['data' => $city ,'message' => 'Get All City' , 'status' => 'success'],200);
    }
    // use for get brands
    public function api_sub_cat_from_brand($brand_id)
    {
      $language_id = Language::where('short_code', 'ar')->first()->id;
      $cats   = Category::select('categories.id','categories.title as title_en','tans_bodies.body as title_ar','categories.image','categories.coding','categories.parent_id')
                 ->join('products','products.category_id','=','categories.id')
                 ->join('brands','products.brand_id','=','brands.id')
                 ->join('translatables','translatables.record_id','=','categories.id')
                 ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
                 ->where('translatables.table_name','=','categories')
                 ->where('translatables.column_name','=','title')
                 ->where('tans_bodies.language_id',$language_id)
                 ->where('products.brand_id',$brand_id)
                 ->groupBy('categories.id')
                 ->get();
      return $cats;
    }

    public function order_client()
    {
      $client = Auth::user();
      $order = Order::where('client_id', $client->id)->get();
      return response()->json(['status' => 'success' , 'data' => $order,  'message' => 'Get All Addresses'],200);
    }
}
