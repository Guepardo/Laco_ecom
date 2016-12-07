<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator; 

use App\SystemConfig; 

class SystemConfigController extends Controller{
    public function index(){
       $conf = SystemConfig::all()->first(); 

       return view('systemconfig.index', ['conf' => $conf]); 
    }

    public function update(){
    	$rules = [
    		'profit_wholesale' => 'required', 
    		'profit_retail'    => 'required', 
    		'affiliate_discount' => 'required'
    	]; 

    	$validator = Validator::make(Input::all(), $rules); 


    	if($validator->fails()){
    		 return redirect()->
            route('config.index')->
            withInput()->
            withErrors($validator); 
    	}

    	$conf = SystemConfig::all()->first(); 

    	$conf->profit_retail = Input::get('profit_retail'); 
    	$conf->profit_wholesale = Input::get('profit_wholesale'); 
    	$conf->affiliate_discount= Input::get('affiliate_discount'); 

    	$conf->save(); 

    	return redirect()->
    	route('config.index')->
    	with('status', 'As configurações do sistema foram atualizadas'); 
    }
}
