<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Governorate;
use App\City;
use App\Language;
use Validator;
class GovernorateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();
        return view('governorate.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorate = NULL;
        $languages = Language::all();
        return view('governorate.form',compact('governorate','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'title_ar' => 'required|string|unique:governorates',
                    'title_en' => 'required|string|unique:governorates'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $governorate = Governorate::create($request->all());
        \Session::flash('success', 'Governorate Created Successfully');
        return redirect('/governorate');
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
        $governorate = Governorate::findOrFail($id);
        $languages = Language::all();
        return view('governorate.form',compact('governorate','languages'));
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
      $validator = Validator::make($request->all(), [
                  'title_ar' => 'required|string|unique:governorates,title_ar,'.$id,
                  'title_en' => 'required|string|unique:governorates,title_en,'.$id
          ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }

      $governorate = Governorate::findOrFail($id)->update($request->all());

      \Session::flash('success', 'Governorate Update Successfully');
      return redirect('/governorate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $governorate = Governorate::findOrFail($id)->delete();
      \Session::flash('success', 'Governorate Delete Successfully');
      return back();
    }

    public function OtherThanThat_city_insert()
    {
      $governorates = Governorate::all();
      foreach ($governorates as $governorate) {
        $city = New City();
        $city->city_en = 'Other than that (Shipping fees are determined by customer service)';
        $city->city_ar = 'غير ذلك (مصاريف الشحن تحدد من خلال خدمة العملاء)';
        $city->shipping_amount = 0;
        $city->governorate_id = $governorate->id;
        $city->save();
      }

      echo 'cities inserted successfully.';
    }
}
