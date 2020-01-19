<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Advertisement;
use App\Category;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function slidesv2()
    {

      $slides = Advertisement::where('type', 'slider')->orderBy('order', 'asc')->get();

      return view('homepage.slides', compact('slides'));

    }

    public function bannersv2()
    {

          $slides = Advertisement::where('type', 'homeads')->orderBy('order', 'ASC')->get();

          return view('homepage.banners', compact('slides'));

    }

    public function editv2(Request $request)
    {

        $slide = Advertisement::findorfail($request->id);

        return view('homepage.editslides', compact('slide'));

    }

    public function Recently_Addedv()
    {

        $recently_added = Product::where('recently_added', 1)->orderBy('created_at', 'ASC')->get();

        return view('homepage.Recently_Added', compact('recently_added'));

    }

    public function selected_for_youv()
    {

        $selected_for_you = Product::where('selected_for_you', 1)->orderBy('created_at', 'ASC')->get();

        return view('homepage.selected_for_you', compact('selected_for_you'));

    }

    public function selected_HPcat()
    {

        $selected_HPcat = Category::where('homepage', 1)->orderBy('created_at', 'ASC')->get();

        return view('homepage.selected_HPcat', compact('selected_HPcat'));

    }

    public function adsUpdatev2(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $slide = Advertisement::findorfail($request->id);

        $imgExtensions = array("png","jpeg","jpg");

        $img = $request->file;

        if(! in_array($img->getClientOriginalExtension(),$imgExtensions))
        {
            \Session::flash('failed','Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
            return back();
        }

        $slide->image = $img;
        $slide->save();

        \Session::flash('success', 'Updated Successfully');
        return redirect()->back();

    }

    public function change_state(Request $request)
    {

        $id = $request->id;
        $active = $request->switch;

        $slide = Advertisement::findorfail($id);

        if($active == 'true'){
            $slide->active = true;
        }else{
            $slide->active = false;
        }
        $slide->save();
        return 'changed!';
    }

    public function recently_added(Request $request)
    {


        $id = $request->id;
        $recently_added = $request->switch;

        $product = Product::findorfail($id);

        if($recently_added == 'true'){
            $RAproduct = Product::where('recently_added', 1)->count();
            if($RAproduct < 6){
                $product->recently_added = true;
            }else{
                return 'no';
            }
        }else{
            $product->recently_added = false;
        }
        $product->save();
        return 'yes';

    }

    public function selected_for_you(Request $request)
    {

        $id = $request->id;
        $selected_for_you = $request->switch;

        $product = Product::findorfail($id);

        if($selected_for_you == 'true'){
            $RAproduct = Product::where('selected_for_you', 1)->count();
            if($RAproduct < 6){
                $product->selected_for_you = true;
            }else{
                return 'no';
            }
        }else{
            $product->selected_for_you = false;
        }
        $product->save();
        return 'yes';

    }

    public function homepage_category(Request $request)
    {

        $id = $request->id;
        $homepage = $request->switch;

        $category = Category::findorfail($id);

        if($homepage == 'true'){
            $homepageCat = Category::where('homepage', 1)->count();
            if($homepageCat < 6){
                $category->homepage = true;
            }else{
                return 'no';
            }
        }else{
            $category->homepage = false;
        }
        $category->save();
        return 'yes';

    }

    public function change_order(Request $request)
    {
        $i = 1;
        foreach($request->item as $item){
            $slide = Advertisement::findorfail($item);
            $slide->order = $i;
            $slide->save();
            $i++;
        }
        return 'changed!';
    }
}
