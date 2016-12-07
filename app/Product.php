<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
      public $timestamps  = false; 

      public function categories(){
      		return $this->belongsTo('App\Category'); 
      }

      public function sizes(){
      		return $this->belongsTo('App\Size'); 
      }
}
