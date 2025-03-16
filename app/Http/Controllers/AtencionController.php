<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atencion;
use App\Models\vendedor;
use App\Models\cliente;
use App\Models\guion;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atencion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       $lastatencion=atencion::find(atencion::max('id_atencion'));
       return view('Atencion.atenguion', compact('guiones', 'lastatencion'));
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
        return view("Atencion.edit",["atencion"=>$atencion]);
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
        $atencion->cliente=$request->get('cliente');
        $atencion->cliente=$request->get('producto');
        $atencion->cliente=$request->get('canal');
        $atencion->cliente=$request->get('resultado');
        $atencion->cliente=$request->get('obser');
        $atencion->cliente=$request->get('fecha');
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
