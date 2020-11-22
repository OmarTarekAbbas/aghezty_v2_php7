<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class ReportIpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $report_ips = IpAddress::all();
        return view('report.ip_address');
    }

    public function most_sold_product()
    {
        $products = OrderDetail::select('*')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->groupBy('products.id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(100)
            ->get();
            // $products_count = \DB::table('order_details')
            // ->select('*')
            // // ->where('group_id', 3)
            // ->groupBy('product_id')
            // ->havingRaw('COUNT(*) > 1')
            // ->get();
            // dd($products_count);
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
