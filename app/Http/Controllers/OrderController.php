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
    if ($request->has('client_id')) {
      $orders = $orders->where('client_id', $request->client_id);
    }
    $orders = $orders->get();
    return view('order.index', compact('orders'));
  }

  public function allData(Request $request)
  {

    $orders = Order::query();
    if ($request->has('client_id') && $request->client_id != '') {
      $orders = $orders->where('client_id', $request->client_id);
    }
    $orders = $orders->get();

    return \DataTables::of($orders)
      ->addColumn('index', function (Order $order) {
        return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$order->id}}" class="roles" onclick="collect_selected(this)">';
      })
      ->addColumn('id', function (Order $order) {
          return $order->id;
      })
      ->addColumn('client_name', function (Order $order) {
        if ($order->client && isset($order->client))
          return $order->client->name;
      })
      ->addColumn('total_price', function (Order $order) {
        return $order->total_price - $order->shipping_amount;
      })
      ->addColumn('shipping_amount', function (Order $order) {
        return (int)$order->shipping_amount;
      })
      ->addColumn('price_after_shipping', function (Order $order) {
        return $order->total_price;
      })
      ->addColumn('address', function (Order $order) {
        if ($order->address && isset($order->address))
          return $order->address->address . "," . $order->address->city->city_ar . " - " . $order->address->city->governorate->title_ar;
      })
      ->addColumn('status', function (Order $order) {
        return $order->status;
      })
      ->addColumn('action', function (Order $order) {
        return view('order.action', compact('order'))->render();
      })
      ->make(true);

  }


  public function show($id)
  {
    $order = Order::findOrFail($id);
    $languages = Language::all();
    return view('order.show', compact('order', 'languages'));
  }

  public function delete($id)
  {
    $order = Order::find($id);
    $order->delete();
    \Session::flash('success', 'Delete Order successful');
    return back();
  }

  public function delete_product(Request $request)
  {
    $product = OrderDetail::find($request->product_id);
    $order = Order::find($request->order_id);
    $order->total_price = $order->total_price - $product->total_price;
    $order->save();
    $product->delete();
    if (count($order->products) == 0) {
      $order->delete();
      \Session::flash('success', 'Delete Order successful');
      return redirect('order');
    }
    \Session::flash('success', 'Delete Product From This Order successful');
    return back();
  }

  public function update_status(Request $request)
  {
    $client = Client::find($request->client_id);
    $order = Order::find($request->order_id);
    $order->status = $request->status;
    $order->save();
    if ($request->status == 3) {
      $carts = OrderDetail::where('order_id', $request->order_id)->get();
      foreach ($carts as $key => $cart) {
        $product = Product::find($cart->product_id);
        $product->stock = $product->stock - $cart->quantity;
        $product->save();
      }
    }
    $admin = \Auth::user();
    Mail::send('front.mail', ['order' => $order, 'client' => $client, 'subject' => $request->message], function ($m) use ($client) {
      $m->from(setting('super_mail'), __('front.title'));
      $m->to($client->email, $client->name)->subject(__('front.order'));
    });
    \Session::flash('success', 'Email Is Send With Order Status');
    return back();
  }

  public function load_notify($number)
  {
    $notify_ids = \App\Notification::with('send_user')->where('notified_id', \Auth::id())->latest()->take($number)->pluck('id');
    //return $notify_ids;
    $notifys = \App\Notification::with('send_user')->where('notified_id', \Auth::id())->whereNotIn('id', $notify_ids)->latest()->take(2)->get();
    return $notifys;
  }
}
