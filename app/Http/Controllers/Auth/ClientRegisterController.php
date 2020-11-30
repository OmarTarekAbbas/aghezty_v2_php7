<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\ClientAddress;
use App\Cart;
class ClientRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showLoginForm()
    {
        return view('frontv2.auth.register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return url('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function register(Request $request)
    {
        $this->validator($request->except('city_id','governorate_id'))->validate();
        event(new Registered($user = $this->create($request->except('city_id','governorate_id','address'))));
        if($request->has('city_id') && $request->has('governorate_id') && $request->has('address')){
            ClientAddress::create([
                'client_id' => $user->id,
                'city_id'   => $request->city_id,
                'address'   => $request->address
            ]);
        }
        \Auth::guard('client')->login($user);
        if(isset($_COOKIE['carts'])){
            $carts = unserialize($_COOKIE['carts']);
            for ($i=0; $i < count($carts) ; $i++) {
                Cart::create([
                    'product_id' => $carts[$i]['product_id'],
                    'client_id' => $user->id,
                    'quantity'=> $carts[$i]['quantity'],
                    'price'  => $carts[$i]['price'],
                    'total_price' => $carts[$i]['price'] * $carts[$i]['quantity']
                ]);
            }
            unset($_COOKIE['carts']);
            setcookie('carts','', time() - 3600);
        }
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|unique:clients',
            'image' => '',
            // "address" => "required"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Client
     */
    protected function create(array $data)
    {
        $path='image';
        $img_name= 'png';
        if(isset($data['image']) && is_file($data['image']))
        {
          $value    = $data['image'];
          $path     = '/uploads/clients/'.date('Y-m-d').'/';
          $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
          $value->move(base_path($path),$img_name);
        }

        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'image' =>  $img_name
        ]);
    }
}
