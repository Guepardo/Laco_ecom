<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Category; 
use Validator; 


class CategoryController extends Controller{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
        public function index(){
            $categories = Category::all(); 

            return view('category.index', ['categories' => $categories]); 
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view('category.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        $rules = [
        'label' => 'required'
        ]; 

        $validator = Validator::make(Input::all(), $rules); 

        if($validator->fails()){
            return redirect()->
            route('category.create')->
            withInput()->
            withErrors($validator); 
        }

        $category = new Category(); 

        $category->label = Input::get('label'); 
        $category->save(); 

        return redirect()->
        route('category.index')->
        with('status', 'Categoria cadastrado com sucesso.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        $category = Category::find($id); 

        return view('category.show', ['category' => $category]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $category = Category::find($id); 

        return view('category.edit', ['category' => $category]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id){
        $rules = [
        'label' => 'required'
        ]; 

        $validator = Validator::make(Input::all(), $rules); 

        if($validator->fails()){
            return redirect('/admin/category/'.$id.'/edit')->
            withInput()->
            withErrors($validator); 
        }

        $category = Category::find($id); 
        $category->label = Input::get('label'); 
        $category->save(); 

        return redirect()->
        route('category.index')->
        with('status', 'Produto editado com sucesso.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        $category = Category::find($id);  
        $category->delete(); 

        return redirect()->
        route('category.index')->
        with('status', 'Categoria deletado com sucesso.');  
    }
}
