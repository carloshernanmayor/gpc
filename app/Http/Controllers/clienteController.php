<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Illuminate\Support\Facades\Redirect;
use App\Models\Atencion;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

$atend = Atencion::where('id_vendedor', auth()->user()->id_vendedor)->pluck('id_cliente'); 

$clientes =cliente::whereIn('id_cliente', $atend)->orderBy('id_cliente', 'ASC')->paginate(10);

return view('clientes.index', compact('clientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view ('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes=new cliente;
        $clientes->nombre=$request->get('nombre');
        $clientes->identificacion=$request->get('identificacion');                                                            
        $clientes->telefono=$request->get('telefono');
        $clientes->direccion=$request->get('direccion');
        $clientes->correo=$request->get('correo');                                               
        
        $clientes->save();
        return Redirect::to('cliente');
        
        $newClienteId = $clientes->id_cliente;

    // Crear un registro en la otra tabla y asignar la clave primaria de posible_cliente
        // $otratencion = new atencion;
        // $otratencion-> id_posible_cliente = $newPosibleClienteId;
        // $otraatencion->save();
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

        $cliente=cliente::findOrFail($ide);
        return view("clientes.edit",["cliente"=>$cliente]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $cliente=cliente::findOrFail($id);
        $cliente->identificacion=$request->get('identificacion');
        $cliente->nombre=$request->get('nombre');
        $cliente->direccion=$request->get('direccion');
        $cliente->correo=$request->get('correo');
        $cliente->telefono=$request->get('telefono');
        $cliente->update();
        return Redirect::to('cliente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $clientes=cliente::findOrFail($id);
       $clientes->delete();
       return Redirect::to('cliente');
    }
}
