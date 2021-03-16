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
        Auth::guard('client')->login($user);
        if(session('newuser'))
            return redirect()->to('clients/profilev2')->with('success', 'Please update your phone!');
        return redirect()->to('/');
    }
}
