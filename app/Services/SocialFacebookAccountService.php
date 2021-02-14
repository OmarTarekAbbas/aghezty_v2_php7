<?php
namespace App\Services;
use App\Client;
use App\SocialFacebookAccount;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
      // dd($providerUser);
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account &&  $account->user ) {
            return $account->user;
        } else {




            $user = Client::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = Client::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'image' => $providerUser->getAvatar(),
                    'password' => Hash::make('123456'),
                ]);
                session()->flash('newuser', 'newuser');
            }

            $SocialFacebookAccount =   SocialFacebookAccount::where("provider_user_id",$providerUser->getId())->where("provider","facebook")->where("user_id", $user->id)->first();
            if(!$SocialFacebookAccount){
              $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
                'user_id'=>  $user->id
            ]);
            }


            //$account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
