<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

use App\PropertyValue;
use App\Language;
use App\ProductProperty;
use Validator;
class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $property_values = PropertyValue::all();
      $property_values = PropertyValue::query();
      if($request->has('property_id')){
        $property_values = $property_values->where('property_id',$request->property_id);
      }
      $property_values = $property_values->get();
      if($request->ajax()){
        return $property_values;
      }
      $languages = Language::all();
      return view('property_value.index',compact('property_values','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $property_value = null;
      $propertys = Property::all();
      $languages = Language::all();
      return view('property_value.form',compact('propertys','property_value','languages'));
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
                  'value' => 'required|array',
                  'value.*' => 'required|string',
                  'property_id' => 'required|exists:properties,id',
          ]);

          if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property_value = new PropertyValue();
        $property_value->fill($request->except('value'));
        foreach ($request->value as $key => $value)
        {
            $property_value->setTranslation('value', $key, $value);
        }
        $property_value->save();
        \Session::flash('success', 'Property Value Created Successfully');
        return redirect('property_value?property_id='.$request->property_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $property_value  = PropertyValue::findOrFail($id);
      return redirect('propert_value?property_value_id='.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $property_value =  PropertyValue::findOrFail($id);
      $propertys = Property::all();
      $languages = Language::all();
      return view('property_value.form',compact('property_value','propertys','languages'));
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
                'value' => 'required|array',
                'value.*' => 'required|string',
                'property_id' => 'required|exists:properties,id',
      ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property_value = PropertyValue::findOrFail($id);

        foreach ($request->value as $key => $value)
        {
          $property_value->setTranslation('value', $key, $value);
        }

        $property_value->update($request->except('value'));

      \Session::flash('success', 'Property Value Updated Successfully');
      return redirect('property_value?property_id='.$request->property_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $property_value = PropertyValue::findOrFail($id);

      $property_value->delete();

      ProductProperty::where("property_value_id",$id)->delete();

      \Session::flash('success', 'Property Value Delete Successfully');
      return back();
    }
}
