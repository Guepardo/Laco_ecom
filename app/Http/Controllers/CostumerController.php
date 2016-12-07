<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer; 

class CostumerController extends Controller{
    
    public function index(){
    	$costumers = Costumer::all(); 
    	return view('costumer.index', ['costumers' => $costumers]); 
    }
}
