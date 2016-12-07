<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Product; 

//=Shop routes 
Route::get('login/facebook', 'CostumerAuthController@redirectToFacebookLogin'); 
Route::get('login/facebook/callback', 'CostumerAuthController@handlerFacebookCallback'); 


//Affiliate routes
Route::get('affiliate/{name}', 'AffiliateController@index'); 

Route::get('register',['as' => 'shop.register', 'uses' => 'ShopController@register']); 

//=End shop routes; 

Route::get('teste', function(){}); 


Route::get('/', 'ShopController@index');

Route::get('admin/login', ['as' => 'login.page', 'uses' => 'AdminAuthController@index']); 
Route::post('admin/login', 'AdminAuthController@login'); 
Route::get('admin/logout', 'AdminAuthController@logout'); 


Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function(){
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']); 

	Route::resource('product' , 'ProductController'); 
	Route::resource('category', 'CategoryController'); 
	Route::resource('size'    , 'SizeController'); 

	Route::get('costumer', 'CostumerController@index'); 

	Route::get('config',['as' => 'config.index', 'uses' => 'SystemConfigController@index']); 
	Route::put('config',['as' => 'config.update', 'uses' => 'SystemConfigController@update' ]); 

}); 
