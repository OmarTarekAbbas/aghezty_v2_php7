<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Validator;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('coupon.index',compact('coupons'));
    }

    /**
     * Method expiry_coupon
     *
     * @param Request $request [active and expire]
     *
     *@return val
     */
    public function expiry_coupon(Request $request){

      $date = Carbon::now()->toDateString();
      if ($request->coupon == 'active') {
        $coupons = Coupon::where('expire_date','>=',$date)->orderBy('id', 'DESC')->get();
      } else {
        $coupons = Coupon::where('expire_date','<=',$date)->orderBy('id', 'DESC')->get();
      }
      $datatable = \DataTables::of($coupons)
      ->addColumn('index', function(Coupon $coupon) {
          return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$coupon->id.'" class="roles" onclick="collect_selected(this)">';
      })
      ->addColumn('id', function(Coupon $coupon) {
          return $coupon->id;
      })
      ->addColumn('coupon', function(Coupon $coupon) {
          return $coupon->coupon;
      })
      ->addColumn('value', function(Coupon $coupon) {
        return $coupon->value;
      })
        ->addColumn('expire_date', function(Coupon $coupon) {
          return $coupon->expire_date;
      })
        ->addColumn('used', function(Coupon $coupon) {
          return $coupon->used;
      })
      ->addColumn('action', function(Coupon $coupon) {
        return '<td class="visible-md visible-lg">
                    <div class="btn-group">
                        <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="'.url("coupon/".$coupon->id."/delete").'" title="Delete"><i class="fa fa-trash"></i></a>
                    </div>
                </td>';
    })

      ->escapeColumns([])
      ->make(true);

      return $datatable;
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
