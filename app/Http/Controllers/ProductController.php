<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator; 
use Hash; 
use Image; 

use App\Product; 
use App\Category; 
use App\Size; 



class ProductController extends Controller{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     public function index(){
        $products = Product::all(); 
        return view('product.index', ['products' => $products] ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $categories = Category::all(); 
        $sizes      = Size::all(); 

        return view('product.create', ['categories' => $categories, 'sizes' => $sizes]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        $rules = [
        'name' => 'required', 
        'min_stock' => 'required', 
        'stock'   => 'required', 
        'describe' => 'required', 
        'price'    => 'required', 
        'photo'    => 'required', 
        'categories_id' => 'required', 
        'sizes_id'  => 'required'
        ]; 

        $validator = Validator::make(Input::all(), $rules); 

        if($validator->fails()){
            return redirect()->
            route('product.create')->
            withInput()->
            withErrors($validator); 

        }

        $product = new Product(); 

        $product->name = Input::get('name');
        $product->min_stock = Input::get('min_stock');
        $product->stock = Input::get('stock');
        $product->describe = Input::get('describe');
        $product->price = Input::get('price');
        $product->categories_id = Input::get('categories_id');
        $product->sizes_id = Input::get('sizes_id');

        $imageName = time(); 

        $dir = public_path('uploads/'.$imageName.'.jpg'); 

        Image::make(Input::file('photo'))->resize(176,255)->save($dir); 

        $product->photo = $imageName; 
        $product->save();

        return redirect()->
        route('product.index')->
        with('status', 'Produto cadastrado com sucesso.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        $product = Product::find($id); 

        return view('product.show',['product' => $product]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $product = Product::find($id); 
        $categories = Category::all(); 
        $sizes      = Size::all(); 

        return view('product.edit',['product' => $product, 'categories' => $categories, 'sizes' => $sizes]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id){

        $rules = [
        'name' => 'required', 
        'min_stock' => 'required', 
        'stock'   => 'required', 
        'describe' => 'required', 
        'price'    => 'required', 
        'categories_id' => 'required', 
        'sizes_id'  => 'required'
        ]; 

        $validator = Validator::make(Input::all(), $rules); 

        if($validator->fails()){
            return redirect('/admin/product/'.$id.'/edit')->
            withInput()->
            withErrors($validator); 

        }

        $product = Product::find($id);  

        $product->name = Input::get('name');
        $product->min_stock = Input::get('min_stock');
        $product->stock = Input::get('stock');
        $product->describe = Input::get('describe');
        $product->price = Input::get('price');
        $product->categories_id = Input::get('categories_id');
        $product->sizes_id = Input::get('sizes_id');


        if(!empty(Input::file('photo'))){
             $imageName = time(); 

             $dir = public_path('uploads/'.$imageName.'.jpg'); 

             Image::make(Input::file('photo'))->resize(176,255)->save($dir); 

             unlink(public_path('uploads/'.$product->photo.'.jpg')); 
             $product->photo = $imageName; 
         }

         $product->save();     

         return redirect()->
         route('product.index')->
         with('status', 'Produto editado com sucesso.');  
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        $product = Product::find($id);  
        $product->delete(); 

        return redirect()->
        route('product.index')->
        with('status', 'Produto deletado com sucesso.');  
    }
}
