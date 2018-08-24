<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use Flash;
use App\Models\Persona as Personae;
use App\Model\Entity\Park;


class SocialAuthController extends Controller
{
	public function redirect()
	{
		return Socialite::driver('facebook')->redirect();   
	}   

	public function callback(SocialAccountService $service)
	{
		
		//make and/or login user
		$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
		auth()->login($user, true);
		
		//make sure they have a persona
		$persona = $user->persona;
		if(!$persona){
		
			//unclaimed persona?
			$unclaimedPersona = Personae::where('validClaim', $user->email)->first();
			if($unclaimedPersona){
				
				//link it
				$unclaimedPersona->user_id = $user->id;
				$unclaimedPersona->validClaim = 'claimed';
				$unclaimedPersona->save();
				
				//if this is the park's first player...
				if($unclaimedPersona->park->personae->count() == 1){
					$user->is_mapkeeper = 1;
					$user->save();
				}
			
				//send them to their persona to edit

				Flash::success('Persona Claimed!  Take a moment to review and update your Persona.');
				return redirect('/personae/' . $unclaimedPersona->id . '/edit');
			}
		
			//nothing unclaimed waiting for them, and no persona...
			Flash::error('User confirmed!  However, there doesn\'t seem to be a Persona waiting for you.  This could be due to a couple reasons.<br><br>If your park isn\'t in the system, you\'ll want to follow the instructions to onboard your park.<br><br>If you have a local MapKeeper already, ask them to add your Persona, and/or if it already exists, send them your email address associated with Facebook.  When they have created it, or associated it with your Facebook email, the next time you log in it should detect the association automatically.<br><br>If you do not have a local MapKeeper, or if your MapKeeper ran off with the keys, you are going to have to find me and get my help resolving that.  I am also an Amtgarder, that should not be difficult ;)  However, I\'m suspicious, so you will have to prove it...Monarch approval required.');
		}
		
		//send them to the root
		return redirect()->to('/');
	}
}