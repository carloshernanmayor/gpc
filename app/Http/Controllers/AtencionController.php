<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atencion;
use App\Models\vendedor;
use App\Models\cliente;
use App\Models\guion;
use App\Models\producto;
use Illuminate\Support\Facades\Redirect;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $aten=Atencion::orderBy('id_atencion','ASC')->paginate(10)->where('id_vendedor', auth()->user()->id_vendedor );
            return view('Atencion.index',compact('aten'));
    
        
    }

    public function indexAdmin()
    {
        
            $aten=Atencion::all();
            return view('Atencion.indexadmin',compact('aten'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guiones=guion::all();
        $atend = Atencion::where('id_vendedor', auth()->user()->id_vendedor)->pluck('id_cliente'); 
        $clientes =cliente::whereIn('id_cliente', $atend)->orderBy('id_cliente', 'ASC')->get();
        $productos=producto::all();
        return view('atencion.create', compact('guiones', 'clientes','productos'));
    }

    public function createAdmin()
    {
        return view('atencion.createadmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nueva=new Atencion();
        $nueva->id_cliente=$request->get('cliente');
        $nueva->id_vendedor=auth()->user()->id_vendedor;
        $nueva->id_producto=$request->get('producto');
        $nueva->id_guion=$request->get('guion');
        $nueva->resultado=$request->get('resultado');
        $nueva->observaciones=$request->get('obser');   
        $nueva->save(); 
        return Redirect::to('atencion'); 
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $guiones=guion::all();
       return view('Atencion.create', compact('guiones', 'lastatencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencion=Atencion::findOrFail($id);
        $atend = Atencion::where('id_vendedor', auth()->user()->id_vendedor)->pluck('id_cliente'); 
        $clientes =cliente::whereIn('id_cliente', $atend)->get();
        $idproducto = optional($atencion->producto)->id_producto;
        if ($idproducto) {
        $productos = Producto::where('id_producto', '!=', $idproducto)->get();
        } else {
        $productos = Producto::all();
        }
        $idguion = optional($atencion->guion)->id_guion;
        if ($idguion) {
        $guiones = guion::where('id_guion', '!=', $idguion)->get();
        } else {
        $guiones=guion::all();
        }
        return view("Atencion.edit",compact('atencion','clientes','productos','guiones'));
    }

    public function editAdmin($id){
        return view('Atencion.editadmin');

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
        $atencion=Atencion::findOrFail($id);
        $atencion->id_cliente=$request->get('cliente');
        $atencion->id_vendedor=auth()->user()->id_vendedor;
        $atencion->id_producto=$request->get('producto');
        $atencion->id_guion=$request->get('guion');
        $atencion->fecha=$request->get('fecha');
        $atencion->resultado=$request->get('resultado');
        $atencion->observaciones=$request->get('obser');
        $atencion->update();
        return Redirect::to('atencion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
