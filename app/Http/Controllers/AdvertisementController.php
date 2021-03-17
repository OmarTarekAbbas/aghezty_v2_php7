<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Validator;
class AdvertisementController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('advertisement.index',compact('advertisements'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisement = NULL;
        return view('advertisement.form',compact('advertisement'));
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
                    'image' => 'required',
                    'ads_url' => ''
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $path = 'uploads/advertisement/image_resize';
        $resized_image = resizeSliderImage($path, $request->image);

        $advertisement = Advertisement::create(array_merge($request->all(), ['image_resize', $resized_image]));
        \Session::flash('success', 'Advertisement Created Successfully');
        return redirect('/advertisement');
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
        $advertisement = Advertisement::findOrFail($id);
        return view('advertisement.form',compact('advertisement'));
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
            'image' => 'required',
            'ads_url' => ''
        ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }

      $path = 'uploads/advertisement/image_resize';
    $resized_image = resizeSliderImage($path, $request->image);

      $advertisement = Advertisement::findOrFail($id)->update(array_merge($request->all(), ['image_resize', $resized_image]));

      \Session::flash('success', 'Advertisement Update Successfully');
      return redirect('/advertisement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $advertisement = Advertisement::findOrFail($id)->delete();
      \Session::flash('success', 'Advertisement Delete Successfully');
      return back();
    }
}
