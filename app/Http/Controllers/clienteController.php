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
    

    public function indexAdmin(){

        $clientes=cliente::all();
        
        return view('clientes.indexadmin', compact('clientes'));
        
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
    $clientenuevo = cliente::where('identificacion', $request->get('identificacion'))->first();

    if ($clientenuevo) {
        $nuevaatencion = new atencion;
        $nuevaatencion->id_cliente = $clientenuevo->id_cliente;
        $nuevaatencion->id_vendedor = auth()->user()->id_vendedor;
        $nuevaatencion->resultado='pendiente';
        $nuevaatencion->observaciones='cliente nuevo';
        $nuevaatencion->save();  
    } else {
        $clientes = new cliente;
        $clientes->tipo=$request->get('tipo');
        $clientes->nombre = $request->get('nombre');
        $clientes->identificacion = $request->get('identificacion');
        $clientes->telefono = $request->get('telefono');
        $clientes->direccion = $request->get('direccion');
        $clientes->correo = $request->get('correo');
        $clientes->contacto_nombre = $request->get('contacto_nombre');
        $clientes->contacto_correo = $request->get('contacto_correo');
        $clientes->contacto_telefono= $request->get('contacto_telefono');
        $clientes->fecha_registro= $request->get('fecha_registro');
        $clientes->save();  
        
        $nuevaatencion = new atencion;
        $nuevaatencion->id_cliente = $clientes->id_cliente;
        $nuevaatencion->id_vendedor = auth()->user()->id_vendedor;
        $nuevaatencion->resultado='pendiente';
        $nuevaatencion->observaciones='cliente nuevo';
        $nuevaatencion->save();  
    }

    return Redirect::to('cliente'); 
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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

    public function editAdmin($ide){
        $cliente=cliente::findOrFail($ide);
        return view("clientes.editadmin",["cliente"=>$cliente]);
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
        $cliente->tipo=$request->get('tipo');
        $cliente->nombre = $request->get('nombre');
        $cliente->identificacion = $request->get('identificacion');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->correo = $request->get('correo');
        $cliente->contacto_nombre = $request->get('contacto_nombre');
        $cliente->contacto_correo = $request->get('contacto_correo');
        $cliente->contacto_telefono= $request->get('contacto_telefono');
        $cliente->contacto_telefono= $request->get('fecha_registro');
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
