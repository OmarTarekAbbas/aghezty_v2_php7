<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Product;
class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::latest('created_at')->whereNull('product_id')->get();
        return view('contact.index',compact('contacts'));
    }

    function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        \Session::flash('success', 'Contact Delete Successfully');
        return back();
    }

    // Request For New Product From Client
    public function request_index(){
        $contacts = Contact::whereNotNull('product_id')->get();
        return view('request_product.index',compact('contacts'));
    }

    public function message_to_user($id,Request $request){
        $contact = Contact::find($id);
        $products = Product::whereId($request->product_id)->get();
        \Mail::send('front.mail2', ['products' => $products , 'client' => $contact , 'subject' => $request->subject], function ($m) use ($request,$contact) {
            $m->from(setting('super_mail'), __('front.order'));
            $m->to($contact->email, __('front.title'))->subject(__('front.product'));
        });
        \Session::flash('success', 'Send Message Successfully');
        return back();
    }
}
