<?php

namespace App\Http\Controllers\front;

use Mail;
use Storage;
use App\Brand;
use App\Cart;
use App\City;
use App\Order;
use Validator;
use App\Client;
use App\Coupon;
use App\Contact;
use App\Product;
use App\Category;
use App\Property;
use App\IpAddress;
use App\ClientRate;
use App\Governorate;
use App\OrderDetail;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use App\Advertisement;
use App\ClientAddress;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
//use Braintree_Gateway;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Constants\PaymentStatus;
use App\DeleteProduct;
use PayPal\Api\PaymentExecution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertyResource;
use App\PropertyValue;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::where('special', 1)->inRandomOrder()->take(10)->get();

        return view('front.home', compact('products'));
    }

    public function products(Request $request)
    {

        $products = Product::latest('products.created_at');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('offer') && $request->offer != '') {
            $products = $products->where('discount', '>', 0);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
            $products = $products->where('price', '>=', $request->from);
        }
        if ($request->has('to') && $request->to != '') {
            $products = $products->where('price', '<', $request->to);
        }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->where('inch', '>=', $request->ifrom);
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->where('inch', '<', $request->ito);
        }

        $products = $products->limit(get_limit_paginate())->get();
        return view('front.products', compact('products'));
    }

    public function load_products(Request $request)
    {
        $products = Product::latest('created_at');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('offer') && $request->offer != '') {
            $products = $products->where('discount', '>', 0);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
            $products = $products->where('price', '>=', $request->from);
        }
        if ($request->has('to') && $request->to != '') {
            $products = $products->where('price', '<', $request->to);
        }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->where('inch', '>=', $request->from);
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->where('inch', '<', $request->to);
        }

        $products = $products->offset($request->start)->limit(get_limit_paginate())->get();
        $view = view('front.load_products', compact('products'))->render();
        return Response(array('html' => $view));
    }

    public function inner_product($id)
    {
        $product = Product::latest('created_at')->whereId($id)->first();
        return view('front.inner_product', compact('product'));
    }

    public function list_sub(Request $request)
    {
        if ($request->has('parent_id') && $request->parent_id != '') {
            $categorys = Category::whereId($request->parent_id)->get();
        } else {
            $categorys = Category::whereNull('parent_id')->get();
        }
        return view("front.sub_category", compact('categorys'));
    }

    public function list_brands(Request $request)
    {
        return view('front.brand');
    }

    public function profile()
    {
        $countrys = Governorate::all();
        $citys = City::all();
        return view('front.profile', compact('countrys', 'citys'));
    }

    public function contact_index(Request $request)
    {
        if ($request->has('lang')) {
            \App::setLocale($request->lang);
            \Session::put('applocale', $request->lang);

        }
        return view('front.contact');
    }

    public function contact_store(Request $request)
    {
      $request->merge(['message' => $this->checkMessage($request->message)]);

      $lang = session()->get('applocale');
        if($lang == 'ar'){
            $capcha = 'برجاء انهاء تحقيق الهوية اولا!';
        }else{
            $capcha = 'please complete the human check!';
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ],
        ['g-recaptcha-response.required' => $capcha]
    );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create($request->all());
        \Session::flash('success', __('front.contact_success_message'));
        return back();
    }

    private function checkMessage($message)
    {
      $url_regex = '#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si';
      if (preg_match($url_regex, $message)) {
        $message = preg_replace($url_regex, "", $message);
      }

      $email_regex = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
      if (preg_match($email_regex, $message)) {
        $message = preg_replace($email_regex, "", $message);
      }

      return $message;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,id,' . \Auth::guard('client')->user()->id,
            'name' => 'required',
            'phone' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }
        if ($request->image) {
            $this->delete_image_if_exists(\Auth::guard('client')->user()->image);
        }
        $client = Client::find(\Auth::guard('client')->user()->id);
        $client->update($request->all());
        return response()->json(['success' => __('front.client_success_message'), 'status' => 'success']);
    }

    public function updated_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }

        if (!\Hash::check($request->old_password, \Auth::guard('client')->user()->password)) {

            return response()->json(['error' => ['error' => __('front.password_error_message')], 'status' => 'error']);
        }

        \Auth::guard('client')->user()->update([
            'password' => \Hash::make($request->password),
        ]);

        return response()->json(['success' => __('front.password_success_message'), 'status' => 'success']);

    }

    public function add_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            if ($request->has('type')) {
                \Session::flash('error', 'Erorr In Data');
                return back()->withErrors($validator)->withInput();
            }
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }

        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => \Auth::guard('client')->user()->id, 'address' => $request->address]);

        if ($request->has('type')) {
            return redirect('clients/cart?address_id=' . $request->city_id);
        }
        return response()->json(['success' => __('front.address_success_message'), 'status' => 'success']);
    }

    public function updated_address(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'city_id_' . $request->form_number => 'required',
            'governorate_id_' . $request->form_number => 'required',
            'address_' . $request->form_number => 'required',
        ], ['address_' . $request->form_number . '.required' => 'يجب ادخال العنوان بالتفصيل']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }
        $city = 'city_id_' . $request->form_number;
        $address = 'address_' . $request->form_number;
        $client_address = ClientAddress::find($id)->update([
            'city_id' => $request[$city],
            'client_id' => \Auth::guard('client')->user()->id,
            'address' => $request[$address],
        ]);

        return response()->json(['success' => __('front.address_update_success_message'), 'status' => 'success']);
    }

    public function delete_address($id)
    {
        $address = ClientAddress::find($id);
        $address->delete();
        //\Session::flash('success', __('front.address_delete_success_message'));
        return response()->json(['success' => __('front.address_delete_success_message'), 'status' => 'success']);
    }

    public function get_city($governorate_id)
    {
        $citys = City::select('cities.city_' . getcode() . ' as city', 'cities.id')->where('governorate_id', $governorate_id)->get();
        return $citys;
    }

    public function my_cart(Request $request)
    {
        $auth_carts = [];
        $session_carts = [];
        $total_price = 0;
        $city = null;
        if ($request->has('address_id')) {
            $city = City::whereId($request->address_id)->first();
        }
        if (\Auth::guard('client')->check()) {
            $auth_carts = \Auth::guard('client')->user()->carts;
            $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
            if (!$city) {
                $city = \Auth::guard('client')->user()->cities[0];
                $city = City::whereId($city->pivot->city_id)->first();
            }
        }
        if (isset($_COOKIE['carts'])) {
            $session_carts = unserialize($_COOKIE['carts']);
            for ($i = 0; $i < count($session_carts); $i++) {
                $total_price += $session_carts[$i]['total_price'];
            }
        }
        return view('front.cart', compact('auth_carts', 'session_carts', 'total_price', 'city'));
    }

    public function store_cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'counter' => '',
            'price' => 'required',
        ]);
        $request->request->add(['counter' => 1]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }
        if (\Auth::guard('client')->check()) {
            $product = Cart::where('client_id', \Auth::guard('client')->user()->id)->where('product_id', $request->product_id)->first();
            if ($product) {
                return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
            }
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'client_id' => \Auth::guard('client')->user()->id,
                'quantity' => $request->counter,
                'price' => $request->price,
                'total_price' => $request->price * $request->counter,
            ]);
        } else {
            $arr = isset($_COOKIE['carts']) ? unserialize($_COOKIE['carts']) : [];
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i]['product_id'] == $request->product_id) {
                    return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
                }
            }
            $data['product_id'] = $request->product_id;
            $data['quantity'] = $request->counter;
            $data['price'] = $request->price;
            $data['total_price'] = $request->price * $request->counter;
            array_push($arr, $data);
            setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
        }
        return response()->json(['success' => 'Added To Cart Successfully', 'status' => 'success']);
    }

    public function update_cart(Request $request)
    {
        if ($request->type == "cookie") {
            $arr = unserialize($_COOKIE['carts']);
            $arr[$request->cart_id]['quantity'] = $request->value;
            $arr[$request->cart_id]['total_price'] = $request->value * $arr[$request->cart_id]['price'];
            setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
        }
        if ($request->type == "auth") {
            $cart = Cart::find($request->cart_id);
            $cart->quantity = $request->value;
            $cart->total_price = $request->value * $cart->price;
            $cart->save();
        }
        return response()->json(['status' => 'success', 'data' => 'update will']);
    }

    public function delete_cart(Request $request)
    {
        if ($request->type == "cookie") {
            $arr = unserialize($_COOKIE['carts']);
            unset($arr[$request->cart_id]);
            $arr = array_values($arr);
            setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
        }
        if ($request->type == "auth") {
            $cart = Cart::find($request->cart_id);
            $cart->delete();
        }
        return response()->json(['status' => 'success', 'data' => 'delete will']);
    }

    public function check_coupon(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }
        $found_coupon = Coupon::where('coupon', $request->coupon)->first();
        if (!$found_coupon) {
            return response()->json(['error' => ['coupon' => __('front.coupon.not_correct')], 'status' => 'error']);
        }
        $used_coupon = Coupon::where('coupon', $request->coupon)->where(function ($q) {
            $q->where('used', 1);
            $q->orWhere('used', 2);
        })->first();
        if ($used_coupon) {
            return response()->json(['error' => ['coupon' => __('front.coupon.used_befor')], 'status' => 'error']);
        }
        $coupon = Coupon::where('coupon', $request->coupon)->first();
        $coupon->client_id = \Auth::guard('client')->user()->id;
        $coupon->used = 1;
        $coupon->save();
        return response()->json(['value' => $coupon->value, 'status' => 'success', 'success' => __('front.coupon.add_success')]);
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
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $token = $gateway->ClientToken()->generate();

        return $token;
    }

    public function create_payment(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AW-e1NvkRoUaHz5CujWzPFNW4NufX1Laf9qkviuJhGBJ2ezRCPtidMOpYPsmdV10_gC4boRYQSTaqTEE', // ClientID
                'EO9_yYqG7w2ILNZOWuFtqeth0Wr24MdrBeO51EL-srlE2jDHR0Q6MzLFl9EuI-IRLdk6YFXIzZW897DF' // ClientSecret
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $city = City::find(1);
        $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
        $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->sum('value');
        $items = [];
        foreach ($carts as $cart) {
            $item = new Item();
            $item->setName(Product::whereId($cart->product_id)->first()->title_en)
                ->setCurrency('USD')
                ->setQuantity($cart->quantity)
                ->setSku($cart->product_id) // Similar to `item_number` in Classic API
                ->setPrice($cart->price);
            array_push($items, $item);
        }
        $itemList = new ItemList();
        $itemList->setItems($items);
        $details = new Details();
        $details->setShipping($city->shipping_amount)
            ->setTax(0.0)
            ->setSubtotal($total_price - $count_coupon);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(($total_price + $city->shipping_amount) - $count_coupon)
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
                'AW-e1NvkRoUaHz5CujWzPFNW4NufX1Laf9qkviuJhGBJ2ezRCPtidMOpYPsmdV10_gC4boRYQSTaqTEE', // ClientID
                'EO9_yYqG7w2ILNZOWuFtqeth0Wr24MdrBeO51EL-srlE2jDHR0Q6MzLFl9EuI-IRLdk6YFXIzZW897DF' // ClientSecret
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
        $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
        $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = 0;
        $coupons = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->get();
        foreach ($coupons as $coupon) {
            $count_coupon += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
            'address_id' => $address->id,
            'shipping_amount' => $city->shipping_amount,
            'total_price' => ($total_price + $city->shipping_amount) - $count_coupon,
            'lang' => getCode(),
            'payment' => $request->payment,
        ]);
        foreach ($carts as $cart) {
            $detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'total_price' => $cart->total_price,
            ]);
            $cart->delete();
        }
        $check = $request->payment;
        if ($check == 2) {
            $gateway = new Braintree_Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey'),
            ]);

            $nonce = $request->payment_method_nonce;
            $result = $gateway->transaction()->sale([
                'amount' => ($total_price + $city->shipping_amount) - $count_coupon,
                'paymentMethodNonce' => $nonce,
                'customer' => [
                    'firstName' => \Auth::guard('client')->user()->name,
                    'lastName' => \Auth::guard('client')->user()->name,
                    'email' => \Auth::guard('client')->user()->email,
                ],
                'options' => [
                    'submitForSettlement' => true,
                ],
            ]);
        }
        $client = \Auth::guard('client')->user();
        Mail::send('front.mail', ['order' => $order, 'client' => $client], function ($m) use ($client) {
            $m->from($client->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
        });
        $link = url('order/' . $order->id);
        send_notification(' Make New order  #' . $order->id . ' ', \Auth::guard('client')->user()->id, $link);
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
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }

        $client_rate = ClientRate::create([
            'product_id' => $request->product_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'rate' => $request->rate,
            'publish' => 0,
            'comment' => $request->comment,

        ]);
        return response()->json(['success' => __('front.rate_add_success_message'), 'status' => 'success']);
    }

    public function is_available(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $contact = Contact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'product_id' => $request->product_id,
            'city_id' => $request->city_id,
            'lang' => getCode(),
        ]);
        $products = Product::whereId($request->product_id)->get();
        Mail::send('front.mail2', ['products' => $products, 'client' => $contact, 'subject' => __('front.new_request_for_this_product')], function ($m) use ($request) {
            $m->from($request->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.product'));
        });
        $link = url('unavailable');
        // if(\Auth::guard('client')->check()){
        //     send_notification('Request For Order #'.$request->product_id.' ',\Auth::guard('client')->user()->id,$link);
        // }
        \Session::flash('success', __('front.client_success_message'));
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
        if( !isset($_COOKIE['usre_ip']) ){
            savingUserIp();
        }

        $slides = Advertisement::where('type', 'slider')->where('active', 1)->orderBy('order', 'ASC')->get(['ads_url', 'image', 'image_resize']);
        $ads = Advertisement::where('type', 'homeads')->where('active', 1)->orderBy('order', 'ASC')->get(['ads_url', 'image', 'image_resize']);
        $home_brands = cache()->remember('home_brands',60 * 60 * 60,function(){ return Brand::all(['id', 'title', 'image', 'image_resize']); });

        $recently_added = cache()->remember('recently_added',60 * 60 * 60,function(){
            $recently_added_values = Product::stock()->where('recently_added', 1)->get(['id', 'title', 'price', 'discount', 'price_after_discount', 'main_image', 'main_image_resize']);

            if (count($recently_added_values) != 6) {
                $limit = 6 - count($recently_added_values);
                $recently_addedR = Product::orderBy('created_at', 'desc')->limit($limit)->get(['id', 'title', 'price', 'discount', 'price_after_discount', 'main_image', 'main_image_resize']);
                $recently_added_values =  $recently_added_values->toBase()->merge($recently_addedR);
            }

            return $recently_added_values;

            });

        $selected_for_you = cache()->remember('selected_for_you',60 * 60 * 60,function(){
            $selected_for_you_values = Product::where('selected_for_you', 1)->get(['id', 'title', 'price', 'discount', 'price_after_discount', 'main_image', 'main_image_resize']);

            if (count($selected_for_you_values) != 6) {
                $limit = 6 - count($selected_for_you_values);
                $selected_for_youR = Product::get(['id', 'title', 'price', 'discount', 'price_after_discount', 'main_image', 'main_image_resize'])->random($limit);
                $selected_for_you_values = $selected_for_you_values->toBase()->merge($selected_for_youR);
            }

            return $selected_for_you_values;
        });

        $homepage_cat = cache()->remember('homepage_cat',60 * 60 * 60,function(){
            $homepage_cat_values = Category::where('homepage', 1)->get(['id', 'title', 'image']);

            if (count($homepage_cat_values) != 6) {
                $limit = 6 - count($homepage_cat_values);
                $homepage_catR = Category::whereNotNull('parent_id')->get(['id', 'title', 'image'])->random($limit);
                $homepage_cat_values = $homepage_cat_values->toBase()->merge($homepage_catR);
            }

            return $homepage_cat_values;
        });

        return view('frontv2.index', compact('slides', 'ads', 'recently_added', 'selected_for_you', 'homepage_cat', 'home_brands'));
    }

    public function ClearHomeCash(){
        cache()->flush();
    }

    public function service_centerv2()
    {

        return view('frontv2.maintenance');

    }

    public function error404() {
        return view('frontv2.error404');
    }

    public function about_mev2()
    {

        return view('frontv2.aboutme');

    }

    public function terms_conv2()
    {

        return view('frontv2.termsv2');

    }

    public function contactusv2(Request $request)
    {
        if ($request->has('lang')) {
            \App::setLocale($request->lang);
            \Session::put('applocale', $request->lang);

        }
        return view('frontv2.contact_us');

    }


    public function productsv2_test(Request $request)
    {

        $sub_category_ids = [];
        $brand_ids = [];
        $products = Product::select('products.*','products.id as product_id');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $sub_category_ids  =  $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('category_id') && $request->category_id != '') {
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $brand_ids  =  $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
            $products = $products->where('price', '>=', $request->from);
        }
        if ($request->has('to') && $request->to != '') {
            $products = $products->where('price', '<', $request->to);
        }
        if ($request->has('from_to') && $request->from_to != '') {
            $products = $products->whereBetween('price', explode(',', $request->from_to));
        }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }




      if ($request->has('search') && $request->search != '') {
        $products = $products->join('translatables','translatables.record_id','=','products.id')
          ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
          ->where('translatables.table_name','products')
          ->where('translatables.column_name','title')
          ->where(function($q) use ($request){
            $q->where('products.title', 'like', '%' . $request->search . '%');
            $q->orWhere('products.short_description', 'like', '%' . $request->search . '%');
            $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
          });
      }


        if ($request->has('offer') && $request->offer != '') {
            $products = $products->where('price_after_discount', '>', 0);
        }
        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
         if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }
        $products = $products->where('products.active', 1)->limit(get_limit_paginate())->get();
        return view('frontv2.listproduct_test', compact('products', 'sub_category_ids','brand_ids'));
    }

    public function loadproductsv2_test(Request $request)
    {

        //return $request->all();
        $products = Product::select('products.*','products.id as product_id');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('category_id') && $request->category_id != '') {
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
            $products = $products->where('price', '>=', $request->from);
        }
        if ($request->has('to') && $request->to != '') {
            $products = $products->where('price', '<', $request->to);
        }
        if ($request->has('from_to') && $request->from_to != '') {
            $products = $products->whereBetween('price', explode(',', $request->from_to));
        }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }


      if ($request->has('search') && $request->search != '') {
                $products = $products->join('translatables','translatables.record_id','=','products.id')
          ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
          ->where('translatables.table_name','products')
          ->where('translatables.column_name','title')
          ->where(function($q) use ($request){
            $q->where('products.title', 'like', '%' . $request->search . '%');
            $q->orWhere('products.short_description', 'like', '%' . $request->search . '%');
            $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
          });
      }

        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('offer') && $request->offer != '') {
            $products = $products->where('price_after_discount', '>', 0);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
        if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }

        $products = $products->where('products.active', 1)->offset($request->start)->limit(get_limit_paginate())
                    ->get();

        $view = view('frontv2.load_products_test', compact('products'))->render();
        return Response(array('html' => $view));
    }

    public function productsv2(Request $request)
    {
        $sub_category_ids = [];
        $brand_ids = [];
        $products = Product::select('products.*','products.id as product_id');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $sub_category_ids  =  $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('category_id') && $request->category_id != '') {
          //dd("cat");
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
          //dd("brand");
            $request->brand_id = (array) $request->brand_id;
            $brand_ids  =  $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
          $products = $products->where(function($q){
            $q->where('price', '>=', request('from'))->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount",">=",request("from"));
            });
          });
      }
      if ($request->has('to') && $request->to != '') {
          $products = $products->where(function($q){
            $q->where('price', '<', request("to"))
            ->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount","<",request("to"));
            });
          });
      }
      if ($request->has('from_to') && $request->from_to != '') {
          $products = $products->where(function($q){
          $q->whereBetween('price', explode(',', request('from_to')))
          ->orWhere(function($query){
            $query->where("price_after_discount",">",0);
            $query->whereNotNull("price_after_discount");
            $query->whereBetween("price_after_discount", explode(',', request()->get("from_to")));
          });
        });
      }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }

      if ($request->has('search') && $request->search != '') {
        $product_ids = $this->stringGlobalSearch($request->search);
        $products = $products->whereIn("id",$product_ids);
        $this->setSearchValue($request->search);
      }

        if ($request->has('offer') && $request->offer != '') {
            // $products = $products->where('offer', 1);
            $products = $products->where(function($q) {
              // $q->where("offer", 1);
              $q->where("price_after_discount", '>', 0);
              // $q->orderBy('offer');
            });
        }
        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
        if ($request->filled('most_solid')) {
          // $products = $products->whereHas("orders",function($q){
          //   $q->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $q->where('orders.status','=', 3);
          // })->withCount(["orders" => function($query) {
          //   $query->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $query->where('orders.status','=', 3);
          // }])->groupBy("products.id")->orderBy("orders_count","desc");
          $products = $products->where("solid_count", '>', 0)->orderBy("solid_count","desc");
        }

        if ($request->filled('in_stock')) {
          $products = $products->where("stock", '>', 0);
        }

        if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }

        $products = $products->where('products.active', 1)->limit(get_limit_paginate())->get();

        if($request->ajax()) {
          $view = view('frontv2.load_products', compact('products'))->render();
          return Response(array('html' => $view));
        }

        return view('frontv2.listproduct', compact('products', 'sub_category_ids','brand_ids'));
    }

    private function stringGlobalSearch($q){
      $q_array = explode(" ", $q);
      $counter = 0;
      $result = [];

      foreach($q_array as $q_string){
        $products = Product::query();

        $products = $products->join('translatables','translatables.record_id','=','products.id')
        ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
        ->where('translatables.table_name','products')
        ->where('translatables.column_name','title')
        ->where(function($query) use ($q_string){
          $query->where('products.title', 'like', '%' . $q_string . '%');
          $query->orWhere('products.short_description', 'like', '%' . $q_string . '%');
          $query->orWhere('tans_bodies.body', 'like', '%' . $q_string . '%');
        });

        $products = $products->where('products.active', 1)->pluck('products.id')->toArray();

        if(isset($products) && $products!=null && count($products)!=0){
          if($counter == 0){
            $result = $products;
            $counter += 1 ;
          }else{
            $result = array_intersect($result, $products);
          }
        }
      }

      $result = array_values($result);

      return $result;
    }

    public function loadbanner($subcategory_id){
      $sub_category= \App\Category::where('id',$subcategory_id)->first();
      $category_id = $sub_category->cat->id;
      $category_title_slug = setSlug($sub_category->cat->title);
      $category_title_trans = $sub_category->cat->getTranslation('title',getCode());
      $subcategory_offer_image = $sub_category->cat->offer_image;
      $subcategory_offer_image_link =$sub_category->cat->offer_image_link;

      return ['id'=>$category_id, 'title'=>$category_title_trans, 'title_slug'=>$category_title_slug, 'offer_image'=>$subcategory_offer_image, 'offer_image_link'=>$subcategory_offer_image_link];
    }

    public function search(){
      $q = $_GET['q'];
      $new_q = trim( preg_replace('!\s+!', ' ', $q) );

      $products = Product::query();

      $products = $products->join('translatables','translatables.record_id','=','products.id')
      ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
      ->where('translatables.table_name','products')
      ->where('translatables.column_name','title')
      ->where(function($query) use ($new_q){
        $query->where('products.title', 'like', '%' . $new_q . '%');
        $query->orWhere('products.short_description', 'like', '%' . $new_q . '%');
        $query->orWhere('tans_bodies.body', 'like', '%' . $new_q . '%');
      });

      $products = $products->where('products.active', 1)->pluck('body');

      if(isset($products) && $products!=null && count($products)>0){
        return $products;
      }else{
        return $this->stringSearch($new_q);
      }

    }

    public function getCookie(){
      $current_cookies = isset($_COOKIE['old_search_value']) ? unserialize($_COOKIE['old_search_value']) : [];

      $current_cookies_slice = array_slice(array_reverse($current_cookies), 0, 5);

      return $current_cookies_slice;
    }

    private function stringSearch($q){
      $q_array = explode(" ", $q);
      $counter = 0;
      $result = [];

      foreach($q_array as $q_string){
        $products = Product::query();

        $products = $products->join('translatables','translatables.record_id','=','products.id')
        ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
        ->where('translatables.table_name','products')
        ->where('translatables.column_name','title')
        ->where(function($query) use ($q_string){
          $query->where('products.title', 'like', '%' . $q_string . '%');
          $query->orWhere('products.short_description', 'like', '%' . $q_string . '%');
          $query->orWhere('tans_bodies.body', 'like', '%' . $q_string . '%');
        });

        $products = $products->where('products.active', 1)->pluck('body')->toArray();

        if(isset($products) && $products!=null && count($products)!=0){
          if($counter == 0){
            $result = $products;
            $counter += 1 ;
          }else{
            $result = array_intersect($result, $products);
          }
        }
      }

      $result = array_values($result);

      return $result;
    }

    public function load_productsv2(Request $request)
    {

        //return $request->all();
        $products = Product::select('products.*','products.id as product_id');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('category_id') && $request->category_id != '') {
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
          $products = $products->where(function($q){
            $q->where('price', '>=', request('from'))->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount",">=",request("from"));
            });
          });
      }
      if ($request->has('to') && $request->to != '') {
          $products = $products->where(function($q){
            $q->where('price', '<', request("to"))
            ->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount","<",request("to"));
            });
          });
      }
      if ($request->has('from_to') && $request->from_to != '') {
          $products = $products->where(function($q){
          $q->whereBetween('price', explode(',', request('from_to')))
          ->orWhere(function($query){
            $query->where("price_after_discount",">",0);
            $query->whereNotNull("price_after_discount");
            $query->whereBetween("price_after_discount", explode(',', request()->get("from_to")));
          });
        });
      }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }


      if ($request->has('search') && $request->search != '') {
        $product_ids = $this->stringGlobalSearch($request->search);
        $products = $products->whereIn("id",$product_ids);
        $this->setSearchValue($request->search);
      }

        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('offer') && $request->offer != '') {
          // $products = $products->where('offer', 1);
          $products = $products->where(function($q) {
            // $q->where("offer", 1);
            $q->where("price_after_discount", '>', 0);
            // $q->orderBy('offer');
          });
      }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
        if ($request->filled('most_solid')) {
          // $products = $products->whereHas("orders",function($q){
          //   $q->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $q->where('orders.status','=', 3);
          // })->withCount(["orders" => function($query) {
          //   $query->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $query->where('orders.status','=', 3);
          // }])->groupBy("products.id")->orderBy("orders_count","desc");
          $products = $products->where("solid_count", '>', 0)->orderBy("solid_count","desc");
        }

        if ($request->filled('in_stock')) {
          $products = $products->where("stock", '>', 0);
        }

        if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }
          $products = $products->where('products.active', 1)->offset($request->start)->limit(get_limit_paginate())
          ->get();

        $view = view('frontv2.load_products', compact('products'))->render();
        return Response(array('html' => $view));
    }

    /**
     * Method getPropertyWithPropertyValue
     *
     * @param array $property_values
     *
     * @return array
     */
    public function getPropertyWithPropertyValue($property_values)
    {
      foreach ($property_values as  $value) {
        $key = PropertyValue::whereId($value)->first()->property_id;
        $array[$key][] = $value;
      }
      return $array;
    }

    /**
     * Method getCategoryThatHaveCurrentProperty
     *
     * @param Request $request
     *
     * @return array
     */
    public function getCategoryThatHaveCurrentProperty($request) {
      $category_ids = Product::whereHas('pr_value', function ($q) use ($request) {
        $q->whereIn('property_values.id', $request->property_value_id);
      })->pluck("category_id")->toArray();

      return $category_ids;
    }

    /**
     * Method redfineQueryWithoutProperty
     *
     * @param Request $request
     * @param array $category_have_current_property
     *
     * @return QueryBuilder
     */
    public function redfineQueryWithoutProperty($request, $category_have_current_property)
    {
        $products = Product::select('products.*','products.id as product_id');
        if ($request->has('sub_category_id') && $request->sub_category_id != '') {
            $request->sub_category_id = (array) $request->sub_category_id;
            $products = $products->whereIn('category_id', array_diff($request->sub_category_id, $category_have_current_property));
        }
        if ($request->has('brand_id') && $request->brand_id != '') {
            $request->brand_id = (array) $request->brand_id;
            $brand_ids  =  $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
          $products = $products->where(function($q){
            $q->where('price', '>=', request('from'))->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount",">=",request("from"));
            });
          });
      }
      if ($request->has('to') && $request->to != '') {
          $products = $products->where(function($q){
            $q->where('price', '<', request("to"))
            ->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount","<",request("to"));
            });
          });
      }
      if ($request->has('from_to') && $request->from_to != '') {
          $products = $products->where(function($q){
          $q->whereBetween('price', explode(',', request('from_to')))
          ->orWhere(function($query){
            $query->where("price_after_discount",">",0);
            $query->whereNotNull("price_after_discount");
            $query->whereBetween("price_after_discount", explode(',', request()->get("from_to")));
          });
        });
      }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }
        if ($request->has('search') && $request->search != '') {
          $products = $products->join('translatables','translatables.record_id','=','products.id')
            ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
            ->where('translatables.table_name','products')
            ->where('translatables.column_name','title')
            ->where(function($q) use ($request){
              $q->where('products.title', 'like', '%' . $request->search . '%');
              $q->orWhere('products.short_description', 'like', '%' . $request->search . '%');
              $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->has('offer') && $request->offer != '') {
            // $products = $products->where('offer', 1);
            $products = $products->where(function($q) {
              // $q->where("offer", 1);
              $q->where("price_after_discount", '>', 0);
              // $q->orderBy('offer');
            });
        }
        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }

        return $products;
    }

    /**
     * Method setSearchKey
     *
     * @param string $searchValue
     *
     * @return void
     */
    public function setSearchValue($searchValue)
    {
      $oldSearchValue = isset($_COOKIE['old_search_value']) ? unserialize($_COOKIE['old_search_value']) : [] ;

      if (($key = array_search($searchValue, $oldSearchValue)) !== false) {
        unset($oldSearchValue[$key]);
      }

      array_push($oldSearchValue, $searchValue);

      unset($_COOKIE['old_search_value']);

      setcookie('old_search_value', serialize($oldSearchValue), time() + (60 * 60 * 24 * 30 * 12), "/", config('app.APP_DOMAIN')); //set for 1 year
    }

    public function inner_productv2($id)
    {
        $product = Product::latest('created_at')->whereId($id)->where('products.active', 1)->first();

        if (!$product) {
          $product = Product::withTrashed()->latest('created_at')->whereId($id)->where('products.active', 1)->first();

          if(!$product || !$product->category){
            return abort(404);
          }
          $get_category = Category::where("id",$product->category_id)->first();
          return redirect(route("front.home.search.category",['sub_category_id' => $get_category->id, 'slug' => setSlug($get_category->title)]));
        }

        if(!$product->category){
          return abort(404);
        }

        $items = Product::where('category_id', $product->category->id)->whereNotIn('id', [$id])->where('products.active', 1)->inRandomOrder()->take(4)->get();
        return view('frontv2.inner-page', compact('product', 'items'));
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
            'comment' => $request->comment,

        ]);
        \Session::flash('success', __('front.rate_add_success_message'));
        return back();
    }

    public function profilev2()
    {
        $countrys = Governorate::all();
        $citys = City::all();
        return view('frontv2.profile', compact('countrys', 'citys'));
    }

    public function updatev2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:clients,email,' . \Auth::guard('client')->user()->id,
            'name' => 'required',
            'phone' => 'required|unique:clients,phone,' . \Auth::guard('client')->user()->id,
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $clientStore = $request->all();
        if ($request->image) {
            $this->delete_image_if_exists(\Auth::guard('client')->user()->image);
            $clientStore['image'] = 'uploads/' . Storage::disk('uploads')->put('client_images', $request->image);
        }
        $client = Client::find(\Auth::guard('client')->user()->id);
        $client->update($clientStore);
        \Session::flash('success', __('front.client_success_message'));
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

        if (!\Hash::check($request->old_password, \Auth::guard('client')->user()->password)) {
            return back()->with('fail', __('front.password_error_message'));
        }

        \Auth::guard('client')->user()->update([
            'password' => \Hash::make($request->password),
        ]);

        \Session::flash('success', __('front.client_success_message'));
        return back();

    }

    public function get_addressv2(Request $request)
    {
        $countrys = Governorate::all();
        $citys = City::all();
        return view('frontv2.address', compact('countrys', 'citys'));
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

        $address = ClientAddress::create(['city_id' => $request->city_id, 'client_id' => \Auth::guard('client')->user()->id, 'address' => $request->address]);

        if ($request->has('type')) {
            return redirect('clients/cartv2?address_id=' . $request->city_id);
        }
        \Session::flash('success', __('front.address_success_message'));
        return back();
    }

    public function updated_addressv2(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
        ], ['address.required' => 'يجب ادخال العنوان بالتفصيل']);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $client_address = ClientAddress::find($id)->update([
            'city_id' => $request->city_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'address' => $request->address,
        ]);

        \Session::flash('success', __('front.address_success_message'));
        return back();
    }

    public function updated_addressv2_ajax(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
        ], ['address.required' => 'يجب ادخال العنوان بالتفصيل']);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $client_address = ClientAddress::find($id)->update([
            'city_id' => $request->city_id,
            'client_id' => \Auth::guard('client')->user()->id,
            'address' => $request->address,
        ]);

        return $request->city_id;
    }

    public function phoneStoreAjax(Request $request)
    {
        Auth::guard('client')->user()->phone = $request->phone;
        Auth::guard('client')->user()->save();
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
        session()->forget('nbe_click_script');
        session()->forget('cib_click_script');
        $auth_carts = [];
        $session_carts = [];
        $total_price = 0;
        $city = null;
        if ($request->has('address_id')) {
            $city = City::whereId($request->address_id)->first();
        }
        if (\Auth::guard('client')->check()) {
            $auth_carts = \Auth::guard('client')->user()->carts;
            $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
            // if (!$city) {
            //     $city = \Auth::guard('client')->user()->cities[0];
            //     $city = City::whereId($city->pivot->city_id)->first();
            // }
        }
        if (isset($_COOKIE['carts'])) {
            $session_carts = unserialize($_COOKIE['carts']);
            for ($i = 0; $i < count($session_carts); $i++) {
                $total_price += $session_carts[$i]['total_price'];
            }
        }

        if ($request->has('success_pr')) {
            \Session::flash('success_pr', Product::find($request->product_id));
        }

        $selected_for_you = Product::where('selected_for_you', 1)->get();
        $homepage_cat = Category::where('homepage', 1)->get();
        $ads = Advertisement::where('type', 'homeads')->where('active', 1)->orderBy('order', 'ASC')->inRandomOrder()->first();

        if (count($selected_for_you) != 6) {
            $limit = 6 - count($selected_for_you);
            $selected_for_youR = Product::get()->random($limit);
            $selected_for_you = $selected_for_you->toBase()->merge($selected_for_youR);
        }

        if (count($homepage_cat) != 6) {
            $limit = 6 - count($homepage_cat);
            $homepage_catR = Category::whereNotNull('parent_id')->get()->random($limit);
            $homepage_cat = $homepage_cat->toBase()->merge($homepage_catR);
        }
        return view('frontv2.cart', compact('auth_carts', 'session_carts', 'total_price', 'city', 'selected_for_you', 'homepage_cat', 'ads'));
    }

    public function store_cartv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'counter' => '',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 'error']);
        }

        if(!$this->canBuy($request->product_id, $request->counter)) {
          return response()->json(['error' => "You Can't Purches this product", 'status' => "stop_buy"]);
        }

        if (\Auth::guard('client')->check()) {
            $product = Cart::where('client_id', \Auth::guard('client')->user()->id)->where('product_id', $request->product_id)->first();
            if ($product) {
                return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
            }
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'client_id' => \Auth::guard('client')->user()->id,
                'quantity' => $request->counter,
                'price' => $request->price,
                'total_price' => $request->price * $request->counter,
            ]);
        } else {
            $arr = isset($_COOKIE['carts']) ? unserialize($_COOKIE['carts']) : [];
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i]['product_id'] == $request->product_id) {
                    return response()->json(['error' => ['Is Added Befor'], 'status' => 'error']);
                }
            }
            $data['product_id'] = $request->product_id;
            $data['quantity'] = $request->counter;
            $data['price'] = $request->price;
            $data['total_price'] = $request->price * $request->counter;
            array_push($arr, $data);
            setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
        }
        return response()->json(['success' => 'Added To Cart Successfully', 'status' => 'success']);
    }

    public function canBuy($product_id, $counter)
    {
      $product = Product::find($product_id);
      $limit = checkbuyLimit($product_id);
      if($counter <= $product->stock && $limit['status'] && ($limit['count']+ $counter) <= 2) {
        return true;
      }
      return false;
    }

    public function check_couponv2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $found_coupon = Coupon::where('coupon', $request->coupon)->first();
        if (!$found_coupon) {
            \Session::flash('fail', __('front.coupon.not_correct'));
            return back();
        }
        $used_coupon = Coupon::where('coupon', $request->coupon)->where(function ($q) {
            $q->where('used', 1);
            $q->orWhere('used', 2);
        })->first();
        if ($used_coupon) {
            \Session::flash('fail', __('front.coupon.used_befor'));
            return back();
        }
        $coupon = Coupon::where('coupon', $request->coupon)->first();
        $coupon->client_id = \Auth::guard('client')->user()->id;
        $coupon->used = 1;
        $coupon->save();
        \Session::flash('success', __('front.coupon.add_success'));
        return back();
    }

    public function delete_cartv2(Request $request)
    {
        if ($request->type == "cookie") {
            if ($request->has('cart_id')) {
                $arr = unserialize($_COOKIE['carts']);
                unset($arr[$request->cart_id]);
                $arr = array_values($arr);
                setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
            } else {
                unset($_COOKIE['carts']);
                setcookie('carts', '', time() - 3600, "/", config('app.APP_DOMAIN'));
            }
        }
        if ($request->type == "auth") {
            if ($request->has('cart_id')) {
                $cart = Cart::find($request->cart_id);
                $cart->delete();
            } else {
                Cart::where('client_id', \Auth::guard('client')->user()->id)->delete();
            }
        }
        if($request->ajax()) {
          return "ok";
        }
        \Session::flash('success', 'delete will');
        return back();
    }

    public function update_cartv2(Request $request)
    {
        if ($request->type == "cookie") {
            $arr = unserialize($_COOKIE['carts']);
            if(!$this->canBuy($arr[$request->cart_id]['product_id'], $request->value)){
              return response()->json(['error' => "You Can't Purches this product", 'status' => "stop_buy"]);
            }
            $arr[$request->cart_id]['quantity'] = $request->value;
            $arr[$request->cart_id]['total_price'] = $request->value * $arr[$request->cart_id]['price'];
            setcookie('carts', serialize($arr), time() + (86400 * 30 * 12), "/", config('app.APP_DOMAIN'));
        }
        if ($request->type == "auth") {
            $cart = Cart::find($request->cart_id);
            if(!$this->canBuy($cart->product_id, $request->value)){
              return response()->json(['error' => "You Can't Purches this product", 'status' => "stop_buy"]);
            }
            $cart->quantity = $request->value;
            $cart->total_price = $request->value * $cart->price;
            $cart->save();
        }
        return response()->json(['status' => 'success', 'data' => 'update will']);
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
        $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
        $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
        $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
        $count_coupon = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->sum('value');
        $items = [];
        foreach ($carts as $cart) {
            $item = new Item();
            $product = Product::whereId($cart->product_id)->first();
            $item->setName($product->getTranslation('title', getCode()))
                ->setCurrency('USD')
                ->setQuantity($cart->quantity)
                ->setSku($cart->product_id) // Similar to `item_number` in Classic API
                ->setPrice($cart->price);
            array_push($items, $item);
        }
        $itemList = new ItemList();
        $itemList->setItems($items);
        $details = new Details();
        $details->setShipping($address->city->shipping_amount - $count_coupon)
            ->setTax(0.0)
            ->setSubtotal($total_price);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($total_price + ($address->city->shipping_amount - $count_coupon))
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
        if ($request->payment != 2) {
            $city = City::find($request->address_id);
            $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
            $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
            $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
            $count_coupon = 0;
            $coupons = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->get();
            foreach ($coupons as $coupon) {
                $count_coupon += $coupon->value;
                $coupon->used = 2;
                $coupon->save();
            }
            $order = Order::create([
                'client_id' => \Auth::guard('client')->user()->id,
                'address_id' => $address->id,
                'shipping_amount' => $city->shipping_amount,
                'total_price' => ($total_price + $city->shipping_amount) - $count_coupon,
                'lang' => getCode(),
                'payment' => $request->payment,
            ]);
            foreach ($carts as $cart) {
                $detail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                    'total_price' => $cart->total_price,
                ]);
                $cart->product->stock = $cart->product->stock - $cart->quantity;
                $cart->product->solid_count = $cart->product->solid_count + $cart->quantity;
                $cart->product->save();
                $cart->delete();
            }
            $client = \Auth::guard('client')->user();

            Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
                $m->from($client->email, __('front.order'));
                $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
            });

            Mail::send('front.mail_client', ['order' => $order , 'client' => $client], function ($m) use ($client) {
              $m->from($client->email, __('front.order'));
              $m->to($client->email, __('front.title'))->subject(__('front.order'));
          });
            // Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
            //     $m->to(setting('front.order'), __('front.title'))->subject(__('front.order'));
            // });
            $link = url('order/'.$order->id);
            send_notification(' Make New order  #'.$order->id.' ',\Auth::guard('client')->user()->id,$link);
            return redirect('clients/thanksv2');
        } else {
            return back()->with('error', "please enter valid payment");
        }
    }

    public function myorderv2($id)
    {
        $order = Order::find($id);
        $recently_added = Product::where('recently_added', 1)->get();
        return view('frontv2.myorder', compact('order', 'recently_added'));
    }

    public function choose_addressv2()
    {
        $countrys = Governorate::all();
        $citys = City::all();
        return view('frontv2.order_address', compact('countrys', 'citys'));
    }

    public function confirm_order($id)
    {
        $auth_carts = [];
        $session_carts = [];
        $total_price = 0;
        $city = City::whereId($id)->first();
        if (\Auth::guard('client')->check()) {
            $auth_carts = \Auth::guard('client')->user()->carts;
            $total_price = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
            if (!$city) {
                $city = \Auth::guard('client')->user()->cities[0];
                $city = City::whereId($city->pivot->city_id)->first();
            }
        }
        if (isset($_COOKIE['carts'])) {
            $session_carts = unserialize($_COOKIE['carts']);
            for ($i = 0; $i < count($session_carts); $i++) {
                $total_price += $session_carts[$i]['total_price'];
            }
        }
        return view('frontv2.confirm_order', compact('auth_carts', 'session_carts', 'total_price', 'id', 'city'));
    }

    public function paymentv2(Request $request)
    {
        return view('frontv2.payment');
    }

    public function readyNbe(Request $request)
    {
        $city = City::find($request->address_id);
        $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
        $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
        $subTotal = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
        $couponSum = 0;
        $coupons = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->get();
        foreach ($coupons as $coupon) {
            $couponSum += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
            'address_id' => $address->id,
            'shipping_amount' => $city->shipping_amount,
            'total_price' => ($subTotal + $city->shipping_amount) - $couponSum,
            'lang' => getCode(),
            'payment' => 5,
        ]);
        foreach ($carts as $cart) {
            $detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'total_price' => $cart->total_price,
            ]);
        }
        $order_id = $order->id;
        $tran_id  = time();
        $shipping_amount = $city->shipping_amount;
        $total_price = ($subTotal + $city->shipping_amount) - $couponSum;
        $session_id = $this->createSessionId($total_price, $order_id,$tran_id);
        return response()->json(['total_price' => $total_price, 'session_id' => $session_id, 'order_id' => $order_id , 'tran_id' => $tran_id]);
    }

    public function createSessionId($total, $order_id,$tran_id)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://nbe.gateway.mastercard.com/api/nvp/version/56');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=47a358008ed382e73fc720a5b90aed5f&apiUsername=merchant.AGHEZTY&interaction.operation=PURCHASE&merchant=AGHEZTY&order.id=$order_id&order.amount=$total&order.currency=EGP");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Accept: application/json';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        /*
        dd($response ) ; die;
        "merchant=EGPTEST1&result=SUCCESS&session.id=SESSION0002606191681G2576961F67&session.updateStatus=SUCCESS&session.version=4e391d3301&successIndicator=67a3193450dc495f"
        */

        $result = explode('&', $response);
        $sub_id = explode('=', array_reverse($result)[0])[1];
        $session_id = explode('=', $result[2])[1];

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://test-nbe.gateway.mastercard.com/api/rest/version/56/merchant/EGPTEST1/session",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_HTTPHEADER => array(
        //     "Accept: application/json",
        //     "Content-Type: application/json",
        //     "Authorization: Basic bWVyY2hhbnQuRUdQVEVTVDE6NjE0MjI0NDVmNmMwZjk1NGUyNGM3YmQ4MjE2Y2VlZGY=",
        //     "Cookie: TS0183aa3c=01772feb4bbad78180282345abfd6a199727ca0c704ae9899c3331f65d08dc9ede999e96d5d7249211f43665574cb69ab835af2287"
        //   ),
        // ));

        // $response = curl_exec($curl);

        // $result   = json_decode($response) ;

        curl_close($ch);

        session()->put('successIndicator', $sub_id);

        $actionName = "NBE Integration";
        $not_URL = 'https://nbe.gateway.mastercard.com/api/nvp/version/56';
        $parameters_arr = array(
            'response' => $response,
            'successIndicator' => $sub_id,
            'date' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'session_id' => $session_id,
            'tran_id' => $tran_id
        );
        $this->log($actionName, $not_URL, $parameters_arr);

        return $session_id;
    }

    public function createOrderWithPayment(Request $request)
    {

        if ($request->has('resultIndicator') && session()->has('successIndicator') && session()->get('successIndicator') != '' && $request->resultIndicator != '' && $request->resultIndicator == session()->get('successIndicator')) {
            $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
            //update product stock after nbe success
            foreach ($carts as $cart) {
                $cart->product->stock = $cart->product->stock - $cart->quantity;
                $cart->product->solid_count = $cart->product->solid_count + $cart->quantity;
                $cart->product->save();
                $cart->delete();
            }
            $order = Order::find($request->order_id);
            $order = tap($order , function($order)  use ($request){
                $order->update(['payment_status' => PaymentStatus::Success, 'transaction_id' =>$request->tran_id]);
            });
            $client = \Auth::guard('client')->user();
            Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
                $m->from($client->email, __('front.order'));
                $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
            });
            $link = url('order/'.$order->id);
            send_notification(' Make New order  #'.$order->id.' ',\Auth::guard('client')->user()->id,$link);
            session()->forget('nbe_click_script');
            return response()->json(['status' => 'success', 'returnUrl' => route('front.home.checkout.thanks')]);
        }
        return response()->json(['status' => 'error', 'returnUrl' => '']);
    }

    //cib integration
    public function readyCIB(Request $request)
    {
        $city = City::find($request->address_id);
        $address = ClientAddress::where('client_id', \Auth::guard('client')->user()->id)->where('city_id', $request->address_id)->first();
        $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
        $subTotal = Cart::where('client_id', \Auth::guard('client')->user()->id)->sum('total_price');
        $couponSum = 0;
        $coupons = \App\Coupon::where('client_id', \Auth::guard('client')->user()->id)->where('used', 1)->get();
        foreach ($coupons as $coupon) {
            $couponSum += $coupon->value;
            $coupon->used = 2;
            $coupon->save();
        }
        $order = Order::create([
            'client_id' => \Auth::guard('client')->user()->id,
            'address_id' => $address->id,
            'shipping_amount' => $city->shipping_amount,
            'total_price' => ($subTotal + $city->shipping_amount) - $couponSum,
            'lang' => getCode(),
            'payment' => 4,
        ]);
        foreach ($carts as $cart) {
            $detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'total_price' => $cart->total_price,
            ]);
        }
        $order_id = $order->id;
        $tran_id  = time();
        $shipping_amount = $city->shipping_amount;
        $total_price = ($subTotal + $city->shipping_amount) - $couponSum;
        $session_id = $this->createSessionIdCib($total_price, $order_id,$tran_id);
        return response()->json(['total_price' => $total_price, 'session_id' => $session_id, 'order_id' => $order_id , 'tran_id' => $tran_id]);
    }

    public function createSessionIdCib($total, $order_id,$tran_id)
    {


      /*

      // ======= test for Cib :  =================//
      Merchant Name                                     : Aghezty
      Merchant ID                                          : TESTCIB700926
      Settlement CCY                                     : EGP
      Integration Authentication Password        : c9f7bfa67d53ad74fd59b5e18a1c4ce0


      Operator ID & password for Merchanthttps://cibpaynow.gateway.mastercard.com/ma/login.s

      Operator ID  :  Merchant
      Password      : m1234567

    // ======= live for Cib :  =================//

    Merchant Name                                     : Aghezty
    Merchant ID                                        : CIB700926
    Settlement CCY                                     : EGP
    Integration Authentication Password               : 4aef315b907775be5bc05e384d734686

      */

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://cibpaynow.gateway.mastercard.com/api/nvp/version/56');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=4aef315b907775be5bc05e384d734686&apiUsername=merchant.CIB700926&interaction.operation=PURCHASE&merchant=CIB700926&order.id=$order_id&order.amount=$total&order.currency=EGP");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Accept: application/json';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        $result = explode('&', $response);
        $sub_id = explode('=', array_reverse($result)[0])[1];
        $session_id = explode('=', $result[2])[1];

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://test-nbe.gateway.mastercard.com/api/rest/version/56/merchant/EGPTEST1/session",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_HTTPHEADER => array(
        //     "Accept: application/json",
        //     "Content-Type: application/json",
        //     "Authorization: Basic bWVyY2hhbnQuRUdQVEVTVDE6NjE0MjI0NDVmNmMwZjk1NGUyNGM3YmQ4MjE2Y2VlZGY=",
        //     "Cookie: TS0183aa3c=01772feb4bbad78180282345abfd6a199727ca0c704ae9899c3331f65d08dc9ede999e96d5d7249211f43665574cb69ab835af2287"
        //   ),
        // ));

        // $response = curl_exec($curl);

        // $result   = json_decode($response) ;

        curl_close($ch);

        session()->put('successIndicator', $sub_id);

        $actionName = "CiB Integration";
        $not_URL = 'https://cibpaynow.gateway.mastercard.com/api/nvp/version/56';
        $parameters_arr = array(
            'response' => $response,
            'successIndicator' => $sub_id,
            'date' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'session_id' => $session_id,
            'tran_id' => $tran_id
        );
        $this->log($actionName, $not_URL, $parameters_arr);

        return $session_id;
    }

    public function nbe_click_script(){
        session()->put('nbe_click_script', true);
        session()->forget('cib_click_script');
    }

    public function cib_click_script(){
        session()->put('cib_click_script', true);
        session()->forget('nbe_click_script');
    }

    public function createOrderWithPaymentCIB(Request $request)
    {
        if ($request->has('resultIndicator') && session()->has('successIndicator') && session()->get('successIndicator') != '' && $request->resultIndicator != '' && $request->resultIndicator == session()->get('successIndicator')) {
            $carts = Cart::where('client_id', \Auth::guard('client')->user()->id)->get();
            //update product stock after cib success
            foreach ($carts as $cart) {
                $cart->product->stock = $cart->product->stock - $cart->quantity;
                $cart->product->solid_count = $cart->product->solid_count + $cart->quantity;
                $cart->product->save();
                $cart->delete();
            }
            $order = Order::find($request->order_id);
            $order = tap($order , function($order) use ($request){
                $order->update(['payment_status' => PaymentStatus::Success, 'transaction_id' =>$request->tran_id]);
            });
            $client = \Auth::guard('client')->user();
            Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
                $m->from($client->email, __('front.order'));
                $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
            });
            $link = url('order/'.$order->id);
            send_notification(' Make New order  #'.$order->id.' ',\Auth::guard('client')->user()->id,$link);
            session()->forget('cib_click_script');
            return response()->json(['status' => 'success', 'returnUrl' => route('front.home.checkout.thanks')]);
        }
        return response()->json(['status' => 'error', 'returnUrl' => '']);
    }
    //end cib
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
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $contact = Contact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'product_id' => $request->product_id,
            'city_id' => $request->city_id,
            'lang' => getCode(),
        ]);
        $products = Product::whereId($request->product_id)->get();
        Mail::send('front.mail2', ['products' => $products, 'client' => $contact, 'subject' => __('front.new_request_for_this_product')], function ($m) use ($request) {
            $m->from($request->email, __('front.order'));
            $m->to(setting('super_mail'), __('front.title'))->subject(__('front.product'));
        });
        $link = url('unavailable');
        if (\Auth::guard('client')->check()) {
            send_notification('Request For unavailable Product #' . $request->product_id . ' ', \Auth::guard('client')->user()->id, $link);
        }
        \Session::flash('success', __('front.client_success_message'));
        return back();

    }

    public function logoutv2()
    {
        auth()->guard('client')->logout();
        return redirect(route('front.home.index'));
    }

    //helper function api
    public function getProperty(Request $request)
    {
      if ($request->filled('category_id')) {
          $propertys = Property::with(['pvalue']);
          $propertys = $propertys->whereIn('category_id', (array) $request->category_id);
          $propertys = $propertys->get();
          return (PropertyResource::collection($propertys));
        }
        return [];
    }

    function getBrand(Request $request)
    {
      $brands = \App\Brand::select('brands.*')
      ->join('products', 'products.brand_id', '=', 'brands.id')
      ->whereIn('products.category_id', explode(',',$request->category_ids))
      ->groupBy('brands.id')
      ->get();

     return BrandResource::collection($brands);
    }

    public function getChild(Request $request)
    {
      $childrens = Category::has('sub_cats');
      if($request->has('category_id')){
        $childrens = $childrens->whereIn('id',(array)$request->category_id);
      }
      $childrens = $childrens->get();
      return  (CategoryResource::collection($childrens));

    }

    public function canclePayment(Request $request)
    {
        $order = Order::find($request->order_id)->update(['payment_status' => PaymentStatus::Cancle , 'transaction_id' =>$request->tran_id]);
        return 'yes';
    }

    public function failPayment(Request $request)
    {
        $order = Order::find($request->order_id)->update(['payment_status' => PaymentStatus::Fail, 'transaction_id' =>$request->tran_id]);
        return 'yes';
    }
    /*********************************************************** end design v2 *******/

    // encrypt and descrypt
    public function encrypt($pure_string, $encryption_key)
    {
        $cipher = 'AES-256-CBC';
        $options = OPENSSL_RAW_DATA;
        $hash_algo = 'sha256';
        $sha2len = 32;
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($pure_string, $cipher, $encryption_key, $options, $iv);
        $hmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);
        return $iv . $hmac . $ciphertext_raw;
    }
    public function decrypt($encrypted_string, $encryption_key)
    {
        $cipher = 'AES-256-CBC';
        $options = OPENSSL_RAW_DATA;
        $hash_algo = 'sha256';
        $sha2len = 32;
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($encrypted_string, 0, $ivlen);
        $hmac = substr($encrypted_string, $ivlen, $sha2len);
        $ciphertext_raw = substr($encrypted_string, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $encryption_key, $options, $iv);
        $calcmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);
        if (function_exists('hash_equals')) {
            if (hash_equals($hmac, $calcmac)) {
                return $original_plaintext;
            }

        } else {
            if ($this->hash_equals_custom($hmac, $calcmac)) {
                return $original_plaintext;
            }

        }
    }
    /**
     * (Optional)
     * hash_equals() function polyfilling.
     * PHP 5.6+ timing attack safe comparison
     */
    public function hash_equals_custom($knownString, $userString)
    {
        if (function_exists('mb_strlen')) {
            $kLen = mb_strlen($knownString, '8bit');
            $uLen = mb_strlen($userString, '8bit');
        } else {
            $kLen = strlen($knownString);
            $uLen = strlen($userString);
        }
        if ($kLen !== $uLen) {
            return false;
        }
        $result = 0;
        for ($i = 0; $i < $kLen; $i++) {
            $result |= (ord($knownString[$i]) ^ ord($userString[$i]));
        }
        return 0 === $result;
    }

    // define('ENCRYPTION_KEY', '__^%&Q@$&*!@#$%^&*^__');
    // $string = "This is the original string!";



    public function productsv2Slug(Request $request)
    {
        session()->put('coming_from', 'category');
        if($request->route("brand_id")){
          session()->put('coming_from', 'brand');
        }

        $sub_category_ids = [];
        $brand_ids = [];
        $products = Product::select('products.*','products.id as product_id');
        if ($request->sub_category_id) {
            $request->sub_category_id = (array) $request->sub_category_id;
            $sub_category_ids  =  $request->sub_category_id;
            $products = $products->whereIn('category_id', $request->sub_category_id);
        }
        if ($request->has('category_id') && $request->category_id != '') {
          //dd("cat");
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->category_id) {
          //dd("cat");
            $sub_category_ids = Category::where('parent_id', $request->category_id)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $sub_category_ids);
        }
        if ($request->brand_id) {
          //dd("brand");
            $request->brand_id = (array) $request->brand_id;
            $brand_ids  =  $request->brand_id;
            $products = $products->whereIn('brand_id', $request->brand_id);
        }
        if ($request->has('from') && $request->from != '') {
          $products = $products->where(function($q){
            $q->where('price', '>=', request('from'))->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount",">=",request("from"));
            });
          });
      }
      if ($request->has('to') && $request->to != '') {
          $products = $products->where(function($q){
            $q->where('price', '<', request("to"))
            ->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount","<",request("to"));
            });
          });
      }
      if ($request->has('from_to') && $request->from_to != '') {
          $products = $products->where(function($q){
          $q->whereBetween('price', explode(',', request('from_to')))
          ->orWhere(function($query){
            $query->where("price_after_discount",">",0);
            $query->whereNotNull("price_after_discount");
            $query->whereBetween("price_after_discount", explode(',', request()->get("from_to")));
          });
        });
      }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }




      if ($request->has('search') && $request->search != '') {
        $products = $products->join('translatables','translatables.record_id','=','products.id')
          ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
          ->where('translatables.table_name','products')
          ->where('translatables.column_name','title')
          ->where(function($q) use ($request){
            $q->where('products.title', 'like', '%' . $request->search . '%');
            $q->orWhere('products.short_description', 'like', '%' . $request->search . '%');
            $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
          });
      }


        if ($request->has('offer') && $request->offer != '') {
            // $products = $products->where('offer', 1);
            $products = $products->where(function($q) {
              // $q->where("offer", 1);
              $q->where("price_after_discount", '>', 0);
              // $q->orderBy('offer');
            });
        }
        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
        if ($request->filled('most_solid')) {
          // $products = $products->whereHas("orders",function($q){
          //   $q->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $q->where('orders.status','=', 3);
          // })->withCount(["orders" => function($query) {
          //   $query->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $query->where('orders.status','=', 3);
          // }])->groupBy("products.id")->orderBy("orders_count","desc");
          $products = $products->where("solid_count", '>', 0)->orderBy("solid_count","desc");
        }
        if ($request->filled('in_stock')) {
          $products = $products->where("stock", '>', 0);
        }
        if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }
        $products = $products->where('products.active', 1)->limit(get_limit_paginate())->get();

        return view('frontv2.listproduct', compact('products', 'sub_category_ids','brand_ids'));
    }

    public function productsv2Filter(Request $request)
    {
      if(!session()->has("coming_from")) {
        session()->put('coming_from', 'category');
      }
        $products = Product::select('products.*','products.id as product_id');

        if ($request->category_name) {
          $products = $products->whereHas("category",function($builder) {
            $builder->where('categories.title', str_replace("-", " ", request()->route("category_name")));
          });
        }
        if ($request->brands_name) {
          $products = $products->whereHas("brand",function($builder) {
            $builder->whereIn('brands.title',  explode("-", request()->route("brands_name")) );
          });
        }

        $category = $products;
        $brand    = $products;
        $sub_category_ids = $category->pluck("category_id")->toArray();

        $brand_ids        = array_values(array_unique($brand->pluck("brand_id")->toArray()));
        if ($request->has('from') && $request->from != '') {
          $products = $products->where(function($q){
            $q->where('price', '>=', request('from'))->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount",">=",request("from"));
            });
          });
      }
      if ($request->has('to') && $request->to != '') {
          $products = $products->where(function($q){
            $q->where('price', '<', request("to"))
            ->orWhere(function($query){
              $query->where("price_after_discount",">",0);
              $query->whereNotNull("price_after_discount");
              $query->where("price_after_discount","<",request("to"));
            });
          });
      }
      if ($request->has('from_to') && $request->from_to != '') {
          $products = $products->where(function($q){
          $q->whereBetween('price', explode(',', request('from_to')))
          ->orWhere(function($query){
            $query->where("price_after_discount",">",0);
            $query->whereNotNull("price_after_discount");
            $query->whereBetween("price_after_discount", explode(',', request()->get("from_to")));
          });
        });
      }
        if ($request->has('ifrom') && $request->ifrom != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '>=', $request->ifrom);
            });
        }
        if ($request->has('ito') && $request->ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->where(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), '=', $request->ito);
            });
        }
        if ($request->has('ifrom_ito') && $request->ifrom_ito != '') {
            $products = $products->whereHas('pr_value', function ($q) use ($request) {
                $q->join('properties', 'property_values.property_id', '=', 'properties.id');
                $q->where('properties.title', 'LIKE', '%inch%');
                $q->whereBetween(\DB::raw("SUBSTRING_INDEX(`property_values`.`value`,' ',1)"), explode(',', $request->ifrom_ito));
            });
        }
        if ($request->has('search') && $request->search != '') {
          $products = $products->join('translatables','translatables.record_id','=','products.id')
            ->join('tans_bodies','tans_bodies.translatable_id','translatables.id')
            ->where('translatables.table_name','products')
            ->where('translatables.column_name','title')
            ->where(function($q) use ($request){
              $q->where('products.title', 'like', '%' . $request->search . '%');
              $q->orWhere('products.short_description', 'like', '%' . $request->search . '%');
              $q->orWhere('tans_bodies.body', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->has('offer') && $request->offer != '') {
            // $products = $products->where('offer', 1);
            $products = $products->where(function($q) {
              // $q->where("offer", 1);
              $q->where("price_after_discount", '>', 0);
              // $q->orderBy('offer');
            });
        }
        if ($request->has('sorted') && $request->sorted != '') {
            $products = $products->orderBy(explode(',', $request->sorted)[0], explode(',', $request->sorted)[1]);
        }
        if ($request->has('last') && $request->last != '') {
            $products = $products->latest('created_at');
        }
        if ($request->has('random') && $request->random != '') {
            $products = $products->inRandomOrder();
        }
        if ($request->filled('most_solid')) {
          // $products = $products->whereHas("orders",function($q){
          //   $q->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $q->where('orders.status','=', 3);
          // })->withCount(["orders" => function($query) {
          //   $query->join('orders', 'orders.id', '=', 'order_details.order_id');
          //   $query->where('orders.status','=', 3);
          // }])->groupBy("products.id")->orderBy("orders_count","desc");
          $products = $products->where("solid_count", '>', 0)->orderBy("solid_count","desc");
        }
        if ($request->filled('in_stock')) {
          $products = $products->where("stock", '>', 0);
        }
        if ($request->has('property_value_id')) {
          $property = $this->getPropertyWithPropertyValue($request->property_value_id);
          $products = $products->where(function($query) use ($property){
            foreach ($property as $property_value_id) {
              $query->whereHas('pr_value', function ($q) use ($property_value_id) {
                $q->whereIn('property_values.id', $property_value_id);
              });
            }
          });
        }

        $products = $products->where('products.active', 1)->limit(get_limit_paginate())->get();

        return view('frontv2.listproduct', compact('products', 'sub_category_ids','brand_ids'));

    }

}
