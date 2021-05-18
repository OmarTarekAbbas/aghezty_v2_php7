<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Property;
use App\PropertyValue;
use App\Language;
use App\ProductProperty;
use Validator;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $propertys = Property::query();
      if($request->has('category_id')){
        $propertys = $propertys->whereIn('category_id',(array)$request->category_id);
      }
      if($request->ajax()){
        $propertys = $propertys->with(['pvalue']);
      }
      $propertys = $propertys->get();
      $languages = Language::all();
      if($request->ajax()){
        return $propertys;
      }
      return view('property.index',compact('propertys','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $property = null;
      $categorys = Category::whereNull('parent_id')->get();
      $property_values = null;
      $languages = Language::all();
      return view('property.form',compact('categorys','property','languages', 'property_values'));
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
                  'title' => 'required|array',
                  'title.*' => 'required|string',
                  'category_id' => 'required|exists:categories,id',
          ]);

          if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property = new Property();
        $property->fill($request->except('title'));
        foreach ($request->title as $key => $value)
        {
            $property->setTranslation('title', $key, $value);
        }
        $property->save();

        //Save new property values
        if ($request->new_values && count($request->new_values) > 0) {
          foreach ($request->new_values as $new_value) {
            $property_value = new PropertyValue();
            foreach ($new_value as $key => $value) {
              $property_value->setTranslation('value', $key, $value);
            }
            $property_value->property_id = $property->id;
            $property_value->save();
          }
        }

        \Session::flash('success', 'Property Created Successfully');
        return redirect('property/'.$request->parent_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $property  = Property::findOrFail($id);
      return redirect('propert_value?property_id='.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $property =  Property::findOrFail($id);
      $categorys = Category::whereNotNull('parent_id')->get();
      $property_values = PropertyValue::where('property_id',$property->id)->get();
      $languages = Language::all();
      return view('property.form',compact('property','categorys','languages','property_values'));
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
      'title' => 'required|array',
      'title.*' => 'required|string',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $property = Property::findOrFail($id);

    foreach ($request->title as $key => $value) {
      $property->setTranslation('title', $key, $value);
    }

    $property->update($request->except('title'));


    //Save new property values
    if ($request->new_values && count($request->new_values) > 0) {
      foreach ($request->new_values as $new_value) {
        $property_value = new PropertyValue();
        foreach ($new_value as $key => $value) {
          $property_value->setTranslation('value', $key, $value);
        }
        $property_value->property_id = $property->id;
        $property_value->save();
      }
    }

    //Update old property values
    if ($request->old_values && count($request->old_values) > 0) {
      foreach ($request->old_values as $old_key => $old_value) {
        $property_value = PropertyValue::findOrFail($old_key);
        foreach ($old_value as $key => $value) {
          $property_value->setTranslation('value', $key, $value);
        }
        $property_value->save();
      }
    }

    \Session::flash('success', 'Property Updated Successfully');
    return redirect('property/' . $request->parent_id);
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $property = Property::findOrFail($id);

      $property->delete();

      $this->removeAllDependency($id);

      \Session::flash('success', 'Property Delete Successfully');
      return back();
    }

    /**
     * Method removeAllDependency
     *
     * remove property value that belong to this property && remove product that belong to each property value
     * @param int $id
     *
     * @return void
     */
    public function removeAllDependency($id)
    {
      $propertyValues = PropertyValue::where("property_id", $id)->get();

      foreach($propertyValues as $value) {
        ProductProperty::where("property_value_id",$value->id)->delete();
        PropertyValue::whereId($value->id)->delete();
      }

    }

    public function createHTML($item_counter)
    {
      $languages = Language::all();

      $property_value_html = "<div id='new-property-value-div-" . $item_counter . "' style='padding-top: 10px;'>";
      $property_value_html .= "<div class='col-sm-9 col-lg-10'>";
      $property_value_html .= "<ul class='nav nav-tabs'>";

      foreach ($languages as $key=>$language) {
        $active = !$key? 'active' : '';
        $property_value_html .= "<li class='$active'><a href='#value_$language->short_code". '_' ."$item_counter' data-toggle='tab'> $language->title </a></li>";
      }

      $property_value_html .= "</ul>";
      $property_value_html .= "<div class='tab-content'>";


      foreach ($languages as $key=>$language) {
        $active = !$key? 'active' : '';
        $property_value_html .= "<div class='tab-pane fade in $active' id='value_$language->short_code". '_' ."$item_counter'>";
        $property_value_html .= "<input class='form-control input-lg' name='new_values[" . $item_counter . "][".$language->short_code."]' type='text'>";
        $property_value_html .= "</div>";
      }

      $property_value_html .= "</div>";
      $property_value_html .= "</div>";
      $property_value_html .= "<div class='col-sm-3 col-lg-2'>";
      $property_value_html .= "<a class='btn btn-danger' href='javascript:void(0)' id='remove-property-value-button' style='margin-top: 40px; height: 45px; padding-top: 12px;'>Remove <i class='fa fa-trash'></i></a>";
      $property_value_html .= "</div>";

      return $property_value_html;
    }

    public function destroyPropertyValue(Request $request)
    {
      ProductProperty::where("property_value_id",$request->value_id)->delete();
      $property_value = PropertyValue::findOrFail($request->value_id);
      $property_value->delete();

      return response()->json(true);
    }
}
