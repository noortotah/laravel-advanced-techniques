<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SocialAccount;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
    	try {
    		$socialUser = Socialite::driver($provider)->user();
    	} catch (Exception $e) {
    		//create Flash message
    		return redirect('/login');
    	}
    	
    	$authUser = $this->findOrCreateUser($socialUser, $provider);

    	Auth::login($authUser, true);

    	return redirect('/home');
    }

    public function findOrCreateUser($socialUser, $provider)
    {
    	//check if this social account has logged in before
    	$account = SocialAccount::where('provider_name', $provider)
    							->where('provider_id', $socialUser->getId())
    							->first();
    	if($account) 
    	{
    		// if they have already, return user to log them on again
    		return $account->user;
    	} else {
    		//if that user has not logged in with this social account before
    		// check if they have an account with matching info (in this case email)
    		$user = User::where('email', $socialUser->getEmail())->first();

    		if (! $user ) {
    			//if no user record can be found , then create new user record
    			$user = User::create([
    				'email' => $socialUser->getEmail(),
    				'name' => $socialUser->getName(),
    			]);
    		}
    		// connect social account to new/old user record
    		$user->accounts()->create([
    			'provider_name' => $provider,
    			'provider_id' => $socialUser->getId(),
    		]);
    		
    		return $user;
    	}
    }
}
