<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Language;
use App\OrderDetail;
use App\Product;
use Mail;
use App\Client;
use App\OrderReplay;

class OrderController extends Controller
{
  public function index(Request $request)
  {

    return view('order.index');
  }

  public function allData(Request $request)
  {

    $orders = Order::query();
    if ($request->has('client_id') && $request->client_id != '') {
      $orders = $orders->where('client_id', $request->client_id);
    }
    $orders = $orders->latest('created_at')->get();

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
      ->addColumn('created_at', function (Order $order) {
          return $order->created_at;
      })
      ->addColumn('payment_status', function (Order $order) {
        return $order->payment_status;
      })
      ->addColumn('payment', function (Order $order) {
        return $order->payment;
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
    $order->products()->delete();
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
    //dd($request->status);
    $client = Client::find($request->client_id);
    $order = Order::find($request->order_id);
    $order->status = $request->status;
    $order->save();

    $lang = session()->get('applocale');
    //dd($order->payment);
    if ($lang == "en") {
     $Cash = "Cash"; //$order->payment == 1 en
     $Visa_After_Deliver = "Visa After Deliver"; //$order->payment == 3 en
    } else {
      $Cash = "نقدا عند الاستلام"; //$order->payment == 1 ar
      $Visa_After_Deliver = "Visa After Deliver"; //$order->payment == 3 ar
    }
    
    if ($request->status == 3 && ($order->payment == $Cash || $order->payment == $Visa_After_Deliver)) { // admin make finish
      $carts = OrderDetail::where('order_id', $request->order_id)->get();
      foreach ($carts as $key => $cart) {
        $product = Product::find($cart->product_id);
        $product->stock       = $product->stock - $cart->quantity;
        $product->solid_count = $product->solid_count + $cart->quantity;
        $product->save();
      }
    }
    $admin = \Auth::user();
    if($request->status == 4 && ($order->payment == $Cash || $order->payment == $Visa_After_Deliver)){ // 4 = not_available + cash or cash on delivary
      //dd("omar");
      Mail::send('front.mail_not_available', ['order' => $order, 'client' => $client, 'subject' => $request->message], function ($m) use ($client) {
        $m->from(setting('super_mail'), __('front.title'));
        $m->cc(setting('super_mail'));
        $m->to($client->email, $client->name)->subject(__('front.order'));
      });
    } else {
      //dd("ahmed");
      Mail::send('front.mail', ['order' => $order, 'client' => $client, 'subject' => $request->message], function ($m) use ($client) {
        $m->from(setting('super_mail'), __('front.title'));
        $m->cc(setting('super_mail'));
        $m->to($client->email, $client->name)->subject(__('front.order'));
      });
    }

    $this->savedOrderReply($order, $request);
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

  /**
   * Method savedOrderReply
   *
   * @param Order $order
   * @param Request $request
   *
   * @return void
   */
  public function savedOrderReply($order, $request)
  {
    $data['status']    = $request->status;
    $data['order_id']  = $order->id;
    $data['client_id'] = $request->client_id;
    $data['admin_id']  = auth()->id();
    $data['message']   = $request->message;

    OrderReplay::create($data);
  }

  public function removeProductFromOrderDeatilsThatNotHaveOrder()
  {
    // return \App\OrderDetail::doesntHave("order")->pluck("order_id")->toArray();
    return \App\OrderDetail::doesntHave("order")->delete();
  //  order_ids = [22,23,23,24,25,25,26,27,27,28,29,29,30,31,32,32,32,33,34,34,35,35,36,37,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,68,69,70,71,72,72,73,74,75,76,77,78,79,80,81,82,82,85,86,87,88,89,90,91,92,93,94,94,95,96,97,97,98,98,98,99,100,101,102,103,107,107,107,108,108,108,109,109,109,110,111,112,113,114,114,115,115,146,147,148,149,159,161,161];
  }
}
