<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Validator;
class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupon.index',compact('coupons'));
    }

    public function create()
    {
        $coupon = Null;
        return view("coupon.form",compact('coupon'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon_number' => 'required|min:1',
            'value' => 'required',
            'expire_date' => 'required|after:today'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        for ($i=0; $i < $request->coupon_number; $i++) {
            Coupon::create([
                'coupon' => substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 10) ,
                'value' => $request->value,
                'expire_date' => $request->expire_date
            ]);
        }
        \Session::flash('success', 'Governorate Created Successfully');
        return redirect('/coupon');
    }

    public function show($id)
    {
        # code...
    }

    public function edit($id)
    {
        # code...
    }

    public function update(Request $request , $id)
    {
        # code...
    }

    public function destroy($id)
    {
        $city = Coupon::findOrFail($id)->delete();
        \Session::flash('success', 'Coupon Delete Successfully');
        return back();
    }
}
