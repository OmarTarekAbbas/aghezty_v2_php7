<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\ClientRate;
class ClientRateController extends Controller
{
    public function index(Request $request)
    {
        $rates  = ClientRate::latest('created_at');

        if($request->has('client_id'))
        {
            $rates = $rates->where('client_id',$request->client_id);
        }
        if($request->has('product_id'))
        {
            $rates = $rates->where('product_id',$request->product_id);
        }
        if($request->has('publish'))
        {
            $rates = $rates->where('publish',$request->publish);
        }

        $rates = $rates->get();

        return view('client.rate',compact('rates'));
    }

    public function update_rate($rate_id,Request $request)
    {
        $rate = ClientRate::find($rate_id)->update(['publish' => $request->value]);
        \Session::flash('success', 'update publish Successfully');
        return back();
    }
}
