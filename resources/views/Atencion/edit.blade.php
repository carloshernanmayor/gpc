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
<label for="cliente " class="form-label">Cliente</label>
<input type="number" name="cliente" id="cliente"
class="form-control"
value="{{$atencion->id_cliente}}">
</div>
<div class="col-md-4">
<label for="producto" class="form-label">Producto</label>
<input type="text" name="producto" id="producto" class="form-control"
value="{{$atencion->id_producto}}">
</div>
<div class="col-4">
<label for="canal" class="form-label">canal</label>
<input type="text" name="canal" id="canal" class="form-control"
value="{{$atencion->id_guion}}">
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
