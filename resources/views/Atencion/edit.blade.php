@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar Atencion</h4>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
</div>
</div>
{{Form::open(array('action'=>array('App\Http\Controllers\AtencionController@update', $atencion->id_atencion),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="cliente">Clientes</label>
<select name="cliente" id="cliente">
<option  selected="selected" value="{{$atencion->id_cliente}}">{{$atencion->cliente->nombre}}</option>
    @foreach($clientes as $cliente)
        <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
    @endforeach
</select>
</div>
<div class="col-md-4">
<label for="producto">Productos</label>
<select name="producto" id="producto">
<option value="{{$atencion->id_producto}}">{{$atencion->producto->nombre}}</option>
    @foreach($productos as $producto)
        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
    @endforeach

</select>
</div>
<div class="col-4">
<label for="guion">Mensaje</label>
<select name="guion" id="guion">
<option value="{{$atencion->id_guion}}">{{$atencion->guion->mensaje ?? 'ninguno' }}</option>
    @foreach($guiones as $guion)
        <option value="{{ $guion->id_guion }}">{{ $guion->mensaje }}</option>
    @endforeach

</select>
</div>
<div class="col-6">
<label for="resultado" class="form-label">Resultado</label>
<input type="text" name="resultado" id="resultado" class="form-control"
value="{{$atencion->resultado}}">
</div>
<div class="col-md-6">
<label for="obser" class="form-label">Observaciones</label>
<input type="text" name="obser" id="obser" class="form-control"
value="{{$atencion->observaciones}}">
</div>
<div class="col-md-6">
<label for="fecha" class="form-label">Fecha</label>
<input type="text" name="fecha" id="fecha" class="form-control"
value="{{$atencion->fecha}}">
</div>
<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('atencion')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
