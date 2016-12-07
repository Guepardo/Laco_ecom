<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer; 

class AffiliateController extends Controller{
    public function index($name){
		$costumer = Costumer::where('name', $name)->first(); 

		if(!empty($costumer))
			session(['has_affiliate' => $costumer->id]); 

		// return explode('_',$name); 
		return redirect()->
		route('shop.register'); 	  
    }

}
