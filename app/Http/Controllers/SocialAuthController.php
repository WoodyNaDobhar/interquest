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
		$user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
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
			}else{
		
				//nothing unclaimed waiting for them, and no persona...
				Flash::error('User confirmed!  However, there doesn\'t seem to be a Persona waiting for you.  You can create it here.  If you park doesn\'t appear in the list below, contact us about onboarding your park.');
				
				//off to make a Persona
				return redirect('/personae/create');
			}
		}
		
		//send them to the root
		return redirect()->to('/');
	}
}