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
    public function store(Request $request){
    $request->validate([
        'tipo' => 'required|string|max:50|in:natural, juridica',
        'nombre' => 'required|string|max:100',
        'identificacion' => 'required|numeric',
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'correo' => 'required|email|max:100',
        'ncontacto' => 'nullable|string|max:100',
        'ccontacto' => 'nullable|email|max:100',
        'tcontacto' => 'nullable|string|max:20',
    ],[
    'tipo.required' => 'El campo tipo es obligatorio.',
    'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
    'tipo.max' => 'El campo tipo no debe exceder los 50 caracteres.',
    'tipo.in' => 'El tipo debe ser "natural" o "juridica".',
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.string' => 'El nombre debe ser una cadena de texto.',
    'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
    'identificacion.required' => 'La identificación es obligatoria.',
    'identificacion.numeric' => 'La identificación debe ser un número.',
    'telefono.required' => 'El teléfono es obligatorio.',
    'telefono.string' => 'El teléfono debe ser una cadena de texto.',
    'telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
    'direccion.required' => 'La dirección es obligatoria.',
    'direccion.string' => 'La dirección debe ser una cadena de texto.',
    'direccion.max' => 'La dirección no debe exceder los 255 caracteres.',
    'correo.required' => 'El correo es obligatorio.',
    'correo.email' => 'Debes ingresar un correo electrónico válido.',
    'correo.max' => 'El correo no debe exceder los 100 caracteres.',
    'ncontacto.string' => 'El nombre del contacto debe ser una cadena de texto.',
    'ncontacto.max' => 'El nombre del contacto no debe exceder los 100 caracteres.',
    'ccontacto.email' => 'El correo del contacto debe ser un correo válido.',
    'ccontacto.max' => 'El correo del contacto no debe exceder los 100 caracteres.',
    'tcontacto.string' => 'El teléfono del contacto debe ser una cadena de texto.',
    'tcontacto.max' => 'El teléfono del contacto no debe exceder los 20 caracteres.',
    ]);

    $clientenuevo = cliente::where('identificacion', $request->get('identificacion'))->first();

    if ($clientenuevo) {
        $nuevaatencion = new atencion;
        $nuevaatencion->id_cliente = $clientenuevo->id_cliente;
        $nuevaatencion->id_vendedor = auth()->user()->id_vendedor;
        $nuevaatencion->resultado = 'pendiente';
        $nuevaatencion->observaciones = 'cliente nuevo';
        $nuevaatencion->save();  
    } else {
        $clientes = new cliente;
        $clientes->tipo = $request->get('tipo');
        $clientes->nombre = $request->get('nombre');
        $clientes->identificacion = $request->get('identificacion');
        $clientes->telefono = $request->get('telefono');
        $clientes->direccion = $request->get('direccion');
        $clientes->correo = $request->get('correo');
        $clientes->contacto_nombre = $request->get('ncontacto');
        $clientes->contacto_correo = $request->get('ccontacto');
        $clientes->contacto_telefono = $request->get('tcontacto');
        $clientes->fecha_registro = now();
        $clientes->save();  
        
        $nuevaatencion = new atencion;
        $nuevaatencion->id_cliente = $clientes->id_cliente;
        $nuevaatencion->id_vendedor = auth()->user()->id_vendedor;
        $nuevaatencion->resultado = 'pendiente';
        $nuevaatencion->observaciones = 'cliente nuevo';
        $nuevaatencion->save();  
    }

    return Redirect::to('cliente')->with('success', 'Cliente creado exitosamente y se creo una nueva atencion con este cliente');
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
        $request->validate([
        'tipo' => 'required|string|max:50|in:natural, juridica',
        'nombre' => 'required|string|max:100',
        'identificacion' => 'required|numeric',
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'correo' => 'required|email|max:100',
        'ncontacto' => 'nullable|string|max:100',
        'ccontacto' => 'nullable|email|max:100',
        'tcontacto' => 'nullable|string|max:20',
    ],[
    'tipo.required' => 'El campo tipo es obligatorio.',
    'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
    'tipo.max' => 'El campo tipo no debe exceder los 50 caracteres.',
    'tipo.in' => 'El tipo debe ser "natural" o "juridica".',
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.string' => 'El nombre debe ser una cadena de texto.',
    'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
    'identificacion.required' => 'La identificación es obligatoria.',
    'identificacion.numeric' => 'La identificación debe ser un número.',
    'telefono.required' => 'El teléfono es obligatorio.',
    'telefono.string' => 'El teléfono debe ser una cadena de texto.',
    'telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
    'direccion.required' => 'La dirección es obligatoria.',
    'direccion.string' => 'La dirección debe ser una cadena de texto.',
    'direccion.max' => 'La dirección no debe exceder los 255 caracteres.',
    'correo.required' => 'El correo es obligatorio.',
    'correo.email' => 'Debes ingresar un correo electrónico válido.',
    'correo.max' => 'El correo no debe exceder los 100 caracteres.',
    'ncontacto.string' => 'El nombre del contacto debe ser una cadena de texto.',
    'ncontacto.max' => 'El nombre del contacto no debe exceder los 100 caracteres.',
    'ccontacto.email' => 'El correo del contacto debe ser un correo válido.',
    'ccontacto.max' => 'El correo del contacto no debe exceder los 100 caracteres.',
    'tcontacto.string' => 'El teléfono del contacto debe ser una cadena de texto.',
    'tcontacto.max' => 'El teléfono del contacto no debe exceder los 20 caracteres.',
    ]);

        $cliente=cliente::findOrFail($id);
        $cliente->tipo=$request->get('tipo');
        $cliente->nombre = $request->get('nombre');
        $cliente->identificacion = $request->get('identificacion');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->correo = $request->get('correo');
        $cliente->contacto_nombre = $request->get('ncontacto');
        $cliente->contacto_correo = $request->get('ccontacto');
        $cliente->contacto_telefono= $request->get('tcontacto');
        $cliente->contacto_telefono= $request->get('fecha_registro');
        $cliente->update();
         return Redirect::to('cliente')->with('success', 'Cliente actualizado exitosamente.');

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
