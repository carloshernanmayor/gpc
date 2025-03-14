@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar Producto </h4>
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
{{Form::open(array('action'=>array('App\Http\Controllers\productoController@update', $posproducto->id_producto),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="nombre" class="form-label">Nombre</label>
<input type="text" name="nombre" id="nombre"
class="form-control"
value="{{$posproducto->nombre}}">
</div>
<div class="col-md-4">
<label for="descripcion" class="form-label">Tipo</label>
<input type="text" name="tipo" id="descripcion" class="form-control"
value="{{$posproducto->tipo}}">
</div>
<div class="col-4">
<label for="precio" class="form-label">Material</label>
<input type="text" name="material" id="precio" class="form-control"
value="{{$posproducto->material}}">
</div>
<div class="col-6">
<label for="tipo" class="form-label">Sector</label>
<input type="text" name="sector" id="tipo" class="form-control"
value="{{$posproducto->sector}}">
</div>
<div class="col-6">
<label for="tipo" class="form-label">Dimensiones</label>
<input type="text" name="dimensiones" id="tipo" class="form-control"
value="{{$posproducto->dimensiones}}">
</div>
<div class="col-6">
<label for="tipo" class="form-label">Fecha de creacion</label>
<input type="text" name="fecha" id="tipo" class="form-control"
value="{{$posproducto->fecha_creacion}}">
</div>
<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></
span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('producto')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
