<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Size; 
use Validator; 


class SizeController extends Controller{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
        public function index(){
            $categories = Size::all(); 
            return view('size.index', ['sizes' => $categories]); 
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view('size.create'); 
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
            route('size.create')->
            withInput()->
            withErrors($validator); 
        }

        $size = new Size(); 

        $size->label = Input::get('label'); 
        $size->save(); 

        return redirect()->
        route('size.index')->
        with('status', 'Categoria cadastrado com sucesso.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id){
        $size = Size::find($id); 
        return view('size.show', ['size' => $size]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $size = Size::find($id); 
        return view('size.edit', ['size' => $size]); 
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
            return redirect('/admin/size/'.$id.'/edit')->
            withInput()->
            withErrors($validator); 
        }

        $size = Size::find($id); 
        $size->label = Input::get('label'); 
        $size->save(); 

        return redirect()->
        route('size.index')->
        with('status', 'Produto editado com sucesso.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id){
        $size = Size::find($id);  
        $size->delete(); 

        return redirect()->
        route('size.index')->
        with('status', 'Categoria deletado com sucesso.');  
    }
}
