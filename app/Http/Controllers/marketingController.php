<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marketing;
use Illuminate\Support\Facades\Redirect;

class marketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $marketing=marketing::orderBy('id_marketing','DESC')->paginate(10);
        //dd('$poscliente');
        return view('marketing.index',compact('marketing'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view ('marketing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marketing=new marketing;
        $marketing->tipo_marketing=$request->get('tipo_marketing');                                               
        
        $marketing->save();
        return Redirect::to('marketing');
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

        $marketing=marketing::findOrFail($ide);
        return view("marketing.edit",["marketing"=>$marketing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $marketing=marketing::findOrFail($id);
        $marketing->tipo_marketing=$request->get('tipo_marketing');
        $marketing->update();
        return Redirect::to('marketing');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $marketing=marketing::findOrFail($id);
       $marketing->delete();
       return Redirect::to('marketing');
    }
}
