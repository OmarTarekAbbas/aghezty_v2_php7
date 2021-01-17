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
use App\Constants\OrderStatus;
use App\Constants\PaymentType;
use App\Jobs\SendOrderMailJob;

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
    $client = Client::find($request->client_id);
    $order = Order::find($request->order_id);

    //if old status is pending and admin make it finish direct make decrease product stock and increase product solid count
    if ($request->status == OrderStatus::FINISHED && $order->status == OrderStatus::PENDING &&
       ($order->payment == PaymentType::getLabel(PaymentType::CASH) || $order->payment == PaymentType::getLabel(PaymentType::VISA_AFTER_DELIVER))) {

        $this->handleStockAndSolidCountForProductAfterChangeOrderStatus($request);
    }

    //if old status is pending and admin make it UNDER SHIPPING direct make decrease product stock and increase product solid count
    if ($request->status == OrderStatus::UNDER_SHIPPING && $order->status == OrderStatus::PENDING &&
       ($order->payment == PaymentType::getLabel(PaymentType::CASH) || $order->payment == PaymentType::getLabel(PaymentType::VISA_AFTER_DELIVER))) {

        $this->handleStockAndSolidCountForProductAfterChangeOrderStatus($request);
    }

    if($request->status == OrderStatus::NOT_AVAILABLE &&
      ($order->payment == PaymentType::getLabel(PaymentType::CASH) || $order->payment == PaymentType::getLabel(PaymentType::VISA_AFTER_DELIVER))) {
        $mail_template_page = "front.mail_not_available";
        dispatch(new SendOrderMailJob($order, $client, $request->message, $mail_template_page));
    } else {
        $mail_template_page = "front.mail";
        dispatch(new SendOrderMailJob($order, $client, $request->message, $mail_template_page));
    }

    $order->status = $request->status;
    $order->save();
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

  /**
   * Method removeProductFromOrderDeatilsThatNotHaveOrder
   *
   * @return void
   */
  public function removeProductFromOrderDeatilsThatNotHaveOrder()
  {
    return \App\OrderDetail::doesntHave("order")->delete();
  }

  /**
   * Method handleStockAndSolidCountForProductAfterChangeOrderStatus
   *
   * when order status change to finish or under shipping make decrease for product stock and increase for product solid count
   *
   * @param Request $request
   *
   * @return void
   */
  public function handleStockAndSolidCountForProductAfterChangeOrderStatus($request)
  {
    $carts = OrderDetail::where('order_id', $request->order_id)->get();
    foreach ($carts as $key => $cart) {
      $product = Product::find($cart->product_id);
      $product->stock       = $product->stock - $cart->quantity;
      $product->solid_count = $product->solid_count + $cart->quantity;
      $product->save();
    }
  }
}
