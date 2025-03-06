<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendedor;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class vendedorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $vendedor=vendedor::orderBy('id_vendedor','ASC')->paginate(10);
        //dd('$poscliente');
        return view('vendedores.index',compact('vendedor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        return view ('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendedor=new vendedor;
        $vendedor->nombre=$request->get('nombre');
        $vendedor->identificacion=$request->get('identificacion');                                                            
        $vendedor->telefono=$request->get('telefono');
        $vendedor->correo=$request->get('correo');
        $vendedor->direccion=$request->get('direccion');                                           
        $vendedor->save();
        return Redirect::to('vendedor');
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
    public function edit($id)
    {
        $vendedor=vendedor::findOrFail($id);
        return view("vendedores.edit",["vendedor"=>$vendedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendedor=vendedor::findOrFail($id);
        $vendedor->identificacion=$request->get('identificacion');
        $vendedor->nombre=$request->get('nombre');
        $vendedor->correo=$request->get('correo');
        $vendedor->telefono=$request->get('telefono');
        $vendedor->update();
        return Redirect::to('vendedor');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor=vendedor::findOrFail($id);
        $vendedor->delete();
        return Redirect::to('vendedor');
     }

     
}
