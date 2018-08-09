<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
    	
    	//get account info
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        //is there any?
        if($account){
        	
        	//dump account user
            return $account->user;
        }else{

        	//create account
            $account = new SocialAccount([
                'provider_user_id'	=> $providerUser->getId(),
                'provider'			=> 'facebook'
            ]);

            //is there not a user with that email?
            $user = User::whereEmail($providerUser->getEmail())->first();
            if(!$user){
            	
            	//make it
                $user = User::create([
                    'email'	=> $providerUser->getEmail(),
                    'name'	=> $providerUser->getName(),
                ]);
            }

            //associate to user
            $account->user()->associate($user);
            $account->save();

            //dump user
            return $user;
        }
    }
}