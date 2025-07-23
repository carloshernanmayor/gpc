<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guion;
use Illuminate\Support\Facades\Redirect;

class guionController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $guiones=guion::orderBy('id_guion','DESC')->paginate(10);
        return view('guion.index',compact('guiones'));

    }

    public function indexAdmin(){
        $guiones=guion::orderBy('id_guion','DESC')->paginate(10);
        return view('guion.indexadmin',compact('guiones'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view ('guion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guion=new guion;
        $guion->canal=$request->get('canal'); 
        $guion->mensaje=$request->get('mensaje');   
        $guion->fecha_creacion=$request->get('fecha');                                                  
        
        $guion->save();
        return Redirect::to('guion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ide){

        $guion=guion::findOrFail($ide);
        return view("guion.edit",["guion"=>$guion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $guion=guion::findOrFail($id);
        $guion->canal=$request->get('canal'); 
        $guion->mensaje=$request->get('mensaje');   
        $guion->fecha_creacion=$request->get('fecha');   
        $guion->update();
        return Redirect::to('guion');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $guion=guion::findOrFail($id);
       $guion->delete();
       return Redirect::to('guion');
    }
}
