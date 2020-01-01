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
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required',
            'phone' => 'required|unique:clients',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $client = Client::create($input);
        if($request->has('city_id') && $request->has('governorate_id') && $request->has('address')){
            ClientAddress::create([
                'client_id' => $client->id,
                'city_id'   => $request->city_id,
                'address'   => $request->address
            ]);
        }
        $success['token'] = $client->createToken('MyApp')->accessToken;
        $success['client'] = $client;
        return response()->json(['success' => $success], 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 401);
        }
        $clients = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('client')->attempt($clients)) {
            $client = Auth::guard('client')->user();
            $success['token'] = auth()->guard('client')->user()->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    // Make All Functionality Under Authorization Token
    public function categorys(Request $request)
    {
        $language_id = Language::where('short_code', 'ar')->first()->id;
        $categorys = Category::select('categories.id','categories.title as title_en','tans_bodies.body as title_ar','categories.image','categories.coding','categories.parent_id')
                     ->with(['sub_cats' => function ($query) use($language_id){
                            $query->select('categories.id','title as title_en','tans_bodies.body as title_ar','image','coding','parent_id');
                            $query->join('translatables','translatables.record_id','=','categories.id');
                            $query->where('translatables.table_name','=','categories');
                            $query->where('translatables.column_name','=','title');
                            $query->join('tans_bodies','tans_bodies.translatable_id','translatables.id');
                            $query->where('tans_bodies.language_id',$language_id);
                      }])
                     ->join('translatables','translatables.record_id','=','categories.id')
                     ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
                     ->where('translatables.table_name','=','categories')
                     ->where('translatables.column_name','=','title')
                     ->where('tans_bodies.language_id',$language_id)
                     ->whereNull('parent_id')->get();
        return response()->json(['status' => 'success' , 'data' => $categorys , 'message' => 'Get All Category' ]);
    }
    public function products(Request $request)
    {
        $products = Product::latest('products.created_at');
        if($request->has('category_id') && $request->category_id !=''){
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id',$request->category_id);
        }
        if($request->has('offer') && $request->offer !=''){
            $products =  $products->where('discount','>',0);
        }
        if($request->has('brand_id') && $request->brand_id !=''){
            $request->brand_id = (array) $request->brand_id;
            $products = $products->whereIn('brand_id',$request->brand_id);
        }
        if($request->has('from') && $request->from !=''){
            $products = $products->where('price','>=',$request->from);
        }
        if($request->has('to') && $request->to!=''){
            $products = $products->where('price','<',$request->to);
        }
        $products = $products->paginate(get_limit_paginate());
        $products->appends($request->all());
        $products_array = [];
        foreach ($products as $product) {
                $stars = round(\DB::table('client_rates')->where('product_id', $product->id)->avg('rate'));
                array_push($products_array, [
                  'id' => $product->id,
                  'title_en' => $product->title,
                  'title_ar' => $product->getTranslation('title','ar'),
                  'main_image' => $product->main_image,
                  'price' => $product->price,
                  'discount' => $product->discount,
                  'price_after_discount' => $product->price_after_discount,
                  'special' => $product->special,
                  'active' => $product->active,
                  'description_en' => $product->description,
                  'description_ar' => $product->getTranslation('description','ar'),
                  'short_description_en' => $product->short_description,
                  'short_description_ar' => $product->getTranslation('short_description','ar'),
                  'category_id' => $product->category_id,
                  'brand_id' => $product->brand_id,
                  'stock' => $product->stock,
                  'stars' => $stars,
                ]);
            }
        return response()->json(['status' => 'success' , 'data' => (object)['data' => $products_array , 'next_url' => $products->nextPageUrl()] , 'message' => 'Get All Product' ]);
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
        return response()->json(['status' => 'success' , 'data' => $brands_array , 'message' => 'Get All Brand' ]);
    }
    public function inner_product(Request $request, $id)
    {
        $product = Product::whereId($id)->first();
        $comment_array = [];
        $rates = ClientRate::join('clients', 'clients.id', '=', 'client_rates.client_id')
                 ->select('client_rates.rate', 'client_rates.comment', 'clients.name' , \DB::raw("DATE_FORMAT(client_rates.created_at,'%e %b %Y') as created"))
                 ->latest('client_rates.created_at')->where('product_id', $id)->where('client_rates.publish',1)->get();
        if($product){
        array_push($comment_array, [
          'id' => $product->id,
          'title_en' => $product->title,
          'title_ar' => $product->getTranslation('title','ar'),
          'main_image' => $product->main_image,
          'price' => $product->price,
          'discount' => $product->discount,
          'price_after_discount' => $product->price_after_discount,
          'special' => $product->special,
          'active' => $product->active,
          'description_en' => $product->description,
          'description_ar' => $product->getTranslation('description','ar'),
          'short_description_en' => $product->short_description,
          'short_description_ar' => $product->getTranslation('short_description','ar'),
          'category_id' => $product->category_id,
          'brand_id' => $product->brand_id,
          'stock' => $product->stock,
          'rates' => $rates
        ]);
      }
        return response()->json(['status' => 'success' , 'data' => $comment_array ? (object) $comment_array[0]:(object) $comment_array , 'message' => 'Get Product' ]);
    }
    public function service_center(Request $request)
    {
        $service = \DB::table('settings')->where('key','like', '%service_center%')->first();
        return response()->json(['status' => 'success' , 'data' => $service ? $service->value : '' , 'message' => 'Get Service Center' ]);
    }
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $contact = Contact::create($request->all());
        return response()->json(['data' => $contact, 'status' => 'success' , 'message' => 'Add Contact Successfully']);
    }
    public function edit_profile(Request $request)
    {
        $client = Auth::user();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,id,'.$client->id,
            'name' => 'required',
            'phone' => 'requre|unique:clients,id,'.$client->id,
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all(), 'status' => 'error']);
        }
        $user = Client::find($client->id);
        $user->update($request->all());
        return response()->json(['status' => 'success' , 'data' => $user,  'message' => 'Update Profile Successfully']);
    }
    public function updated_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all(), 'status' => 'error']);
        }
        $client = Auth::user();
        $user = Client::find($client->id);
        if (!Hash::check($request->old_password, $user->password)) {
          return response()->json(['status' => 'error' , 'data' => (object)[],  'message' => 'Error In Old Password']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['status' => 'success' , 'data' => $user,  'message' => 'Update Password Successfully']);
    }
    public function addresses(Request $request)
    {
        $client = Auth::user();
        $addresses = ClientAddress::where('client_id', $client->id)
                    ->join('cities', 'cities.id', '=', 'client_addresses.city_id')
                    ->join('governorates', 'governorates.id', '=', 'cities.governorate_id')
                    ->select('client_addresses.id','client_addresses.address','cities.city_en', 'cities.city_ar','governorates.title_en as governorate_en', 'governorates.title_ar as governorate_ar')
                    ->get();
        return response()->json(['status' => 'success' , 'data' => $addresses,  'message' => 'Get All Addresses']);
    }
    public function updated_address(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $client_address = ClientAddress::find($id);
        if(!$client_address){
          return response()->json(['data' => (object)[], 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $addresses = $client_address->update($request->all());
        return response()->json(['status' => 'success' , 'data' => $client_address,  'message' => 'Update Address Successfully']);
    }
    public function add_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => auth()->user()->id, 'address' => $request->address]);
        return response()->json(['data' => $address, 'status' => 'success' , 'message' => 'Add Address Successfully']);
    }
    public function delete_address($id)
    {
        $address = ClientAddress::find($id);
        if(!$address){
          return response()->json(['status' => 'error' , 'message' => 'Error In Data']);
        }
        $address->delete();
        return response()->json(['message' => 'Delete Address Successfully ', 'status' => 'success']);
    }
    public function check_coupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $found_coupon = Coupon::where('coupon',$request->coupon)->first();
        if(!$found_coupon){
            return response()->json(['message' => ['Not Correct Coupon'] , 'data' => '' , 'status' => 'error']);
        }
        $used_coupon = Coupon::where('coupon',$request->coupon)->where(function($q){
            $q->where('used',1);
            $q->orWhere('used',2);
        })->first();
        if($used_coupon){
            return response()->json(['message' => 'this coupon used befor' , 'data' => '' , 'status' => 'error']);
        }
        $coupon = Coupon::where('coupon',$request->coupon)->first();
        $coupon->client_id = \Auth::user()->id;
        $coupon->used      = 1;
        $coupon->save();
        return response()->json(['data' => $coupon->value , 'status' => 'success' , 'message' => 'Added Coupon Successfully']);
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
        return response()->json(['message' => 'get all carts data' , 'data' => $auth_carts , 'status' => 'success']);
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
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $address = ClientAddress::find($request->address_id);
        $city = \App\City::find($address->city_id);
        $carts =  Cart::where('client_id',\Auth::user()->id)->get();
        $total_price = Cart::where('client_id',\Auth::user()->id)->sum('total_price');
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
        foreach($carts as $cart){
            $detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' =>$cart->product_id,
                'quantity' =>$cart->quantity,
                'price' =>$cart->price,
                'total_price' =>$cart->total_price,
            ]);
            $cart->delete();
        }
        $check = $request->payment;
        if($check == 2){
            $gateway = new Braintree_Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            $nonce = $request->payment_method_nonce;
            $result = $gateway->transaction()->sale([
                'amount' => ($total_price + $city->shipping_amount)-$count_coupon,
                'paymentMethodNonce' => $nonce,
                'customer' => [
                    'firstName' => \Auth::user()->name,
                    'lastName' => \Auth::user()->name,
                    'email' => \Auth::user()->email,
                ],
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
        }
        $client = \Auth::user();
        \Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
            $m->from($client->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
        });
        $link = url('order/'.$order->id);
        send_notification(' Make New order  #'.$order->id.' ',\Auth::user()->id,$link);
        return response()->json(['data' => $order , 'status' => 'success' , 'message' => 'Order Added Successfully']);
    }

    public function add_rate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'rate' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all() , 'message' => 'error in data' , 'status' => 'error']);
        }

        $client_rate = ClientRate::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::user()->id,
            'rate' => $request->rate,
            'publish' => 0,
            'comment'=> $request->comment

        ]);
        return response()->json(['data' => $client_rate , 'status' => 'success' , 'message' => 'Rate Added Successfully']);
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
            return response()->json(['data' => $validator->errors()->all() , 'message' => 'error in data' , 'status' => 'error']);
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
        return response()->json(['data' => $contact , 'message' => 'Send Mail Successfully' , 'status' => 'success']);

    }
    public function details_client()
    {
        $client = Auth::user();
        return response()->json(['success' => $client], $this->successStatus);
    }
    public function governorate()
    {
      $governorate = Governorate::select('governorates.id','governorates.title_en as governorate_en', 'governorates.title_ar as governorate_ar')->get();
      return response()->json(['data' => $governorate , 'message' => 'Get All Governorate' , 'status' => 'success']);
    }

    public function city(Request $request)
    {
      $city = City::latest('created_at');
      if($request->has('governorate_id')){
        $city = $city->where('governorate_id',$request->governorate_id);
      }
      $city = $city->select('cities.id','cities.city_en', 'cities.city_ar','cities.governorate_id')->get();
      return response()->json(['data' => $city ,'message' => 'Get All City' , 'status' => 'success']);
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
}
