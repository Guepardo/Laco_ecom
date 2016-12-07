<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\Costumer; 

class CostumerAuthController extends Controller{

	public function redirectToFacebookLogin(){
		return Socialite::driver('facebook')->redirect(); 
	}

	public function handlerFacebookCallback(){
		try {
			$user = Socialite::driver('facebook')->user();
			
			$costumer = self::findOrCreate($user); 

			session(['user' => $costumer]); 

			return redirect('/'); 

		} catch (Exception $e) {
			return ['status' => 'error']; 
		}
	}

	public function findOrCreate($user){
		$costumer = Costumer::where('facebook_id', '=', $user->id)->first(); 

		if(empty($costumer)){
			$costumer = new Costumer(); 

			$costumer->name          = $user->user['name']; 
			$costumer->email         = $user->user['email']; 
			$costumer->gender        = $user->user['gender']; 
			$costumer->link_facebook = $user->user['link']; 
			$costumer->facebook_id   = $user->user['id']; 

			$costumer->avatar = $user->avatar; 
			$costumer->original_avatar = $user->avatar_original; 
			$costumer->affiliates_id = ( session('has_affiliate') ) ? session('has_affiliate') : null; 

			$costumer->save(); 

			return $costumer; 
		}

		return $costumer; 
	}
}
