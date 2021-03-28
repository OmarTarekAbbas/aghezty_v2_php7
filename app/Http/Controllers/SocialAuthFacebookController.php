<?php
namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
        $this->setCartData($user);
        Auth::guard('client')->login($user);
        if(session('newuser'))
            return redirect()->to('clients/profilev2')->with('success', 'Please update your phone!');
        return redirect()->to('/');
    }

    /**
     * Method getCartData
     *
     * Take Data fro cookie and set it in cart table
     * @param User $user
     * @return void
     */
    public function setCartData($user)
    {
      if(isset($_COOKIE['carts'])) {
        $carts = unserialize($_COOKIE['carts']);
        for ($i=0; $i < count($carts) ; $i++) {
            \App\Cart::create([
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
    }
}
