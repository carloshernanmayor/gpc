@extends('home')
@section('contenido')

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Editar tipo marketing</h4>
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
{{Form::open(array('action'=>array('App\Http\Controllers\guionController@update', $guion->id_guion),'method'=>'patch'))}}
<div class="row g-3">
<div class="col-md-4">
<label for="canal" class="form-label">Canal</label>
<input type="text" name="canal" id="canal"
class="form-control"
value="{{$guion->canal}}">
</div>
<div class="col-md-4">
<label for="mensaje" class="form-label">Mensaje</label>
<textarea type="text" name="mensaje" id="mensaje"
class="form-control"
value="{{$guion->mensaje}}">{{$guion->mensaje}}</textarea>
</div>
<div class="col-md-4">
<label for="fecha" class="form-label">Fecha de creacion</label>
<input type="text" name="fecha" id="fecha"
class="form-control"
value="{{$guion->fecha_creacion}}">
</div>

<div class="col-12">
<button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></
span> Actualizar
</button>
<a class="btn btn-info" type="reset" href="{{url('guion')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
{!!Form::close()!!}
@endsection('contenido')
