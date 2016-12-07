<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Costumer; 

class ShopController extends Controller{
    public function index(){
    	$products = Product::all(); 

    	return view('shop.index')->
    	with('products', $products); 
    }

    public function register(){
		if( empty(session('has_affiliate')))
			return redirect('/'); 

		$costumer =  Costumer::find(session('has_affiliate')); 

		$result =[
			'photo' => $costumer->avatar, 
			'name'  => $costumer->name
		];
		 
		return view('shop.affiliate_register')->with('costumer', $result); 
    }
}
