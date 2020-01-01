<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Language;
use App\OrderDetail;
use App\Product;
use Mail;
use App\Client;
class OrderController extends Controller
{
   public function index(Request $request)
   {
       $orders = Order::latest('created_at');
       if($request->has('client_id')){
           $orders = $orders->where('client_id',$request->client_id);
       }
       $orders = $orders->get();
       return view('order.index',compact('orders'));
   }

   public function show($id)
   {
        $order = Order::findOrFail($id);
        $languages = Language::all();
        return view('order.show',compact('order','languages'));
   }

   public function delete($id)
   {
        $order = Order::find($id);
        $order->delete();
        \Session::flash('success','Delete Order successful');
        return back();
   }

   public function delete_product(Request $request)
   {
       $product = OrderDetail::find($request->product_id);
       $order   = Order::find($request->order_id);
       $order->total_price = $order->total_price - $product->total_price;
       $order->save();
       $product->delete();
       if(count($order->products) == 0){
        $order->delete();
        \Session::flash('success','Delete Order successful');
        return redirect('order');
       }
       \Session::flash('success','Delete Product From This Order successful');
        return back();
   }

   public function update_status(Request $request)
   {
       $client = Client::find($request->client_id);
       $order  = Order::find($request->order_id);
       $order->status = $request->status;
       $order->save();
       if($request->status == 3){
         $carts = OrderDetail::where('order_id',$request->order_id)->get();
         foreach ($carts as $key => $cart) {
           $product = Product::find($cart->product_id);
           $product->stock = $product->stock - $cart->quantity;
           $product->save();
         }
       }
       $admin = \Auth::user();
        Mail::send('front.mail', ['order' => $order ,'client' => $client , 'subject' => $request->message], function ($m) use ($client) {
            $m->from(setting('super_mail'), __('front.title'));
            $m->to($client->email,$client->name)->subject(__('front.order'));
        });
        \Session::flash('success','Email Is Send With Order Status');
        return back();
   }

   public function load_notify($number)
   {
    $notify_ids = \App\Notification::with('send_user')->where('notified_id',\Auth::id())->latest()->take($number)->pluck('id');
    //return $notify_ids;
    $notifys = \App\Notification::with('send_user')->where('notified_id',\Auth::id())->whereNotIn('id',$notify_ids)->latest()->take(2)->get();
    return $notifys;
   }
}
