<?php

namespace App\Http\Controllers;

use App\IpAddress;
use App\Order;
use App\Product;
use App\OrderDetail;
use Illuminate\Http\Request;

class ReportIpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $report_ips = IpAddress::query();
        if($request->filled("search")) {
          $report_ips= $report_ips->whereDate("created_at",$request->search);
        }
        $report_ips = $report_ips->get();
        $entery_users = IpAddress::select(\DB::raw('DATE(created_at) as date'), \DB::raw('count(*) as total'))->groupBy('date')->latest()->get();
        return view('report.ip_address',compact("report_ips", "entery_users"));
    }

    public function most_sold_product()
    {
      // $products = OrderDetail::select(
      // 'order_details.id as order_details_id',
      // 'order_details.quantity as quantity',
      // 'order_details.order_id as order_id',
      // 'order_details.product_id as product_id',
      // 'products.title as title',
      // 'products.main_image as main_image',
      // 'orders.status as status'
      // )
      //     ->join('products', 'products.id', '=', 'order_details.product_id')
      //     ->join('orders', 'orders.id', '=', 'order_details.order_id')
      //     ->where('orders.status','=', 3)
      //     ->groupBy('products.id')
      //     ->orderByRaw('COUNT(*) DESC')
      //     ->limit(100)
      //     ->get();
      $products = Product::stock()->select('products.*','products.id as product_id')->where("solid_count", '>', 0)->orderBy("solid_count","desc")->get();
          //dd($products);
        return view('report.most_sold_product', compact('products'));
    }

    public function number_of_purchases()
    {
        $count_orders = Order::count();
        $order_cash = Order::where('payment',1)->count();
        $order_visa_after_deliver = Order::where('payment',3)->count();
        $order_CIB_VISA = Order::where('payment',4)->count();
        $order_NBE_VISA = Order::where('payment',5)->count();
        //  dd($orders);
        return view('report.number_of_purchases', compact('count_orders','order_cash','order_visa_after_deliver','order_CIB_VISA','order_NBE_VISA'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    }
}
