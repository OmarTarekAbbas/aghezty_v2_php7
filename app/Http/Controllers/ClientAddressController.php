<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ClientAddressController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('client_id')){
            $clients = Client::whereId($request->client_id)->get();
        }else{
            $clients = Client::all();
        }
        return view('client.address',compact('clients'));
    }
}
