@extends('home')
@section('contenido')

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Ingresar producto</h4>
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
{!!Form::open(array('url'=>'producto','method'=>'POST','autocomplete'=>'off')
)!!}
{{Form::token()}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre"
id="nombre" class="form-control"
placeholder="Digite el nombre del producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="tipo">Tipo</label>
<input type="text" name="tipo"
id="tipo" class="form-control"
placeholder="Digite el tipo de producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="material">Material</label>
<input type="text" name="material"
id="mat" class="form-control"
placeholder="Digite el material del producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="sector">Sector</label>
<input type="text" name="sector"
id="sector" class="form-control"
placeholder="Digite el sector al que pertenece el producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="dimensiones">Dimensiones</label>
<input type="text" name="dimensiones"
id="dim" class="form-control"
placeholder="Digite las dimensiones del producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="fecha">Fecha de registro</label>
<input type="date" name="fecha_creacion" id="fecha" class="form-control"
placeholder="Digite la la fecha de ingeso del producto">
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
<div class="form-group"> <br>
<button class="btn btn-primary" type="submit"><span
class="glyphicon glyphicon-ok"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><span
class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
<a class="btn btn-info" type="reset" href="{{url('producto')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
