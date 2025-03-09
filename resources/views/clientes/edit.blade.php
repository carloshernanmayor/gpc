@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar Persona</h4>
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
{{Form::open(array('action'=>array('App\Http\Controllers\clienteController@update', $cliente->id_cliente),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="identificacion" class="form-label">identificacion</label>
<input type="number" name="identificacion" id="identificacion"
class="form-control"
value="{{$cliente->identificacion}}">
</div>
<div class="col-md-4">
<label for="nombre" class="form-label">Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control"
value="{{$cliente->nombre}}">
</div>
<div class="col-4">
<label for="direccion" class="form-label">direccion</label>
<input type="text" name="direccion" id="direccion" class="form-control"
value="{{$cliente->direccion}}">
</div>
<div class="col-6">
<label for="correo" class="form-label">correo</label>
<input type="text" name="correo" id="correo" class="form-control"
value="{{$cliente->correo}}">
</div>
<div class="col-md-6">
<label for="telefono" class="form-label">Telefono</label>
<input type="text" name="telefono" id="telefono" class="form-control"
value="{{$cliente->telefono}}">
</div>
<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('cliente')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
