<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posible_cliente;
use Illuminate\Support\Facades\Redirect;
use App\Models\Atencion;

class posibleclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $poscliente=posible_cliente::orderBy('id_posible_cliente','DESC')->paginate(10);
        //dd('$poscliente');
        return view('posibles_clientes.index',compact('poscliente'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view ('posibles_clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posclientes=new posible_cliente;
        $posclientes->nombre=$request->get('nombre');
        $posclientes->identificacion=$request->get('identificacion');                                                            
        $posclientes->telefono=$request->get('telefono');
        $posclientes->direccion=$request->get('direccion');
        $posclientes->correo=$request->get('correo');                                               
        
        $posclientes->save();
        return Redirect::to('posiblecliente');
        
        $newPosibleClienteId = $posclientes->id_posible_cliente;

    // Crear un registro en la otra tabla y asignar la clave primaria de posible_cliente
        $otratencion = new atencion;
        $otratencion-> id_posible_cliente = $newPosibleClienteId;
        $otraatencion->save();
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

        $poscliente=posible_cliente::findOrFail($ide);
        return view("posibles_clientes.edit",["poscliente"=>$poscliente]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $poscliente=posible_cliente::findOrFail($id);
        $poscliente->identificacion=$request->get('identificacion');
        $poscliente->nombre=$request->get('nombre');
        $poscliente->direccion=$request->get('direccion');
        $poscliente->correo=$request->get('correo');
        $poscliente->telefono=$request->get('telefono');
        $poscliente->update();
        return Redirect::to('posiblecliente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $posiblesclientes=posible_cliente::findOrFail($id);
       $posiblesclientes->delete();
       return Redirect::to('posiblecliente');
    }
}
