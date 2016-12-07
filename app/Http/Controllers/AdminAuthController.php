<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Admin; 
use Validator; 

class AdminAuthController extends Controller{
    public function index(){
    	return view('admin.index'); 
    }

    public function login(){
    	$rules = [
    		'login' => 'required', 
    		'password' => 'required'
    	]; 

    	$validator = Validator::make(Input::all(), $rules); 

    	if($validator->fails()){
    		return redirect()->
    		route('login.page')->
    		withErrors($validator); 
    	}
    	
    	$admin = Admin::where('password', Input::get('password'))->
    	where('login', Input::get('login'))->
    	first(); 

    	if(empty($admin)){
    		return redirect()->
    		route('login.page')->
    		with('status', 'Login e Senha inválidos.'); 
    	}

    	session(['admin' => $admin]); 

    	return redirect()->route('dashboard'); 
    }

    public function logout(){
    	session()->flush(); 

    	return redirect()->
    	route('login.page')->
    	with('status', 'Você efetuou logout com sucesso'); 
    }
}
