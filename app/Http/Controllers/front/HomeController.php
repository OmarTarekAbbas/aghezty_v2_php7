<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Product;
use App\Advertisement;
use App\Contact;
use App\Client;
use App\ClientAddress;
use App\ClientRate;
use App\Governorate;
use App\City;
use App\Cart;
use App\Category;
use App\Order;
use App\Coupon;
use Storage;
use App\OrderDetail;
use App\Http\Middleware\Language;
use Validator;
use Mail;
//use Braintree_Gateway;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('special',1)->inRandomOrder()->take(10)->get();
        return view('front.home',compact('products'));
    }

    public function products(Request $request)
    {

        $products = Product::latest('products.created_at');
        if($request->has('sub_category_id') && $request->sub_category_id !=''){
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id',$request->sub_category_id);
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
        if($request->has('ifrom') && $request->ifrom !=''){
            $products = $products->where('inch','>=',$request->ifrom);
        }
        if($request->has('ito') && $request->ito!=''){
            $products = $products->where('inch','<',$request->ito);
        }


        $products = $products->limit(get_limit_paginate())->get();
        return view('front.products',compact('products'));
    }

    public function load_products(Request $request)
    {
        $products = Product::latest('created_at');
        if($request->has('sub_category_id') && $request->sub_category_id !=''){
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id',$request->sub_category_id);
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
        if($request->has('ifrom') && $request->ifrom !=''){
            $products = $products->where('inch','>=',$request->from);
        }
        if($request->has('ito') && $request->ito!=''){
            $products = $products->where('inch','<',$request->to);
        }

        $products = $products->offset($request->start)->limit(get_limit_paginate())->get();
        $view = view('front.load_products', compact('products'))->render();
        return Response(array('html' => $view));
    }

    public function inner_product($id)
    {
        $product = Product::latest('created_at')->whereId($id)->first();
        return view('front.inner_product',compact('product'));
    }

    public function list_sub(Request $request)
    {
        if($request->has('parent_id') && $request->parent_id!=''){
            $categorys = Category::whereId($request->parent_id)->get();
        }
        else{
            $categorys = Category::whereNull('parent_id')->get();
        }
        return view("front.sub_category",compact('categorys'));
    }

    public function list_brands(Request $request)
    {
        return view('front.brand');
    }

    public function profile()
    {
        $countrys = Governorate::all();
        $citys    = City::all();
        return view('front.profile',compact('countrys','citys'));
    }

    public function contact_index(Request $request)
    {
        if($request->has('lang')){
            \App::setLocale($request->lang);
            \Session::put('applocale', $request->lang);
        }
        return view('front.contact');
    }

    public function contact_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create($request->all());
        \Session::flash('success', __('front.contact_success_message'));
        return back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,id,'.\Auth::guard('client')->user()->id,
            'name' => 'required',
            'phone' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        if($request->image){
            $this->delete_image_if_exists(\Auth::guard('client')->user()->image);
        }
        $client = Client::find(\Auth::guard('client')->user()->id);
        $client->update($request->all());
        return response()->json(['success' =>  __('front.client_success_message') , 'status' => 'success']);
    }

    public function updated_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }

        if(!\Hash::check($request->old_password, \Auth::guard('client')->user()->password)){

            return response()->json(['error' => ['error' => __('front.password_error_message')] , 'status' => 'error']);
        }

        \Auth::guard('client')->user()->update([
            'password' => \Hash::make($request->password)
        ]);

        return response()->json(['success' => __('front.password_success_message')  , 'status' => 'success']);

    }

    public function add_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            if($request->has('type')){
                \Session::flash('error', 'Erorr In Data');
                return back()->withErrors($validator)->withInput();
            }
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }

        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => \Auth::guard('client')->user()->id, 'address'=> $request->address]);

        if($request->has('type')){
            return redirect('clients/cart?address_id='.$request->city_id);
        }
        return response()->json(['success' => __('front.address_success_message') , 'status' => 'success']);
    }

    public function updated_address(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'city_id_'.$request->form_number => 'required',
            'governorate_id_'.$request->form_number => 'required',
            'address_'.$request->form_number => 'required',
        ],['address_'.$request->form_number.'.required' => 'يجب ادخال العنوان بالتفصيل']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        $city = 'city_id_'.$request->form_number;
        $address = 'address_'.$request->form_number;
        $client_address = ClientAddress::find($id)->update([
            'city_id' => $request[$city],
            'client_id' => \Auth::guard('client')->user()->id,
            'address'=> $request[$address]
        ]);

        return response()->json(['success' => __('front.address_update_success_message') , 'status' => 'success']);
    }

    public function delete_address($id)
    {
        $address = ClientAddress::find($id);
        $address->delete();
        //\Session::flash('success', __('front.address_delete_success_message'));
        return response()->json(['success' => __('front.address_delete_success_message') , 'status' => 'success']);
    }

    public function get_city($governorate_id)
    {
        $citys = City::select('cities.city_'.getcode().' as city' , 'cities.id')->where('governorate_id',$governorate_id)->get();
        return $citys;
    }

    public function my_cart(Request $request)
    {
        $auth_carts = [];
        $session_carts =[];
        $total_price =0;
        $city = Null;
        if($request->has('address_id')){
            $city = City::whereId($request->address_id)->first();
        }
        if(\Auth::guard('client')->check()){
            $auth_carts = \Auth::guard('client')->user()->carts;
            $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
            if(!$city){
                $city = \Auth::guard('client')->user()->cities[0];
                $city = City::whereId($city->pivot->city_id)->first();
            }
        }
        if(isset($_COOKIE['carts'])){
            $session_carts = unserialize($_COOKIE['carts']);
            for ($i=0; $i < count($session_carts) ; $i++) {
                $total_price  += $session_carts[$i]['total_price'];
            }
        }
        return view('front.cart',compact('auth_carts','session_carts','total_price','city'));
    }

    public function store_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'counter' => '',
            'price' =>  'required'
      ]);
        $request->request->add(['counter' => 1]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        if(\Auth::guard('client')->check()){
            $product = Cart::where('client_id',\Auth::guard('client')->user()->id)->where('product_id',$request->product_id)->first();
            if($product){
                return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
            }
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'client_id' => \Auth::guard('client')->user()->id,
                'quantity'=> $request->counter,
                'price'  => $request->price,
                'total_price' => $request->price * $request->counter
            ]);
        }
        else{
            $arr = isset($_COOKIE['carts']) ? unserialize($_COOKIE['carts']) : [];
            for($i=0;$i<count($arr);$i++){
                if($arr[$i]['product_id'] == $request->product_id){
                    return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
                }
            }
            $data['product_id'] = $request->product_id;
            $data['quantity']   = $request->counter;
            $data['price']      = $request->price;
            $data['total_price']= $request->price * $request->counter;
            array_push($arr,$data);
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
        }
        return response()->json(['success' => 'Added To Cart Successfully' , 'status' => 'success']);
    }

    public function update_cart(Request $request)
    {
        if($request->type == "cookie"){
            $arr = unserialize($_COOKIE['carts']);
            $arr[$request->cart_id]['quantity'] = $request->value;
            $arr[$request->cart_id]['total_price'] = $request->value * $arr[$request->cart_id]['price'];
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
        }
        if($request->type == "auth"){
            $cart = Cart::find($request->cart_id);
            $cart->quantity = $request->value;
            $cart->total_price = $request->value * $cart->price;
            $cart->save();
        }
        return response()->json(['status' => 'success' , 'data' => 'update will']);
    }

    public function delete_cart(Request $request)
    {
        if($request->type == "cookie"){
            $arr = unserialize($_COOKIE['carts']);
            unset($arr[$request->cart_id]);
            $arr = array_values($arr);
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
        }
        if($request->type == "auth"){
            $cart = Cart::find($request->cart_id);
            $cart->delete();
        }
        return response()->json(['status' => 'success' , 'data' => 'delete will']);
    }

    public function check_coupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        $found_coupon = Coupon::where('coupon',$request->coupon)->first();
        if(!$found_coupon){
            return response()->json(['error' => ['coupon' => __('front.coupon.not_correct')] , 'status' => 'error']);
        }
        $used_coupon = Coupon::where('coupon',$request->coupon)->where(function($q){
            $q->where('used',1);
            $q->orWhere('used',2);
        })->first();
        if($used_coupon){
            return response()->json(['error' => ['coupon' => __('front.coupon.used_befor')] , 'status' => 'error']);
        }
        $coupon = Coupon::where('coupon',$request->coupon)->first();
        $coupon->client_id = \Auth::guard('client')->user()->id;
        $coupon->used      = 1;
        $coupon->save();
        return response()->json(['value' => $coupon->value , 'status' => 'success' , 'success' => __('front.coupon.add_success')]);
    }

    public function choose_address()
    {
       return view('front.address');
    }

    public function payment()
    {
        return view('front.payment');
    }

    public function get_token()
    {
        $gateway = new Braintree_Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();

        return $token;
    }

    public function create_payment(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AW-e1NvkRoUaHz5CujWzPFNW4NufX1Laf9qkviuJhGBJ2ezRCPtidMOpYPsmdV10_gC4boRYQSTaqTEE',     // ClientID
                'EO9_yYqG7w2ILNZOWuFtqeth0Wr24MdrBeO51EL-srlE2jDHR0Q6MzLFl9EuI-IRLdk6YFXIzZW897DF'      // ClientSecret
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $city = City::find(1);
        $address = ClientAddress::where('client_id',\Auth::guard('client')->user()->id)->where('city_id',$request->address_id)->first();
        $carts =  Cart::where('client_id',\Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = \App\Coupon::where('client_id',\Auth::guard('client')->user()->id)->where('used',1)->sum('value');
        $items = [];
        foreach($carts as $cart){
            $item = new Item();
            $item->setName(Product::whereId($cart->product_id)->first()->title_en)
                ->setCurrency('USD')
                ->setQuantity($cart->quantity)
                ->setSku($cart->product_id) // Similar to `item_number` in Classic API
                ->setPrice($cart->price);
            array_push($items,$item);
        }
        $itemList = new ItemList();
        $itemList->setItems($items);
        $details = new Details();
        $details->setShipping($city->shipping_amount)
            ->setTax(0.0)
            ->setSubtotal($total_price -$count_coupon);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(($total_price + $city->shipping_amount)-$count_coupon)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('/clients/payment'))
            ->setCancelUrl(url('/clients/payment'));
        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
        $webProfile = new WebProfile();
        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);
        $webProfileId = $webProfile->create($apiContext)->getId();
        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($apiContext);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex;
            exit(1);
        }
        return $payment;
    }
    public function execute_payment(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AW-e1NvkRoUaHz5CujWzPFNW4NufX1Laf9qkviuJhGBJ2ezRCPtidMOpYPsmdV10_gC4boRYQSTaqTEE',     // ClientID
                'EO9_yYqG7w2ILNZOWuFtqeth0Wr24MdrBeO51EL-srlE2jDHR0Q6MzLFl9EuI-IRLdk6YFXIzZW897DF'      // ClientSecret
            )
        );
        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);
        try {
            $result = $payment->execute($execution, $apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
        return $result;
    }

    public function make_order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required',
            'payment' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $city = City::find($request->address_id);
        $address = ClientAddress::where('client_id',\Auth::guard('client')->user()->id)->where('city_id',$request->address_id)->first();
        $carts =  Cart::where('client_id',\Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = 0;
        $coupons = \App\Coupon::where('client_id',\Auth::guard('client')->user()->id)->where('used',1)->get();
        foreach($coupons as $coupon){
            $count_coupon += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
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
                    'firstName' => \Auth::guard('client')->user()->name,
                    'lastName' => \Auth::guard('client')->user()->name,
                    'email' => \Auth::guard('client')->user()->email,
                ],
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
        }
        $client = \Auth::guard('client')->user();
        Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
            $m->from($client->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
        });
        $link = url('order/'.$order->id);
        send_notification(' Make New order  #'.$order->id.' ',\Auth::guard('client')->user()->id,$link);
        return redirect('clients/thanks');
    }

    public function add_rate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'rate' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }

        $client_rate = ClientRate::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'rate' => $request->rate,
            'publish' => 0,
            'comment'=> $request->comment

        ]);
        return response()->json(['success' => __('front.rate_add_success_message') , 'status' => 'success']);
    }

    public function is_available(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
        Mail::send('front.mail2', ['products' => $products , 'client' => $contact , 'subject' => __('front.new_request_for_this_product')], function ($m) use ($request) {
            $m->from($request->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.product'));
        });
        $link = url('unavailable');
        // if(\Auth::guard('client')->check()){
        //     send_notification('Request For Order #'.$request->product_id.' ',\Auth::guard('client')->user()->id,$link);
        // }
        \Session::flash('success', __('front.client_success_message') );
        return back();

    }

    public function thanks()
    {
        return view('front.thanks');
    }

    public function logout()
    {
        auth()->guard('client')->logout();
        return redirect('clients/home');
    }

    public function service_center()
    {
        return view('front.service_center');
    }

    /*********************************************************** start design v2 *****/

    public function indexv2()
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

        return view('frontv2.index', compact('slides', 'ads', 'recently_added', 'selected_for_you', 'homepage_cat'));

    }

    public function service_centerv2()
    {

        return view('frontv2.maintenance');

    }

    public function contactusv2()
    {

        return view('frontv2.contact_us');

    }

    public function productsv2(Request $request)
    {
        //return $request->all();
        $products = Product::query();
        if($request->has('sub_category_id') && $request->sub_category_id !=''){
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id',$request->sub_category_id);
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
        if($request->has('from_to') && $request->from_to!=''){
          $products = $products->whereBetween('price',explode(',',$request->from_to));
       }
        if($request->has('ifrom') && $request->ifrom !=''){
            $products = $products->where('inch','>=',$request->ifrom);
        }
        if($request->has('ito') && $request->ito!=''){
            $products = $products->where('inch','=',$request->ito);
        }
        if($request->has('ifrom_ito') && $request->ifrom_ito!=''){
          $products = $products->whereBetween('inch',explode(',',$request->ifrom_ito));
       }
        if($request->has('search') && $request->search!=''){
          $products = $products->whereLike(['title'],$request->search);
        }
        if($request->has('offer') && $request->offer !=''){
          $products =  $products->orderBy('discount','desc');
        }
        if($request->has('sorted') && $request->sorted!=''){
          $products = $products->orderBy(explode(',',$request->sorted) [0],explode(',',$request->sorted) [1]);
        }
        if($request->has('last') && $request->last!=''){
          $products = $products->latest('created_at');
        }
        if($request->has('random') && $request->random!=''){
          $products = $products->inRandomOrder();
        }

        $products = $products->limit(get_limit_paginate())->get();
        return view('frontv2.listproduct',compact('products'));
    }

    public function load_productsv2(Request $request)
    {
        //return $request->all();
        $products = Product::query();
        if($request->has('sub_category_id') && $request->sub_category_id !=''){
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id',$request->sub_category_id);
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
        if($request->has('from_to') && $request->from_to!=''){
          $products = $products->whereBetween('price',explode(',',$request->from_to));
       }
        if($request->has('ifrom') && $request->ifrom !=''){
            $products = $products->where('inch','>=',$request->ifrom);
        }
        if($request->has('ifrom_ito') && $request->ifrom_ito!=''){
          $products = $products->whereBetween('inch',explode(',',$request->ifrom_ito));
       }
        if($request->has('ito') && $request->ito!=''){
            $products = $products->where('inch','<',$request->ito);
        }
        if($request->has('search') && $request->search!=''){
          $products = $products->whereLike(['title'],$request->search);
        }
        if($request->has('sorted') && $request->sorted!=''){
          $products = $products->orderBy(explode(',',$request->sorted) [0],explode(',',$request->sorted) [1]);
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

        $products = $products->offset($request->start)->limit(get_limit_paginate())->get();
        $view = view('frontv2.load_products', compact('products'))->render();
        return Response(array('html' => $view));
    }

    public function inner_productv2($id)
    {
        $product = Product::latest('created_at')->whereId($id)->first();
        $items   = Product::where('category_id',$product->category->id)->whereNotIn('id',[$id])->inRandomOrder()->take(6)->get();
        return view('frontv2.inner-page',compact('product','items'));
    }

    public function add_ratev2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'rate' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $client_rate = ClientRate::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'rate' => $request->rate,
            'publish' => 0,
            'comment'=> $request->comment

        ]);
        \Session::flash('success',__('front.rate_add_success_message'));
        return back();
    }

    public function profilev2()
    {
        $countrys = Governorate::all();
        $citys    = City::all();
        return view('frontv2.profile',compact('countrys','citys'));
    }

    public function updatev2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,email,'.\Auth::guard('client')->user()->id,
            'name' => 'required',
            'phone' => 'required|unique:clients,phone,'.\Auth::guard('client')->user()->id,
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }
        if($request->image){
            $this->delete_image_if_exists(\Auth::guard('client')->user()->image);
        }
        $client = Client::find(\Auth::guard('client')->user()->id);
        $client->update($request->all());
        \Session::flash('success',__('front.client_success_message'));
        return back();
    }
    public function get_passwordv2(Request $request)
    {
      return view('frontv2.password');
    }

    public function updated_passwordv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }

        if(!\Hash::check($request->old_password, \Auth::guard('client')->user()->password)){
          return back()->with('fail', __('front.password_error_message'));
        }

        \Auth::guard('client')->user()->update([
            'password' => \Hash::make($request->password)
        ]);

        \Session::flash('success',__('front.client_success_message'));
        return back();

    }

    public function get_addressv2(Request $request)
    {
      $countrys = Governorate::all();
      $citys    = City::all();
      return view('frontv2.address',compact('countrys','citys'));
    }

    public function add_addressv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => \Auth::guard('client')->user()->id, 'address'=> $request->address]);

        if($request->has('type')){
            return redirect('clients/cartv2?address_id='.$request->city_id);
        }
        \Session::flash('success',__('front.address_success_message'));
        return back();
    }

    public function updated_addressv2(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
          'city_id' => 'required',
          'governorate_id' => 'required',
          'address' => 'required',
        ],['address.required' => 'يجب ادخال العنوان بالتفصيل']);

        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }
        $client_address = ClientAddress::find($id)->update([
            'city_id' => $request->city_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'address'=> $request->address
        ]);

        \Session::flash('success',__('front.address_success_message'));
        return back();
    }

    public function delete_addressv2($id)
    {
        $address = ClientAddress::find($id);
        $address->delete();
        \Session::flash('success', __('front.address_delete_success_message'));
        return back();
    }

    public function get_ordersv2(Request $request)
    {
      return view('frontv2.orders');
    }

    public function my_cartv2(Request $request)
    {
        $auth_carts = [];
        $session_carts =[];
        $total_price =0;
        $city = Null;
        if($request->has('address_id')){
            $city = City::whereId($request->address_id)->first();
        }
        if(\Auth::guard('client')->check()){
            $auth_carts = \Auth::guard('client')->user()->carts;
            $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
            if(!$city){
                $city = \Auth::guard('client')->user()->cities[0];
                $city = City::whereId($city->pivot->city_id)->first();
            }
        }
        if(isset($_COOKIE['carts'])){
            $session_carts = unserialize($_COOKIE['carts']);
            for ($i=0; $i < count($session_carts) ; $i++) {
                $total_price  += $session_carts[$i]['total_price'];
            }
        }

        if($request->has('success_pr'))
        {
          \Session::flash('success_pr',Product::find($request->product_id));
        }

        $selected_for_you = Product::where('selected_for_you', 1)->get();
        $homepage_cat = Category::where('homepage', 1)->get();
        $ads = Advertisement::where('type', 'homeads')->where('active', 1)->orderBy('order', 'ASC')->inRandomOrder()->first();

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
        return view('frontv2.cart',compact('auth_carts','session_carts','total_price','city', 'selected_for_you', 'homepage_cat','ads'));
    }

    public function store_cartv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'counter' => '',
            'price' =>  'required'
      ]);
        //$request->request->add(['counter' => 1]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors() , 'status' => 'error']);
        }
        if(\Auth::guard('client')->check()){
            $product = Cart::where('client_id',\Auth::guard('client')->user()->id)->where('product_id',$request->product_id)->first();
            if($product){
                return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
            }
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'client_id' => \Auth::guard('client')->user()->id,
                'quantity'=> $request->counter,
                'price'  => $request->price,
                'total_price' => $request->price * $request->counter
            ]);
        }
        else{
            $arr = isset($_COOKIE['carts']) ? unserialize($_COOKIE['carts']) : [];
            for($i=0;$i<count($arr);$i++){
                if($arr[$i]['product_id'] == $request->product_id){
                    return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
                }
            }
            $data['product_id'] = $request->product_id;
            $data['quantity']   = $request->counter;
            $data['price']      = $request->price;
            $data['total_price']= $request->price * $request->counter;
            array_push($arr,$data);
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
        }
        return response()->json(['success' => 'Added To Cart Successfully' , 'status' => 'success']);
    }

    public function check_couponv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }
        $found_coupon = Coupon::where('coupon',$request->coupon)->first();
        if(!$found_coupon){
            \Session::flash('fail' , __('front.coupon.not_correct'));
            return back();
        }
        $used_coupon = Coupon::where('coupon',$request->coupon)->where(function($q){
            $q->where('used',1);
            $q->orWhere('used',2);
        })->first();
        if($used_coupon){
          \Session::flash('fail' , __('front.coupon.used_befor'));
          return back();
        }
        $coupon = Coupon::where('coupon',$request->coupon)->first();
        $coupon->client_id = \Auth::guard('client')->user()->id;
        $coupon->used      = 1;
        $coupon->save();
        \Session::flash('success',__('front.coupon.add_success'));
        return back();
    }

    public function delete_cartv2(Request $request)
    {
        if($request->type == "cookie"){
          if($request->has('cart_id')){
            $arr = unserialize($_COOKIE['carts']);
            unset($arr[$request->cart_id]);
            $arr = array_values($arr);
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
          }
          else{
            unset($_COOKIE['carts']);
            setcookie('carts','', time() - 3600);
          }
        }
        if($request->type == "auth"){
          if($request->has('cart_id')){
            $cart = Cart::find($request->cart_id);
            $cart->delete();
          }
          else{
            Cart::where('client_id',\Auth::guard('client')->user()->id)->delete();
          }
        }
        \Session::flash('success','delete will');
        return back();
    }

    public function update_cartv2(Request $request)
    {
        if($request->type == "cookie"){
            $arr = unserialize($_COOKIE['carts']);
            $arr[$request->cart_id]['quantity'] = $request->value;
            $arr[$request->cart_id]['total_price'] = $request->value * $arr[$request->cart_id]['price'];
            setcookie('carts',serialize($arr), time()+(86400 * 30 * 12));
        }
        if($request->type == "auth"){
            $cart = Cart::find($request->cart_id);
            $cart->quantity = $request->value;
            $cart->total_price = $request->value * $cart->price;
            $cart->save();
        }
        return response()->json(['status' => 'success' , 'data' => 'update will']);
    }

    public function create_paymentv2(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                env('client_id'),
                env('client_secret')
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $address = ClientAddress::where('client_id',\Auth::guard('client')->user()->id)->where('city_id',$request->address_id)->first();
        $carts =  Cart::where('client_id',\Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = \App\Coupon::where('client_id',\Auth::guard('client')->user()->id)->where('used',1)->sum('value');
        $items = [];
        foreach($carts as $cart){
            $item = new Item();
            $product = Product::whereId($cart->product_id)->first();
            $item->setName($product->getTranslation('title',getCode()))
                ->setCurrency('USD')
                ->setQuantity($cart->quantity)
                ->setSku($cart->product_id) // Similar to `item_number` in Classic API
                ->setPrice($cart->price);
            array_push($items,$item);
        }
        $itemList = new ItemList();
        $itemList->setItems($items);
        $details = new Details();
        $details->setShipping($address->city->shipping_amount  - $count_coupon)
            ->setTax(0.0)
            ->setSubtotal($total_price);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($total_price + ($address->city->shipping_amount  - $count_coupon))
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('/clients/paymentv2'))
            ->setCancelUrl(url('/clients/paymentv2'));
        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
        $webProfile = new WebProfile();
        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);
        $webProfileId = $webProfile->create($apiContext)->getId();
        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($apiContext);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex;
            exit(1);
        }
        return $payment;
    }
    public function execute_paymentv2(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
              env('client_id'),
              env('client_secret')
            )
        );
        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);
        try {
            $result = $payment->execute($execution, $apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
        return $result;
    }

    public function make_orderv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required',
            'payment' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $city = City::find($request->address_id);
        $address = ClientAddress::where('client_id',\Auth::guard('client')->user()->id)->where('city_id',$request->address_id)->first();
        $carts =  Cart::where('client_id',\Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = 0;
        $coupons = \App\Coupon::where('client_id',\Auth::guard('client')->user()->id)->where('used',1)->get();
        foreach($coupons as $coupon){
            $count_coupon += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
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
        $client = \Auth::guard('client')->user();
        Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
            $m->from($client->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
        });
        $link = url('order/'.$order->id);
        send_notification(' Make New order  #'.$order->id.' ',\Auth::guard('client')->user()->id,$link);
        return redirect('clients/thanksv2');
    }

    public function myorderv2($id)
    {
      $order = Order::find($id);
      $recently_added = Product::where('recently_added', 1)->get();
      return view('frontv2.myorder',compact('order','recently_added'));
    }

    public function choose_addressv2()
    {
      $countrys = Governorate::all();
      $citys    = City::all();
       return view('frontv2.order_address',compact('countrys','citys'));
    }

    public function paymentv2()
    {
        return view('frontv2.payment');
    }

    public function thanksv2()
    {
        return view('frontv2.thanks');
    }

    public function is_availablev2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
        Mail::send('front.mail2', ['products' => $products , 'client' => $contact , 'subject' => __('front.new_request_for_this_product')], function ($m) use ($request) {
            $m->from($request->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.product'));
        });
        $link = url('unavailable');
        // if(\Auth::guard('client')->check()){
        //     send_notification('Request For Order #'.$request->product_id.' ',\Auth::guard('client')->user()->id,$link);
        // }
        \Session::flash('success', __('front.client_success_message') );
        return back();

    }

    public function logoutv2()
    {
        auth()->guard('client')->logout();
        return redirect(route('front.home.index'));
    }
    /*********************************************************** end design v2 *******/

}
