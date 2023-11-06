<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto_servicio;
use Illuminate\Support\Facades\Redirect;

class productoservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posproductoservicio=producto_servicio::orderBy('id_producto_servicio','DESC')->paginate(10);
        //dd('$posproductoservicio');
        return view('producto_servicio.index',compact('posproductoservicio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('producto_servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posproductoservicio=new producto_servicio;
        $posproductoservicio->nombre=$request->get('nombre');
        $posproductoservicio->descripcion=$request->get('descripcion');                                                            
        $posproductoservicio->precio=$request->get('precio');
        $posproductoservicio->tipo=$request->get('tipo');
        $posproductoservicio->save();

        
        return Redirect::to('productoservicio');
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

        $posproductoservicio=producto_servicio::findOrFail($id);
        return view("producto_servicio.edit",["posproductoservicio"=>$posproductoservicio]);
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
        $posproductoservicio=producto_servicio::findOrFail($id);
        $posproductoservicio->nombre=$request->get('nombre');
        $posproductoservicio->descripcion=$request->get('descripcion');                                                            
        $posproductoservicio->precio=$request->get('precio');
        $posproductoservicio->tipo=$request->get('tipo'); 
        $posproductoservicio->update();
        return Redirect::to('productoservicio');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $posproductoservicio=producto_servicio::findOrFail($id);
       $posproductoservicio->delete();
       return Redirect::to('productoservicio');
    }
}
