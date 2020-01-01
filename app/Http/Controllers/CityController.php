<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Governorate;
use App\Language;
use Validator;
class CityController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = City::all();
        return view('city.index',compact('citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = NULL;
        $governorates = Governorate::all();
        $languages = Language::all();
        return view('city.form',compact('city','governorates','languages'));
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
                    'governorate_id' => 'required',
                    'shipping_amount' => 'required',
                    'city_ar' => 'required|string|unique:cities',
                    'city_en' => 'required|string|unique:cities'
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $city = City::create($request->all());
        \Session::flash('success', 'City Created Successfully');
        return redirect('/city');
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
        $city = City::findOrFail($id);
        $governorates = Governorate::all();
        $languages = Language::all();
        return view('city.form',compact('city','governorates','languages'));
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
                  'shipping_amount' => 'required',
                  'governorate_id' => 'required',
                  'city_ar' => 'required|string|unique:cities,city_ar,'.$id,
                  'city_en' => 'required|string|unique:cities,city_en,'.$id
          ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }

      $city = City::findOrFail($id)->update($request->all());

      \Session::flash('success', 'City Update Successfully');
      return redirect('/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $city = City::findOrFail($id)->delete();
      \Session::flash('success', 'City Delete Successfully');
      return back();
    }
}
