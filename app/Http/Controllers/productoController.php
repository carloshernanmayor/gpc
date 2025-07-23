<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use Illuminate\Support\Facades\Redirect;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posproducto=producto::orderBy('id_producto','DESC')->paginate(10);
        return view('producto.index',compact('posproducto'));

    }

    public function indexAdmin(){
        $posproducto=producto::orderBy('id_producto','DESC')->paginate(10);
        return view('producto.indexadmin',compact('posproducto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posproducto=new producto;
        $posproducto->nombre=$request->get('nombre');
        $posproducto->tipo=$request->get('tipo');
        $posproducto->material=$request->get('material');                                                            
        $posproducto->sector=$request->get('sector');
        $posproducto->dimensiones=$request->get('dimensiones');
        $posproducto->fecha_creacion=$request->get('fecha_creacion');
        $posproducto->save();

        
        return Redirect::to('producto');
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
    public function edit($id){

        $posproducto=producto::findOrFail($id);
        return view("producto.edit",["posproducto"=>$posproducto]);
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
        $posproducto=producto::findOrFail($id);
        $posproducto->nombre=$request->get('nombre');
        $posproducto->tipo=$request->get('tipo');
        $posproducto->material=$request->get('material');                                                            
        $posproducto->sector=$request->get('sector');
        $posproducto->dimensiones=$request->get('dimensiones');
        $posproducto->fecha_creacion=$request->get('fecha');
        $posproducto->update();
        return Redirect::to('producto');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $posproducto=producto::findOrFail($id);
       $posproducto->delete();
       return Redirect::to('producto');
    }
}
